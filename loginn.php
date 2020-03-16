<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');

if(isset($_POST['formlogin']))
{
     
         
    $mailconnect=htmlspecialchars($_POST['nom']); 
    $mdpconnect=sha1($_POST['password']); 
  if (!empty($_POST['nom']) AND !empty($_POST['password']))
    {  
      $requser = $bdd ->prepare("SELECT * FROM responsables WHERE NomUtilisateur_resp =?  AND mdp_resp=?");
        $requser->execute(array($mailconnect , $mdpconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1)
            {
                $userinfo = $requser->fetch();
                $_SESSION['id']=$userinfo['id'];
                 $_SESSION['nom']=$userinfo['nom'];
                  $_SESSION['password']=$userinfo['password'];
               header("Location:acceuil.php?id=". $_SESSION['id']);  
            }
            else
            {
               $erreur="Votre donn&eacute;es son incorrect !";
            }
  
 
     }
      else {if (empty($_POST['nom']) && empty($_POST['password']))
         {$erreur="Les deux champs doivent &eacute;tre remplie! ";}
         else{
            if (empty($_POST['nom']) && !empty($_POST['password']) )
         {$erreur=" Nom utilisateur doit &eacute;tre remplie !  ";} 
     else{
 
        if ( empty($_POST['password']))
         {$erreur=" Mot de passe doit &eacute;tre remplie ! ";}}}
       
   }}

?>
<!DOCTYPE html>

<html>
<head>
    <link rel="shortcut icon" href="logo1.png" />
<title> Login</title>
    <link rel="stylesheet" type="text/css" href="css/file.css"></head>
<body>
    <div class="loginbox">
    <img src="logo1.png" class="avatar"/><br/>
        <h1>Se connecter</h1><br/>
        <form name="login" method="post" action="loginn.php">
            <p>Nom utilisateur</p>
            <input type="text" name="nom" placeholder="Enter votre nom">
            <p>Mot de passe</p>
            <input type="password" name="password" placeholder="Enter votre mot de passe">
            <input type="submit" name="formlogin" value="Connexion">
            <br/><br/><br/>
			<a href="recuperation.php">Mot de passe oubli&eacute; !</a><br>
            
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