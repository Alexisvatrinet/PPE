<?php
session_start();
function Securise($string){
    if(ctype_digit($string)){
        $string = intval($string);
    }else{
        $string = strip_tags($string);
        $string = addcslashes($string,'%');
    }
    return $string;
}

/*function PasswordHash($str){
    $str = shal(md5('fltichen'.$str));
    return $str;
}*/
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
    $nom = Securise($_POST['nom']);
    $email = Securise($_POST['email']);
    $admin = Securise($_POST['admin']);
    $mdp = Securise($_POST['mdp']);
    $place = Securise($_POST['place']);
    if(!empty($nom) and !empty($email) and !empty($mdp)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(strlen($nom) <= 50){
                //$mdp = PasswordHash($mdp);
                $TestEmail = $bdd->prepare('SELECT id_user FROM user WHERE email ="'.$email.'"');
                if($TestEmail->rowCount() < 1){
                     $bdd->query('INSERT INTO user(nom,email,mdp) VALUES ("'.$nom.'","'.$email.'","'.$mdp.'")');
                     $return ="utilisateur créer!";
                }else $return="adresse mail deja utilisé";
            }else $return="limite a 50 caracteres";
        }else $return = "email invalide";
    }else $return = "un ou plusieurs champs manquants";
        
}
//formulaire connexion
if(isset($_POST['login'])){
    $email = Securise($_POST['email']);
    $mdp = Securise($_POST['mdp']);
    if(!empty($email) and !empty($mdp)){
        //$mdp = PasswordHash($mdp);
        $verifUser = $bdd->query('SELECT id_user FROM  user  WHERE email ="'.$email.'" and mdp ="'.$mdp.'"');
        $userData = $verifUser->fetch();
        if($verifUser->rowCount() == 1){
            $_SESSION['login'] = $userData['id_user'];
            header('location:Page_utilisateur.php');
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css">
    <link href="style.css" rel="stylesheet">

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
    <section>
    <form action="#" method="post">
<p>
   <input type="text" name="nom" placeholder="Nom" />
</p>
<p>
<input type="email" name="email" placeholder="Mail"/>
</p>
<p>
<input type="text" name="admin" placeholder="Admin"/>
</p>
<p>
<input type="password" name="mdp" placeholder="Mot de passe"/>
</p>
<p>
<input type="text" name="place" placeholder="Place"/>
</p>

<input type="submit" name ="inscription" value="inscription" />
</section>
    <?php
        if(isset($_POST['login']) and isset($return)) echo $return;
    ?>
    <main>
    </form>
    <form action="#" method="post">
    <p>
    <input type="email" placeholder="Mail" name="email">
    </p>
    <p>
    <input type="password" placeholder="Mot de passe" name="mdp">
    </p>
    <input type="submit" name ="login" value="connexion" />
    </form>
    </main>
</body>
</html> 