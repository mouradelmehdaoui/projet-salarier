<?php

session_start();


$title = "LISTE EMPLOYE";
require_once ("../partials/header.php");


$listerSalarier = $_SESSION['listeSalarier'];






?>

<section>

    <h1 class="text-center mt-3">LISTE DES EMLOYÉS</h1>
    <p class="ml-3"> Depuis cette page, vous revenir sur la page d'acceuil en cliqand sur le liens Accuil.
        vous avez aussi la possiblité d'ajouter un nouvel employé en cliquand sur le lien Ajouter.</p>
    <a href="../controllers/chercherSalarierAccept.php?idSalarier=0&identifiant=0"><button type="button" class="btn btn-primary float-right mb-3 btn-lg">Ajouter</button></a>
</section>

<table class="w-100">

    <thead class="text-white">
    <tr>
        <th>id</th>
        <th>Prenom</th>
        <th>Date d'embauche</th>
        <th>Status</th>
        <th>Email</th>
        <th>Salaire</th>
        <th>Actions</th>

    </tr>

    </thead>

    <tbody>

    <?php
    if (sizeof($listerSalarier) > 0)
    foreach ($listerSalarier as $salarier) {{

    ?>


    <tr>

        <td>
            <?php echo $salarier['ID_salarier'] ; ?>

        </td>



        <td><?php echo $salarier['Prenom'] ; ?></td>
        <td><?php echo $salarier['Date'] ; ?></td>
        <td><?php echo $salarier['status'] ; ?></td>
        <td><?php echo $salarier['Email'] ; ?></td>
        <td><?php echo $salarier['Salaire']. ' €' ; ?></td>

        <td class="d-flex justify-content-around">
            <a href="../controllers/chercherSalarierAccept.php?idSalarier=<?php echo $salarier['ID_salarier'] ; ?>&identifiant=1"><i class="fas fa-user-edit fa-1x text-info mt-2" title="Modifier"></i></a>
            <a href="../controllers/chercherSalarierAccept.php?idSalarier=<?php echo $salarier['ID_salarier'] ; ?>&identifiant=2"><i class="fas fa-user-times fa-1x text-danger mt-2" title="Supprimer"></i></a>
            <a href="../controllers/chercherSalarierAccept.php?idSalarier=<?php echo $salarier['ID_salarier'] ; ?>&identifiant=3"><i class="fas fa-info fa-1x text-warning mt-2" title="Informations"></i></a>

        </td>
    </tr>
    <?php
            } } else { ?>
    <tr>
        <td> </td>
        <td><label class="w3-text-red">La liste est vide. Aucun Salarié(e)s saisi</label></td>
        <td></td>
    </tr>
    <?php
    }
    ?>

    </tbody>


</table>
<?php



?>


    <nav aria-label="..." class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>


<br>
     
<?php




include_once "../partials/footer.php";

?>