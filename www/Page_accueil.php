<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'Accueil</title>
</head>
<body>
    <header><h1>Accueil</h1></header>
    <main>
        <a href="http://127.0.0.1:5500/Page_administrateur.html">Page Administrateur</a>
        <a href="http://127.0.0.1:5500/Page_utilisateur.html">Page Administrateur</a>
    </main>
</body>
</html>
<?php
$mysqli = new mysqli("localhost", "root", "", "ppeparking");
if ($mysqli->connect_error) {
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
    echo"a";
    if ($mysqli->connect_error) {
        echo 'connexion impossible... :'.$mysqli->connect_error;
    }
    else {
        echo 'connexion réussie : '.$mysqli->host_info;
    }
?>
