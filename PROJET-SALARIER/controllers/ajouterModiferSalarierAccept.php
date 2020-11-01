<?php

session_start();

require_once ('../models/Connexion.php');
// RECUPERATION DES SAISI USER VIA POST ET SECURISER




    $id = intval($_POST['idsalarier']);
    $prenom = trim(ucfirst(filter_var($_POST['prenom'], FILTER_SANITIZE_SPECIAL_CHARS )));
    $date = trim($_POST['date']);
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL ));
    $salaire = trim(filter_var($_POST['salaire'], FILTER_SANITIZE_SPECIAL_CHARS ));
    $status = $_POST['status'];


    $errors = $_SESSION['errors'];




if(isset($_POST['submit'])) {

    $errors = [];
    $maxSize = 200000; // initialise une Varaible determiner la taille MAx pour l'image
    $extension = array('.jpg', '.jpeg', '.png'); // initialise une Variable qui autoriser les extenstions images
    $fileError = $_FILES['uploaded_file']['error'];
    $fileExtension = "." . strtolower(substr(strrchr($_FILES['uploaded_file']['name'], '.'), 1)); // recupere l'extension de l'image pares le .
    $filesize = $_FILES['uploaded_file']['size'];
    $cheminNomTemporaire = $_FILES['uploaded_file']['tmp_name'];
    $cheminNomDifinitif = 'D:\PROJET-SALARIER/ressources/images/' . $prenom . $fileExtension;

    $destination = move_uploaded_file($cheminNomTemporaire, $cheminNomDifinitif);

    if (!empty($id) === 0 || empty($id)) {

        if (empty($prenom)) {


            $errors['prenom'] = "le Prenom est requis !";
            $_SESSION['errors'] = $errors;

            header('Location: ../views/ajouterModifySalarier.php');
        }

        if (empty($date)) {

            $errors['date'] = "la date est requis !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        }
        if (empty($email)) {


            $errors['email'] = "Email est requis !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        } else {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errors['email'] = "Email au format incorrecte !";
                $_SESSION['errors'] = $errors;
                header('Location: ../views/ajouterModifySalarier.php');
            }

        }
        if (empty($salaire)) {


            $errors['salaire'] = "le Salaire est requis !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        }
        if (empty($status)) {


            $errors['status'] = "la Fonction est requis !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        }


//verification upload de image
        if ($fileError > 0) {

            $errors['image'] = "une erreur est survenu lors du chargement de la photo !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        }

//verification taille de image uplaoder
        if ($filesize > $maxSize) {

            $errors['image'] = "le fichier est trop gros";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');
        }
//verification extension de image uplaoder
        if (!in_array($fileExtension, $extension)) {

            $errors['image'] = "Extenstion non accepter uniquement Jpeg, Jpg, Png  !";
            $_SESSION['errors'] = $errors;
            header('Location: ../views/ajouterModifySalarier.php');

        }

//verification photo bien eter envoyer au chemin final
        if ($destination && empty($errors)) {


            $db = connect_db();
            $req = $db->prepare('INSERT INTO salarier(ID_salarier, Prenom, Date_de_Naissance, Email, Salaire,file_url, status) VALUES (?,?,?,?,?,?,?)');
            $req->execute(array($id, $prenom, $date, $email, $salaire, $cheminNomDifinitif, $status));
            $req->closeCursor();





        }

        header('Location: ../controllers/listerSalarierAccept.php');
        exit();
    }


    // CONTROLE FORMULAIRE MODIFIER SALARIER



    if (!empty($id) > 0) {

            if (empty($prenom)) {


                $errors['prenom'] = "le Prenom est requis !";
                $_SESSION['errors'] = $errors;



            }

            if (empty($date)) {

                $errors['date'] = "la date est requis !";
                $_SESSION['errors'] = $errors;


            }


            if (empty($email)) {


                $errors['email'] = "Email est requis !";
                $_SESSION['errors'] = $errors;

            } else {

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $errors['email'] = "Email au format incorrecte !";
                    $_SESSION['errors'] = $errors;

                }

            }
            if (empty($salaire)) {


                $errors['salaire'] = "le Salaire est requis !";
                $_SESSION['errors'] = $errors;

            }


            if (empty($errors)) {

                if(!empty($destination)) {
                    $requete = "UPDATE salarier SET Prenom = ?," .
                        "Date_de_Naissance = ?," .
                        "Email = ?," .
                        "Salaire = ?," .
                        "file_url = ?," .
                        "status = ?" .
                        "WHERE ID_salarier = ?";

                    $db = connect_db();

                    $execute = $db->prepare($requete);

                    $execute->execute(array($prenom, $date, $email, $salaire, $cheminNomDifinitif, $status, $id));

                    $execute->closeCursor();

                    header('Location: ../controllers/listerSalarierAccept.php');
                    exit();

                } else
                    $requete = "UPDATE salarier SET Prenom = ?," .
                        "Date_de_Naissance = ?," .
                        "Email = ?," .
                        "Salaire = ?," .
                        "status = ?" .
                        "WHERE ID_salarier = ?";

                $db = connect_db();

                $execute = $db->prepare($requete);

                $execute->execute(array($prenom, $date, $email, $salaire, $status, $id));

                $execute->closeCursor();


                header('Location: ../controllers/listerSalarierAccept.php');
                exit();
            }






        }



    header('Location: ../views/ajouterModifySalarier.php');

}










