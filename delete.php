<?php
require 'db.php';
$id = $_GET['id'];

$sql = 'DELETE  FROM gardiens WHERE id_g=:id';

$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id ])) {
  header("Location: affiche_g.php");
}?>