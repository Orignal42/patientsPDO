<?php

require_once(__DIR__."/pdo.php");



$patientsParPage = 5;
$patientsTotalesReq = $pdo->query('SELECT id,lastname,firstname FROM patients');
$patientsTotales = $patientsTotalesReq->rowCount();
$pagesTotales = ceil($patientsTotales/$patientsParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$patientsParPage;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <link href="./patients.css" rel="stylesheet">
</head>
<body>


<?php
      $patients = $pdo->query('SELECT * FROM patients ORDER BY id DESC LIMIT '.$depart.','.$patientsParPage);
      while($vid = $patients->fetch()) {
      ?>
      <b>N°<?php echo $vid['id']; ?> - <?php echo $vid['lastname']; ?></b><br />
      <i><?php echo $vid['firstname']; ?></i>
      <br /><br />
      <?php
      }
      ?>
      <?php
      for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
            echo $i.' ';
         } else {
            echo '<a href="pagination.php?page='.$i.'">'.$i.'</a> ';
         }
      }
      ?>
      <a href="index.php">accueil</a>
