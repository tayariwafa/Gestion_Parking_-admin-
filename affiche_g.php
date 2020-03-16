<?php
session_start();
require 'db.php';
if(!empty($_POST['nom']))
{
$nom=$_POST['nom'];
$id = $_SESSION['id'];
$sql1 = "SELECT * FROM gardiens,responsables where responsables.id=? and responsables.id_Park=gardiens.id_Park and gardiens.Nom_g LIKE '%$nom%' ";
$statement = $connection->prepare($sql1);
$statement->execute(array($_SESSION['id']));
$people = $statement->fetchAll(PDO::FETCH_OBJ);
}else{
$sql = 'SELECT * FROM gardiens,responsables where responsables.id=? and responsables.id_Park=gardiens.id_Park';
$statement = $connection->prepare($sql);
$statement->execute(array($_SESSION['id']));
$people = $statement->fetchAll(PDO::FETCH_OBJ);}
 ?>
 </!DOCTYPE html>
 <html>
 <head>

<?php require 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/style1.css">
  <style type="text/css">
      section{
 margin-left: 205px;
      }      
      .card-header{
        width: 1100px;
        margin-left: 20px;

      }
      .buttonajout:hover {
  line-height: 1;
 
  font-size: 1.2rem;
  text-decoration: none;
  border-radius: 8px;
  
  color: #107710;
  border: 2px solid #107710;
  padding: 8px;
 background-color: #fff;
  padding-top: 20px; 
  padding-left: 50px;
  padding-bottom:  20px; 
  padding-right:  50px;
  margin-left: 20px; 
}
 /* search bar */ 

.flex-form input[type="submit"] {
  background: #629AD2;
  border: 1px solid #629AD3;
  color: #fff;
  padding: 0 30px;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
  text-align: center;

}

.flex-form input[type="submit"]:hover {
  background: #d73851;
  border: 1px solid #d73851;
}

.flex-form {
   border-radius: 20px;
  display: -webkit-box;
  display: flex;
  z-index: 10;
  float: right;
  width: 300px;
  margin-top:-50px;
 
height: 35px;
text-align: center;
  margin-right: 70px;
  box-shadow: 4px 8px 16px rgba(0, 0, 0, 0.3);
}

.flex-form > * {
  border: 0;
  padding: 0 0 0 10px;
  background: #fff;
  line-height: 10px;
  font-size: 1rem;
  text-align: center;
  border-radius: 0;
  outline: 0;
  -webkit-appearance: none;
}

input[type="search"] {
  flex-basis: 500px;

}



@media all and (max-width:800px) {
  

  .flex-form {
    width: 100%;
  }

  input[type="search"] {
    flex-basis: 100%;
  }

  .flex-form > * {
    font-size: 0.9rem;
  }

}

@media all and (max-width:360px) {
  
  .flex-form {
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
  }

  input[type="search"] {
    flex-basis: 0;
  }

}     

            
        </style>
        
           </head>
 <body>
 
<section>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <a href="create.php" class="buttonajout">Ajouter nouveau gardien</a>
       <div id="search5back">

    <form  class="flex-form" method="post" action="affiche_g.php ">
      <label for="from">
        <i class="ion-location"></i>
      </label>
      <input type="search" name="nom" placeholder="Le nom de gardien a recherche ">
      <input type="submit" value="Search">
    </form>
                
    </div>
    </div>
    <div class="card-body">
      <main>
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Cin</th>
          <th>E-mail</th>
          <th>Téléphone</th>
          <th>Salaire</th>
          <th>Nb Heure</th>
          <th>Temps Horaire</th>
          <th class="action">Opération</th>
        </tr>
      </thead>
        <tbody>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id_g; ?></td>
            <td><?= $person->Nom_g; ?></td>
            <td><?= $person->Prenom_g; ?></td>
            <td><?= $person->cin_g; ?></td>
            <td><?= $person->email_g; ?></td>
            <td><?= $person->tel_g; ?></td>
            <td><?= $person->salaire_g; ?></td>
            <td><?= $person->NbHeure_g; ?></td>
            <td class="action"><?= $person->TempsHoraire_g; ?></td>
               
                  

            <td>
              <a href="edit.php?id=<?= $person->id_g ?>" class="button"><img class="icon-user" src="modifier.png"></a> &nbsp;&nbsp;
              <a onclick="return confirm('Voulez-vous vraiment supprimer ce gardien ?')" href="delete.php?id=<?= $person->id_g ?>" class='button1'><img class="icon-user" src="supprimer.png"></a>
            </td>
          </tr>
        <?php endforeach; ?>
          </tbody>
      </table></main>
    </div>
  </div>
</div>

</section>
<?php require 'footer.php'; ?>

 </body>
 </html>