<?php
session_start();

require_once ('../models/functionSalarier.php');

$_SESSION['listeSalarier'] = findAll_Salarier();

// Script PAgination
/*$db = connect_db();
$req = $db ->prepare('SELECT ID_salarier FROM salarier');
$req -> execute();

$nbreTotalSalarier = $req-> rowCount();



$nbre_Salarier_Par_Page = 4;
$nbre_Salarier_max_avant_et_apres = 4;
$nbrePages = ceil($nbreTotalSalarier / $nbre_Salarier_Par_Page); // arrondir le nombre en entier

if(isset($_GET['page']) && is_numeric($_GET['page'])) {

    $page_num = $_GET['page'];
} else {

    $page_num = 1;
}

if ($page_num <1) {

    $page_num = 1;
} else if($page_num > $nbrePages) {

    $page_num = $nbrePages;
}

    $limit = 'LIMIT' . ($page_num -1) * $nbre_Salarier_Par_Page. ',' . $nbre_Salarier_Par_Page;

$req = "SELECT ID_salarier, Prenom, DATE_FORMAT(Date_de_Naissance, '%d/%m/%Y') AS Date, Email, Salaire, status FROM salarier ORDER BY  id DESC $limit";

$req -> closeCursor();
*/






header('Location: ../views/listersalarier.php');






