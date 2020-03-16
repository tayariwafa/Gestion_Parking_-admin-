<?php
session_start();
require 'db.php';
$id = $_SESSION['id'];
$date=$_POST['date'];

$sql1 = "SELECT * FROM responsables,reservations,places where responsables.id=?  and places.Id_park=responsables.id_Park and reservations.Id_place=places.id and reservations.DateDeb LIKE '%$date%' ORDER BY DateDeb DESC ";
$statement = $connection->prepare($sql1);
$statement->execute(array($_SESSION['id']));
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 </!DOCTYPE html>
 <html>
 <head>

<?php require 'header.php'; ?>
  <style type="text/css">
   
      section{
 margin-left: 205px;
      }  
        .card-header{
        width: 950px;
        margin-left: 110px;

      }
            
            
        </style>
         <link rel="stylesheet" type="text/css" href="css/style2.css"> </head>
         <body>
        <section>

<div class="content">
  <div class="card mt-5">
    <div class="card-header">
     <div id="search5back_consult">

    <form  class="flex-form" method="post" action="resulta.php">
      <label for="from">
        <i class="ion-location"></i>
      </label>
      <input type="search" name="date" placeholder="La date a recherche ">
      <input type="submit" value="Search">
    </form>
                
    </div>
    </div>
    <div class="card-body2">
        <main>
      <table class="table">
         <thead>
        <tr>
          <th>ID</th>
          <th>Date Debut</th>
          <th>Date Fin</th>
          <th>Heure Debut</th>
          <th>Heure Fin</th>
          <th>Montant Payer</th>         
          <th>Surplus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->DateDeb; ?></td>
            <td><?= $person->DateFin; ?></td>
            <td><?= $person->HeurDeb; ?></td>
            <td><?= $person->HeurFin; ?></td>
            <td><?= $person->MontantPay; ?></td>
            <td><?= $person->Surplus; ?></td>  
          
          </tr>
        <?php endforeach; ?></tbody>
      </table>  <main>
    </div>
  </div>
</div>
</section>
<?php require 'footer.php'; ?>
</body>
</html>
