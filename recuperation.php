<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');

if(isset($_POST['fromrecuper']))
{
    $nomconnect=htmlspecialchars($_POST['nom']); 
    $emailconnect=htmlspecialchars($_POST['email']);
   
    if (!empty($nomconnect) AND !empty($emailconnect))
    {

        $requser = $bdd ->prepare("SELECT * FROM responsables WHERE NomUtilisateur_resp =?  AND email_resp=?");
        $requser->execute(array($nomconnect , $emailconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1)
            {
            
              $userinfo = $requser->fetch();
                $_SESSION['id']=$userinfo['id'];
                 $_SESSION['nom']=$userinfo['Nom_resp'];
                  $_SESSION['email']=$userinfo['email_resp'];
               header("Location:update.php?id=". $_SESSION['id']);  
                
            }
            else
            {
               $erreur="email ou nom d'utilisateur non existe ";
            }
    }
    else
    {if (empty($_POST['nom']) && empty($_POST['email']))
         {$erreur="Les deux champs doivent &eacute;tre remplie! ";}
         else{
            if (empty($_POST['nom']) && !empty($_POST['email']) )
         {$erreur=" Nom utilisateur doit &eacute;tre remplie !  ";} 
     else{

        if ( empty($_POST['email']))
         {$erreur=" E-mail doit &eacute;tre remplie ! ";}}}
       
   }



}

?>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/file.css"></head>
<body>
    <div class="loginbox">
    <img src="logo1.png" class="avatar"><br/>
        <h1>v&eacute;rification des informations </h1><br/>
        <form  method="post" action="">
            <p>Nom utilisateur</p>
            <input type="text" name="nom" placeholder="Enter votre nom">
            <p> E-mail :</p>
            <input type="text" name="email" placeholder="Enter votre email">
            <input type="submit" name="fromrecuper" value="v&eacute;rifier">
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