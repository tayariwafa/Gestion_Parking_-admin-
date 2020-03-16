<?php
session_start();
require 'db.php';
$id = $_GET['id'];
$message = '';
$sql = 'SELECT * FROM gardiens WHERE id_g=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['Prenom'])  && isset($_POST['cin']) && isset($_POST['Telephone'])  && isset($_POST['Salaire'])&& isset ($_POST['NbHeure'])  && isset($_POST['TempsHoraire']) && isset($_POST['Nomdeutilisateur'])  && isset($_POST['password'])
)  {
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
 {
  if(($_POST['TempsHoraire']=="matin")||($_POST['TempsHoraire']=="soirs"))
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
  $sql = 'UPDATE gardiens SET email_g=:email,Prenom_g=:Prenom ,Nom_g=:name,cin_g=:cin, tel_g=:tel, salaire_g=:Salaire, NbHeure_g=:NbHeure, TempsHoraire_g=:TempsHoraire, NomUtilisateur_g=:user ,mdp_g=:mdp
 WHERE id_g=:id';

  $statement = $connection->prepare($sql);

  if ($statement->execute(['id' => $id,':email'=> $email ,':Prenom' => $Prenom,':name' => $name  ,':cin' => $cin,':tel' => $tel,':Salaire' => $Salaire,':NbHeure' => $NbHeure,':TempsHoraire' => $TempsHoraire,':user' => $user,':mdp' => $mdp ] ))  {
    header("Location:affiche_g.php");
  }
  }
else{$message = "Le Temps Horaire doit etre soit matin,soit soirs";}
}
else {$message = "Le nombre d'heure doit etre un nombre numerique est positive";}
}
else {$message = "Le salaire doit etre une valeure numerique est positive";}
}
else {$message = "Le numéro de téléphone doit etre un nombre de huit chiffre";}
}
else {$message = "Le numéro de carte d'identitée doit etre un nombre de huit chiffre";}
}else{$message = "Le prénom doit etre une chaine de caractère";}
}else{$message = "Le nom doit etre une chaine de caractère";}
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
      <h2 class="h2">Modifier Gardien</h2>
    </div>
    <div class="card-body">
       <div class="cardbodymes">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?></div>
      <form method="post" class="form">
        <div class="form-group">
          <label for="name">Nom</label>
          <input type="text" value="<?= $person->Nom_g; ?>" name="name" id="name" class="form-control">
           </div>
            <div>
           <label for="Prenom">Prénom</label>
          <input type="text" value="<?= $person->Prenom_g; ?>" name="Prenom" id="Prenom" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" value="<?= $person->email_g; ?>" name="email" id="email" class="form-control">
        </div>
         <div>
           <label for="cin">Cin</label>
          <input type="text" maxlength="8" value="<?= $person->cin_g; ?>" name="cin" id="cin" class="form-control">
        </div>
         <div>
           <label for="Telephone" >Numéro Téléphone</label>
          <input type="text" maxlength="8" value="<?= $person->tel_g; ?>" name="Telephone" id="Telephone" class="form-control">
        </div>
         <div>
           <label for="Salaire">Salaire</label>
          <input type="text" value="<?= $person->salaire_g; ?>" name="Salaire" id="Salaire" class="form-control">
        </div>
         <div>
           <label for="NbHeure">Nb Heure</label>
          <input type="text" value="<?= $person->NbHeure_g; ?>" name="NbHeure" id="NbHeure" class="form-control">
        </div>
         <div>
           <label for="TempsHoraire">Temps Horaire</label>
          <input type="text" value="<?= $person->TempsHoraire_g; ?>" name="TempsHoraire" id="TempsHoraire" class="form-control">
        </div>
           <div>
           <label for="Nomdeutilisateur">Nom utilisateur</label>
          <input type="text" value="<?= $person->NomUtilisateur_g; ?>" name="Nomdeutilisateur" id="Nomdeutilisateur" class="form-control">
        </div>
        <div>
           <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" class="form-control">
        </div><br/>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier Gardien</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php require 'footer.php'; ?>
 
 </body>
 </html>
