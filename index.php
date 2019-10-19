<?php 
 include_once ("./Pages/db.php");
if(count($_POST)>0) {

$name = $_POST['nom_user'];
$prenom = $_POST['Prenom_user'];
$mdp = $_POST['mdp_user'];
var_dump($_POST);
//die;

$sql = "INSERT INTO `user`( `nom_user`, `Prenom_user`,`mdp_user`)"
." VALUES ( '$name','$prenom', '$mdp' )";
mysqli_query($conn,$sql);
$cur_id = mysqli_insert_id($conn);
var_dump($conn);
if($cur_id>0){
  echo"ok";
} 
else{
  echo"erreur";
}


} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>PPE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel ="stylesheet" href="./CSS/style.css">

</head>
<body>
<header>
  <h1>Inscription</h1>
</header>
<main>
  <form method="POST" action="index.php">
  <table>
    <td>
      <tr>Nom:</tr>
    </td>
    <td>
      <tr><input type="text" placeholder="Nom" id="nom_user" name="nom_user"></tr>
    </td>
    <br>
    <td>
      <tr>Pseudo:</tr>
    </td>
    <td>
      <tr><input type="text" placeholder="Prénom" id="Prenom_user" name="Prenom_user"></tr>
    </td>
    <br>
    <td>
      <tr>Mot de passe:</tr>
    </td>
    <td>
      <tr><input type="password" placeholder="Mot de passe" id="mdp_user" name="mdp_user"></tr>
    </td>
    <section>
    <input type="submit"/>
  </section>
  </table>
  </form>
  </main>
</body>
</html>