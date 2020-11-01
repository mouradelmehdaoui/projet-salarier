
<?php

echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Pour utiliser les icônes Font Awesome avec Bootstrap 4 -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../ressources/css/bootstrap.css" rel="stylesheet">
    <link href="../ressources/css/style.css" rel="stylesheet">
    <title>$title</title>
</head>
<body>
 <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="../ressources/images/logo.png" width="60" height="80" alt="logo">
            <span class="text-white">DAWM-NOISIEL</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link text-white" href="../views/acceuil.php">Acceuil</a>
                <a class="nav-item nav-link text-white" href="../controllers/listerSalarierAccept.php">Employés</a>

            </div>
        </div>
    </nav>

</header> 
EOT;



