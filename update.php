<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');

if(isset($_POST['fromupdate']))
{
    $mdp1connect=sha1($_POST['mdp1']); 
    $mdp2connect=sha1($_POST['mdp2']);
    
    if (!empty($_POST['mdp1']) AND !empty($_POST['mdp2']))
    {
  if(isset($_POST['mdp1']) AND $_POST['mdp1'] == $_POST['mdp2']) 
      {
        $newmdp = sha1($_POST['mdp1']);
       $insertmdp = $bdd->prepare("UPDATE responsables SET mdp_resp= ?  WHERE id = ? ") ;
       $insertmdp ->execute(array($newmdp,$_SESSION['id']));
       header('Location:affiche_g.php?id='. $_SESSION['id']);
      }
      else
          {$erreur="le mot de passe n'est pas comfirmer";}
    }
 else

    {
      $erreur="Les deux champs doivent &eacute;tre remplie! ";}
}
?>   

<html>
<head>
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/file.css"></head>
<body>
    <div class="loginbox">
    <img src="logo1.png" class="avatar"><br/>
        <h1>R&eacute;nouvler Mot De Passe </h1><br/>
        <form  method="post" action="">
            <p>Ins&eacute;rer nouveau mot de passe</p>
            <input type="password" name="mdp1" placeholder="mot de passe">
            <p>confirmer nouveau mot de passe</p>
            <input type="password" name="mdp2" placeholder="confirmer nouveau mot de passe">
            <input type="submit" name="fromupdate" value="Confirmer">
            <br/><br/><a href="Loginn.php">Retour</a><br/>
        </form>
        <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur."</font>" ;
        } 
        ?>
    </div>

</body>

</html>