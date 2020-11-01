<?php

session_start();


$title = "DÉTAILS EMPLOYÉ";
require_once ("../partials/header.php");

$idListerSalarier = $_SESSION['idListSalarier'];


?>

    <section>

        <h1 class="text-center mt-3"><?php echo $title ?></h1>
        <p class="ml-3"> Depuis cette page, vous revenir sur la page d'acceuil en cliqand sur le liens <span class="font-weight-bold">Acceuil.</span>
            vous avez aussi la possiblité de revenir sur la liste des employés en cliquant sur le lien <span class="font-weight-bold">Employés.</span></p>
    </section>

    <div class="fiche m-auto">

         <?php

             foreach ($idListerSalarier as $ligne) {
            $fileExtension = "." . strtolower(substr(strrchr($ligne['Prenom'], '.'), 1));

             ?>


                <div class="form-row">

                     <div class="form-group col-md-5">
                            <img class="float-right border" src="../ressources/images/<?php if(isset($ligne['Prenom'])) { echo ($ligne['Prenom']).$fileExtension; }?>" width="130px" height="150px">

                     </div>

                    <div class="form-group col-md-7">

                             <p class="ml-5"><span class="font-weight-bold"> <?php echo $ligne['Prenom'] ?></span></p>
                             <p class="ml-5"><?php echo $ligne['status'] ?></p>
                             <p class="ml-5">Contact : <?php echo $ligne['Email'] ?></p>

                <?php } ?>
                    </div>

                </div>
    </div>

<?php

include_once "../partials/footer.php";