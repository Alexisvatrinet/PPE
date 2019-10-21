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

if (isset($_POST['nom_proprio'])) {

	// lancement de la requête
	$sql = 'SELECT id_user,place,nom FROM user' ;

	// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	// on récupère le résultat sous forme d'un tableau
	$data = mysql_fetch_array($req);

	// on libère l'espace mémoire alloué pour cette interrogation de la base
	mysql_free_result ($req);
	mysql_close ();

// on affiche le résultat
	echo 'Le numéro de votre place est : '.$data['place'];
}
else {
	echo '   La variable place n\'est pas déclarée';
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
    <header><h1>Utilisateur</h1></header>

	historique: <input type="submit" name ="historique" value="inscription" />
</body>
</html>
