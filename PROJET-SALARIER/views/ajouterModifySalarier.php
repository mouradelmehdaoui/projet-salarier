<?php
session_start(); // ALWAYS AFTER OPEN BALISE PHP

$title = "GESTION EMPLOYER";
require_once("../partials/header.php");


$errors = $_SESSION['errors'];

$idSalarier = $_SESSION['idListSalarier'];
$titreForm = "";


$optChoisi = "selected";
$optText = "text";
$optHidden = "hidden";


if(sizeof($idSalarier) > 0) {

    $titreForm= "MODIFIER EMPLOYER";
} else {

    $titreForm= "AJOUTER EMPLOYER";
}


?>

<head>

    <h2 class="text-center mt-3 mb-3"><?php echo $titreForm?></h2>
</head>

<SECTION>




    <form class="m-auto mb-3" method="post" action="../controllers/ajouterModiferSalarierAccept.php" enctype="multipart/form-data">
        <div class="upload">

            <img src="../ressources/images/user.png" alt="IMAGE USER" width="200px" height="200px">
            <div class="input-group">

                <div class="custom-file ">
                    <input type="file" name="uploaded_file" class="custom-file-input" id="inputGroupFile01"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label pl-1 rounded-0" for="inputGroupFile01">Choisissez votre photo</label>
                </div>

            </div>

        </div>



        <div class="form-group">

            <h2>Profile</h2>

            <div class="form-row">

                <div class="form-group col-md-6">


                     <?php

                     if(sizeof($idSalarier) === 0 ){



                         echo <<<EOT
                <label>Prenom</label>
                <input type="text" name="prenom"  required class="form-control rounded-0" value="" autofocus>
                <input type="hidden" name="idsalarier" value=""> 

                        

               
            </div>

            <div class="form-group col-md-6"
            <label>Date de naissance</label>
            <input type="date" name="date" required class="form-control rounded-0" value="">
        </div>

        </div>

        <div class="form-row pl-1">

            <div class="form-group col-md-4"
            <label>Email</label>
            <input type="email" name="email"  required class="form-control rounded-0" value="">
            
        </div>

        <div class="form-group col-md-4"
        <label for="inputState">Fonction</label>
        <select id="inputState" name="status" class="form-control rounded-0">
            <option value=""></option>
            <option value="PDG">PDG</option>
            <option value="DG">DG</option>
            <option value="RH">RH</option>
            <option value="DSI">DSI</option>

        </select>
        </div>

        <div class="form-group col-md-4"
        <label>Salaire</label>
        <input type="text" name="salaire" class="form-control rounded-0" value="">
        </div>
        </div> 
EOT;


                     } else {

                    foreach ($idSalarier as $salarier) {



                        ?>

                <label>Prenom</label>
                <input type="text" name="prenom" class="form-control rounded-0"  value="<?php echo $salarier['Prenom'];?>" autofocus >
                    <input type="hidden" name="prenom" class="form-control rounded-0"  value="" autofocus >

                    <input type="hidden" name="idsalarier" value="<?php echo $salarier['ID_salarier']; ?>">

                    <?php if (isset($errors['prenom'])) { echo  "<p class='text-danger'>" .  $errors['prenom'] . "</p>" ; } ?>

                </div>

            <div class="form-group col-md-6"
            <label>Date de naissance</label>
            <input type="date" name="date" class="form-control rounded-0"  value="<?php $salarier['Date']; ?>">
                <?php if (isset($errors['date'])) { echo  "<p class='text-danger'>" .  $errors['date'] . "</p>" ; } ?>
            </div>

        </div>

        <div class="form-row pl-1">

            <div class="form-group col-md-4"
            <label>Email</label>
            <input type="email" name="email" class="form-control rounded-0"  value="<?php echo $salarier['Email']; ?>" >
            <?php if (isset($errors['email'])) { echo  "<p class='text-danger'>" .  $errors['email'] . "</p>" ; } ?>
        </div>

        <div class="form-group col-md-4"
        <label for="inputState">Fonction</label>

        <select id="inputState" name="status" class="form-control rounded-0">
            <option value=""

            <?php
            if(!empty($salarier['status'])){
            echo $optChoisi; }  ?>>
                <?php echo $salarier['status']?>


            </option>
            <option value="PDG">PDG</option>
            <option value="DG">DG</option>
            <option value="RH">RH</option>
            <option value="DSI">DSI</option>

        </select>
        <?php if (isset($errors['status'])) { echo  "<p class='text-danger'>" .  $errors['status'] . "</p>" ; } ?>

        </div>

        <div class="form-group col-md-4"
        <label>Salaire</label>
        <input type="text" name="salaire" class="form-control rounded-0"
               value="<?php echo $salarier['Salaire']; ?>">
        <?php if (isset($errors['salaire'])) { echo  "<p class='text-danger'>" .  $errors['salaire'] . "</p>" ; } ?>

        </div>
        </div>

        <?php }} ?>
        <br>
        <hr>
        <br>
        <button type="submit" name="submit" class="rounded-0 btn-primary btn-lg">ENREGISTRER</button>
        <button type="reset" class="rounded-0 btn-danger btn-lg float-right">RESET</button>


        </div> <!-- FIN DIV FOR GROUP-->


    </form>



</SECTION>

<?php
require_once("../partials/footer.php");


?>

