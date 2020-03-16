<?php
session_start();
require 'db.php';
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');
$message = '';
if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty ($_POST['Prenom'])  AND !empty($_POST['cin']) AND !empty ($_POST['Telephone'])  AND !empty($_POST['Salaire'])AND !empty ($_POST['NbHeure'])  AND !empty($_POST['TempsHoraire']) AND !empty ($_POST['Nomdeutilisateur'])  AND !empty($_POST['password'])
) 
{
  if(isset($_SESSION['id']) )
{
    $requser = $bdd->prepare('SELECT * FROM responsables WHERE id=? ');
     $requser->execute(array($_SESSION['id']));
      $userinfo = $requser -> fetch(); 

$flagSyntaxetel=preg_match('#^[0-9]{8}$#',$_POST['Telephone']);
$flagSyntaxecin=preg_match('#^[0-9]{8}$#',$_POST['cin']);
 if (ctype_alpha($_POST['name'])) {
   if (ctype_alpha($_POST['Prenom'])) {
if($flagSyntaxecin==1)
 {
if($flagSyntaxetel==1)
 {
  if((ctype_digit($_POST['Salaire']))&&($_POST['Salaire']>0))
 {
    if((ctype_digit($_POST['NbHeure']))&&($_POST['NbHeure']>0))
 {if(($_POST['TempsHoraire']=="matin")||($_POST['TempsHoraire']=="soirs"))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
 $Prenom= $_POST['Prenom'];
$cin=$_POST['cin'];
$tel=$_POST['Telephone'];
 $Salaire= $_POST['Salaire'];
 $NbHeure= $_POST['NbHeure'];
$TempsHoraire=$_POST['TempsHoraire'];
$user=$_POST['Nomdeutilisateur'];
$mdp=sha1($_POST['password']);
$nompark=$userinfo['id_Park'];
  $sql = 'INSERT INTO gardiens (email_g,Prenom_g,Nom_g,cin_g,tel_g,salaire_g,NbHeure_g,TempsHoraire_g ,NomUtilisateur_g,mdp_g,Id_park) VALUES(:email ,:Prenom,:name,:cin,:tel,:Salaire,:NbHeure,:TempsHoraire,:user,:mdp,:nompark)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':email' => $email,':Prenom' => $Prenom,':name' => $name,':cin' => $cin,':tel' => $tel,':Salaire' => $Salaire,':NbHeure' => $NbHeure,':TempsHoraire' => $TempsHoraire,':user' => $user, ':mdp' => $mdp,':nompark'=> $nompark ] )) {
    $message = 'Gardien ajouter avec succès';
  }
}
else{$message = "Le Temps Horaire doit etre soit matin,soit soirs";}
}
else {$message = "Le nombre d'heure doit etre un nombre numerique est positive";}
}
else {$message = "Le salaire doit etre une valeure numerique est positive";}
}
else {$message = "Le numéro de téléphone doit etre un nombre de huit chiffre";}
}else {$message = "Le numéro de carte d'identitée doit etre un nombre de huit chiffre";}
}else{$message = "Le prénom doit etre une chaine de caractère";}
}else{$message = "Le nom doit etre une chaine de caractère";}
}
}else
{
   $message = 'Tous les champs sont obligatoire';
}



 ?>
 </!DOCTYPE html>
<html>
<head>
<?php require 'header.php'; ?>
  <style type="text/css">
   
      section{
 margin-left: 205px;
      }      
            
        </style>
      
<link rel="stylesheet" type="text/css" href="css/styleajout.css">
</head>
<body>
  <section>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Ajouter un Gardien</h2>
    </div>
    <div class="card-body">
       <div class="cardbodymes">
      <?php if(!empty($message)) : ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?></div>
      <form method="post" class="form">
        <div class="form-group">
          <label for="name">Nom</label>
          <input type="text" name="name" id="name" class="form-control">
           </div>
            <div>
           <label for="Prenom">Prénom</label>
          <input type="text" name="Prenom" id="Prenom" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
         <div>
           <label for="cin">Cin</label>
          <input type="text"  maxlength="8" name="cin" id="cin" class="form-control">
        </div>
         <div>
           <label for="Telephone">Téléphone</label>
          <input type="text"  maxlength="8" name="Telephone" id="Telephone" class="form-control">
        </div>
         <div>
           <label for="Salaire">Salaire</label>
          <input type="text" name="Salaire" id="Salaire" class="form-control">
        </div>
         <div>
           <label for="NbHeure">NbHeure</label>
          <input type="text" name="NbHeure" id="NbHeure" class="form-control">
        </div>
         <div>
           <label for="TempsHoraire">Temps Horaire</label>
          <input type="text" name="TempsHoraire" id="TempsHoraire" class="form-control">
        </div>
        
           <div>
           <label for="Nomdeutilisateur">Nom utilisateur</label>
          <input type="text" name="Nomdeutilisateur" id="Nomdeutilisateur" class="form-control">
        </div>
        <div>
           <label for="password">Mot de passse</label>
          <input type="password" name="password" id="password" class="form-control">
        </div><br/>

        <div class="form-group">
          <button type="submit" >Ajouter un Gardien</button>
        </div>
      </form>
    </div>
  </div>
</div></section>
<?php require 'footer.php'; ?>
</body>
</html>