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
        $bdd->query('INSERT INTO user(nom, email, admin, mdp, place) VALUES ("'.$nom.'","'.$email.'","'.$admin.'","'.$mdp.'","'.$place.'")');
                $return = "utilisateur creer";
    }
    if(!empty($nom) and !empty($email) and !empty($admin) and !empty($mdp) and !empty($place)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          if(strlen($nom) <= 50){
            $testEmail = $bdd->prepare('SELECT id FROM  user WHERE email = "'.$email.'"');
            $testEmail->execute();
            if($testEmail->rowCount() < 1){
                $bdd->query('INSERT INTO user(nom, email, admin, mdp, place) VALUES ("'.$nom.'","'.$email.'","'.$admin.'","'.$mdp.'","'.$place.'")');
                $return = "utilisateur creer";
            }else return "adresse mail deja utilisé";
          }else $return = "vous etes limite a 50 caracteres";
        }else $return = "email invalide";
    }else $return = "champ manquant";
}
//formulaire connexion
if(isset($_POST['login'])){
    $email =$_POST['email'];
    $mdp =$_POST['mdp'];
    if(!empty($email) and !empty($mdp)){
        $verifUser = $bdd->prepare('SELECT id FROM  user  WHERE email ="'.$email.'" and mdp ="'.$mdp.'"');
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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body> 
    <main>
        <a href="http://127.0.0.1/Page_administrateur.php">Page Administrateur</a>
        <a href="http://127.0.0.1/Page_utilisateur.php">Page Utilisateur</a>
   </main>
    <header><h1>Accueil</h1></header>

    
    <form action="#" method="post">
<p>
   nom :<input type="text" name="nom" />
</p>
<p>
   email :<input type="email" name="email" />
</p>
<p>
   admin :<input type="text" name="admin" />
</p>
<p>
   mdp :<input type="password" name="mdp" />
</p>
<p>
   place :<input type="text" name="place" />
</p>

<input type="submit" name ="inscription" value="inscription" />
</form>
     
    <form action="Page_utilisateur" method="post">
    <input type="email" name="email">
    <input type="password" name="mdp">
    <input type="submit" name ="login" value="connexion" />
    </form>
</body>
</html> 
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
?>