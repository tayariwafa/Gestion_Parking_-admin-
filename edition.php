<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');
$message ='';
if(isset($_SESSION['id']) )
{
    $requser = $bdd->prepare('SELECT * FROM responsables WHERE id=? ');
     $requser->execute(array($_SESSION['id']));
      $user = $requser -> fetch(); 
      //prenom
          if(isset($_POST['newpre']) AND !empty($_POST['newpre'])AND $_POST['newpre'] != $user['Prenom_resp']) 
      {   if (ctype_alpha($_POST['newpre'])) {
        $newpre = htmlspecialchars($_POST['newpre']);
       $insertnom = $bdd->prepare("UPDATE responsables SET Prenom_resp = ?  WHERE id = ? ") ;
       $insertnom ->execute(array($newpre,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }else{$message = "votre prenom doit etre alphabitique";}}
//nom
      if(isset($_POST['newnom']) AND !empty($_POST['newnom'])AND $_POST['newnom'] != $user['Nom_resp']) 
      {if (ctype_alpha($_POST['newnom'])) {
        $newnom = htmlspecialchars($_POST['newnom']);
       $insertnom = $bdd->prepare("UPDATE responsables SET Nom_resp = ?  WHERE id = ? ") ;
       $insertnom ->execute(array($newnom,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }else{$message = "votre nom doit etre alphabitique";}}
      //nomutilisateur
         if(isset($_POST['newnomut']) AND !empty($_POST['newnomut']) AND $_POST['newnomut'] != $user['NomUtilisateur_resp']) 
      {
        $newnomut = htmlspecialchars($_POST['newnomut']);
       $insertnomut = $bdd->prepare("UPDATE responsables SET NomUtilisateur_resp = ?  WHERE id = ? ") ;
       $insertnomut ->execute(array($newnomut,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }  
//email
          if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email_resp']) 
      {
        $newmail = htmlspecialchars($_POST['newmail']);
       $insertmail = $bdd->prepare("UPDATE responsables SET email_resp = ?  WHERE id = ? ") ;
       $insertmail ->execute(array($newmail,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }    
//telephone
      
           if(isset($_POST['newtel']) AND !empty($_POST['newtel'])AND $_POST['newtel'] != $user['tel_resp'] )  
      {
        if((preg_match('#^[0-9]{8}$#',$_POST['newtel']))==1)
        {
        $newtel = htmlspecialchars($_POST['newtel']);
       $inserttel = $bdd->prepare("UPDATE responsables SET tel_resp = ?  WHERE id = ? ") ;
       $inserttel ->execute(array($newtel,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }
      else{$message = "votre numero de telephone doit etre numerique" ;}} 
      
//mot de passe         
      if(isset($_POST['mdp1']) AND !empty($_POST['mdp1'])AND $_POST['mdp1'] != $user['mdp_resp'] AND $_POST['mdp1'] == $_POST['mdp2']) 
      {
        $newmdp = sha1($_POST['mdp1']);
       $insertmdp = $bdd->prepare("UPDATE responsables SET mdp_resp= ?  WHERE id = ? ") ;
       $insertmdp ->execute(array($newmdp,$_SESSION['id']));
       header('Location:profil.php?id='. $_SESSION['id']);
      }      
?>

</!DOCTYPE html>
<html>
<head>
   <?php require 'header.php'; ?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/styleedit.css" >
<style type="text/css">
.cardbodymes{ margin-left: 25%; 
font-size: 18px;
color: red;}
</style>
</head>
<body>
 <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
        <?php  echo ('<img class="img-responsive" alt="" src="'.$user['image_resp'].'"/>')?> 
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?php echo $user['Nom_resp']; ?>  <?php echo $user['Prenom_resp']; ?>
          </div>
          <div class="profile-usertitle-job">
            RESPONSABLE(s)
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="profil.php">
              <i class="glyphicon glyphicon-home"></i>
              Profil </a>
            </li>
            <li>
              <a href="edition.php" >
              <i class="glyphicon glyphicon-ok"></i>
              Modifier Profil</a>
            </li>
         <li>
              <a href="deconnexion.php">
              <i class="glyphicon glyphicon-user"></i>
               Déconnexion</a>
            </li>
          </ul>
        </div>
</div>
<section>
  
  <div class="loginbox">
        <h1 class="h2">Modifier profil</h1><br/>
          <div class="cardbodymes">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success" >
          <?= $message; ?>
        </div>
      <?php endif; ?></div>
         <form  method="post" class="form1">
         <label>Nom</label>
            <input type="text" name="newnom" placeholder="Enter nouveau  nom" value="<?php echo $user['Nom_resp'];?>"><br/><br/>
            <label>Prénom </label>
            <input type="text" name="newpre" placeholder="Enter nouveau  Prénom" value="<?php echo $user['Prenom_resp'];?>"><br/><br/>
          <label>Nom utilisateur </label>
            <input type="text" name="newnomut" placeholder="Enter  nouveau  nom utilisateur" value="<?php echo $user['NomUtilisateur_resp'];?>"><br/><br/>
            <label>E-mail </label>
             <input type="email" name="newmail" placeholder="Enter nouveau  email" value="<?php echo $user['email_resp'];?>"><br/><br/>
             <label>Numéro téléphone  </label>
             <input type="text" maxlength="8" name="newtel" placeholder="Enter nouveau  numéro de téléphone" value="<?php echo $user['tel_resp'];?>"><br/><br/>
             <label>Mot de passe </label>
              <input type="text" name="mdp1" placeholder="Enter nouveau mot de passe"><br/><br/>
              <label>Confirmer  Mot de passe </label>
              <input type="text" name="mdp2" placeholder="Confirmer nouveau mot de passe"><br/><br/>
               <input type="submit" class="button" value="Modifier profil ">


       </form>
    </div>

</section>
</body>
</html>
<?php
}
else 
{
    header("Location:loginn.php");
}

?>