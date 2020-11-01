<?php
require_once("../models/Connexion.php");


function add_Salarier($id, $prenom, $date, $email, $salaire)
{

// securise les variables

    $vId = $id;
    $vPrenom = $prenom;
    $vDate = $date;
    $vEmail = $email;
    $vSalaire = $salaire;


//prepare ma requette
    $requete = 'INSERT INTO salarier VALUES (:vId, :vPrenom, :vDate_de_naissance, :vEmail, :vSalaire)';


    // connexion base de donnée

    $db = connect_db();

    // prepare ma requette

    $execute = $db->prepare($requete);

    // bind param

    $execute->bindParam(':vId', $vId, PDO::PARAM_INT);
    $execute->bindParam(':vPrenom', $vPrenom, PDO::PARAM_STR);
    $execute->bindParam(':vDate_de_naissance', $vDate, PDO::PARAM_STR);
    $execute->bindParam(':vEmail', $vEmail, PDO::PARAM_STR);
    $execute->bindParam(':vSalaire', $vSalaire, PDO::PARAM_INT);

    $execute->execute();


    $execute->closeCursor();


}

function findAll_Salarier()
{

    $idSalarier = array();

    $pageCurrent =

//prepare ma requette
    $requete = "SELECT ID_salarier, Prenom, DATE_FORMAT(Date_de_Naissance, '%e %M %Y') AS Date, Email, Salaire, status FROM salarier ORDER BY Prenom";


    // connexion base de donnée

    $db = connect_db();

    // prepare ma requette

    $execute = $db->prepare($requete);


    $execute->execute();

    $listeSalarier = $execute->fetchAll();

    $execute->closeCursor();

    return $listeSalarier;

}

function findId_Salarier($idSalarier)
{

    $idListSalarier = array();

    $vIdSalarier = $idSalarier;


    //prepare ma requette
    $requete = "SELECT ID_salarier, Prenom, DATE_FORMAT(Date_de_Naissance, '%d/%m/%Y') AS Date, Email, Salaire, status FROM salarier WHERE ID_salarier = :vIdSalarier ";


    // connexion base de donnée

    $db = connect_db();

    // prepare ma requette

    $execute = $db->prepare($requete);

// bind param
    $execute->bindParam('vIdSalarier', $vIdSalarier, PDO::PARAM_INT);
    $execute->execute();

    $idListSalarier = $execute->fetchAll();

    $execute->closeCursor();

    return $idListSalarier;

}


function modify_Salarier($id, $prenom, $date, $email, $salaire)
{

// securise les variables


    $vId = $id;

    $vPrenom = $prenom;
    $vDate = $date;
    $vEmail = $email;
    $vSalaire = $salaire;


//prepare ma requette
    $requete = "UPDATE salarier SET Prenom = ?," .
        "Date_de_Naissance = ?," .
        "Email = ?," .
        "Salaire = ?" .
        "WHERE ID_salarier = ?";

    // connexion base de donnée

    $db = connect_db();

    // prepare ma requette

    $execute = $db->prepare($requete);
    // bind param

//    $execute->bindParam(':vId', $vId, PDO::PARAM_INT);
//    $execute->bindParam(':vPrenom', $vPrenom, PDO::PARAM_STR);
//    $execute->bindParam(':vDate_de_Naissance', $vDate, PDO::PARAM_STR);
//    $execute->bindParam(':vEmail', $vEmail, PDO::PARAM_STR);
//    $execute->bindParam(':vSalaire', $vSalaire, PDO::PARAM_STR);


    $execute->execute([$vPrenom, $vDate, $vEmail, $vSalaire, $vId]);


    $execute->closeCursor();


}

function delete_Salarier($id)
{

// securise les variables

    $vId = $id;


//prepare ma requette
    $requete = "DELETE FROM salarier WHERE ID_salarier = :vId";


    // connexion base de donnée

    $db = connect_db();

    // prepare ma requette

    $execute = $db->prepare($requete);

    // bind param

    $execute->bindParam(':vId', $vId, PDO::PARAM_INT);


    $execute->execute();


    $execute->closeCursor();


}












