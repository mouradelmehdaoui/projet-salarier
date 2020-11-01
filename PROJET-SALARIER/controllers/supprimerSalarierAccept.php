<?php


session_start();
require_once('../models/functionSalarier.php');

$id = $_SESSION['idSalarier'];

delete_Salarier($id);


header('Location: ../controllers/listerSalarierAccept.php');







