<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppeparking;charset=utf8', 'root', '');
try
{
    if($bdd = new PDO('mysql:host=localhost;dbname=ppeparking;charset=utf8', 'root', ''));
    echo"connexion reussi";
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(!isset($_SESSION['login'])){
    header('location:Page_accueil.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header><h1>utilisateur</h1></header>
</body>
</html>