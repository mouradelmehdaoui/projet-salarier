<?php
session_start();
require_once("../models/functionSalarier.php");


$idSalarier = intval($_GET['idSalarier']);

$identifiant = intval($_GET['identifiant']);

$idListSalarier = findId_Salarier($idSalarier);

$errors = [];

$_SESSION['errors'] = $errors;

$_SESSION['idSalarier'] = $idSalarier; // Recuperation ID user pour SUPPRIMER BASE DE DONNEE

$_SESSION['idListSalarier'] = $idListSalarier;  // recuperation PAr Variable Session[] pour Lister toute les informations d' UN uilisateurs par SON ID



if ($identifiant === 1 || $identifiant === 0) {
    header('Location: ../views/ajouterModifySalarier.php');
} elseif ($identifiant === 2) {
    header("Location: ../controllers/supprimerSalarierAccept.php");
} elseif ($identifiant === 3) {
    header('Location: ../controllers/voirSalarierAccept.php');
}




