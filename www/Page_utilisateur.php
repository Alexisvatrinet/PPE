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
 // Si on appuye sur le bouton



	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Utilisateur</h1></header>
<form action="#" method="Post">
historique: <input type="submit" name ="historique" value="historique" />
<table>
    <td><?php if(!isset($_Post['historique'])){$sql =$bdd->prepare('SELECT datereservation From place');
    $sql->execute();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
    echo $row ['datereservation'];
    }
}?></td>
    <td></td>
</table>
</form>

</body>
</html>
