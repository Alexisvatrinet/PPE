<?php
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
if(isset($_POST['inscription'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $mdp = $_POST['mdp'];
    $place = $_POST['place'];
    if(!empty($nom) and !empty($email) and !empty($admin) and !empty($mdp) and !empty($place)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(strlen($nom) <= 50){
                $TestEmail = $bdd->prepare('SELECT id FROM user WHERE email ="'.$email.'"');
                $return ="utilisateur créer!";
                if($TestEmail->rowCount() < 1){
                     $bdd->query('INSERT INTO user(nom, email,mdp) VALUES ("'.$nom.'","'.$email.'","'.$mdp.'")');

                }else $return="adresse mail deja utilisé";
            }else $return="limite a 50 caracteres";
        }else $return = "email invalide";
    }else $return = "un ou plusieurs champs manquants";
        
}
//formulaire connexion
if(isset($_POST['login'])){
    $email =$_POST['email'];
    $mdp =$_POST['mdp'];
    if(!empty($email) and !empty($mdp)){
        $verifUser = $bdd->query('SELECT id FROM  user  WHERE email ="'.$email.'" and mdp ="'.$mdp.'"');
        $userData = $verifUser->fecth();
        if($verifUser->rowCount() == 1){
            $_SESSION['login'] = $userData['id'];
            $return = "vous etes connecter";
        }else $return = "identifiants incorrect";
    }else $return = "champ manquant";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'Accueil</title>
</head>
<body> 
    <main>
        <a href="http://127.0.0.1/Page_administrateur.php">Page Administrateur</a>
        <a href="http://127.0.0.1/Page_utilisateur.php">Page Utilisateur</a>
   </main>
    <header><h1>Accueil</h1></header>
    <?php
        if(isset($_POST['inscription'])  and isset($return)) echo $return
    ?>
    
    <form action="#" method="post">
<p>
   nom :<input type="text" name="nom" placeholder="votre nom" />
</p>
<p>
   email :<input type="email" name="email" placeholder="votre email"/>
</p>
<p>
   admin :<input type="text" name="admin" placeholder="votre admin"/>
</p>
<p>
   mdp :<input type="password" name="mdp" placeholder="votre mdp"/>
</p>
<p>
   place :<input type="text" name="place" placeholder="votre place"/>
</p>

<input type="submit" name ="inscription" value="inscription" />
    <?php
        if(isset($_POST['login']) and isset($return)) echo $return;
    ?>
    </form>
    <form action="#" method="post">
    <input type="email" name="email">
    <input type="password" name="mdp">
    <input type="submit" name ="login" value="connexion" />
    </form>
</body>
</html> 