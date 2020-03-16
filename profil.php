<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');
if(isset($_SESSION['id']) )
{
    $requser = $bdd->prepare('SELECT * FROM responsables WHERE id=? ');
     $requser->execute(array($_SESSION['id']));
      $user = $requser -> fetch(); 
?>
</!DOCTYPE html>
<html>
<head>
   <?php require 'header.php'; ?>
<style type="text/css">
  .form5 {
    width: 700px;
    height: 500px;
    background: #e6e6e6;
    border-radius: 10px;
    box-shadow: 0 0 40px -10px #000;
    margin: calc(35vh - 220px) auto;
    padding: 40px 50px;
    max-width: calc(100vw - 40px);
    box-sizing: border-box;
    font-family: 'Montserrat',sans-serif;
    position: relative;}
    p{
      width:100%;
  padding-top:8px;
  padding-bottom:-80px;
  box-sizing:border-box;
  background:none;
  outline:none;
  resize:none;
  border:0;
  font-family:'Montserrat',sans-serif;
  transition:all .3s;
  border-bottom:2px solid #bebed2;

    }
        .lab{

    content: attr(type);
    display: block;
    margin: 10px 0 0;
    font-size: 17px;
    color: #000;}

</style>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/styleedit.css" >
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
        <h1 class="h3">profil</h1><br/>
        </div>
         <form  method="post" class="form5">
<label class="lab">Nom</label>
          <p> <?php echo $user['Nom_resp'];?><br/><br/></p>
            <label class="lab">Prénom </label>
           <p> <?php echo $user['Prenom_resp'];?><br/><br/></p>
          <label class="lab">Nom  utilisateur </label>
           <p> <?php echo $user['NomUtilisateur_resp'];?><br/><br/></p>
            <label class="lab">E-mail </label>
           <p> <?php echo $user['email_resp'];?><br/><br/></p>
             <label class="lab">Numéro du téléphone  </label>
            <p> <?php echo $user['tel_resp'];?><br/><br/></p>

</form>


      </section>
</body>
</head>
</html>
<?php
}
?>