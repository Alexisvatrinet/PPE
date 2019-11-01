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
<tr>
    <td>Pour&nbsp;reserver&nbsp;:<input type="submit" name="reservation" value="reservation"></td>
</tr>
<td><?php require('date.php'); 
          $date = new Date();
          $year = date('Y');
          $dates =$date->getAll($year);  ?></td>
          <div class="periods">
           <div class="year"><?php echo $year?></div>
           <div class="months"><ul>
                <?php foreach ($date->months as $id=>$m): ?> 
                    <li><a href="#" id="linkMonth"<?php echo $id+1;?>><?php echo utf8_encode(substr(utf8_decode($m),0,3)); ?></a></li>
                  <?php endforeach; ?>
              </ul>
            </div>
            <?php $dates = current($dates); ?> 
            <?php foreach ($dates as $m=>$days): ?>
            <div class="months" id="months"><?php echo $m ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($date->days as $d) : ?>
                        <th>
                        <?php echo substr($d,0,3);?>
                        </th>
                        <?php endforeach ; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <?php $end= end($days); foreach ($days as $d=>$w) : ?>
                    <?php if($d == 1):?>
                    <td colspan=""><?php echo $w-1; ?></td>
                    <?php endif;?>
                        <td>
                            <div class ="relative">
                            <div class ="day"><?php echo $d; ?></div>
                            </div>
                        </td>
                        <?php if($w == 7): ?>
                        </tr></tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if($end != 7):?>
                    <td colspan=""><?php echo 7-$end; ?></td>
                    <?php endif;?>
                    </tr>       
                </tbody>
            </table></div>
            <?php endforeach ; ?>
          </div>
          <pre><?php print_r($dates);?></pre>
</table>
</form>

</body>
</html>
