<?php



require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare(
    "SELECT appointments.*,
            patients.firstname,patients.lastname 
     FROM appointments  
     JOIN patients 
     ON patients.id=appointments.idPatients 
    
     ");
$selectStatement->execute(); 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez vous</title>
    <link href="./patients.css" rel="stylesheet">
</head>
<body>
<h1> Liste des rendezvous</hi></br>
<a href="index.php">accueil</a>
<a href="ajoutrendezvous.php"> créer nouveau rendez vous  </a>
</br>
<table border=1>
<thead>
<tr>
<th>nom</th>
<th>prénom</th>
    <th>ID</th>
        <th> Patient</th>
            <th>Date</th>
                <th>voir</th>
                <th> modifier</th>
                <th> supprimer</th>
</tr>
</thead>

<tbody>
</br>
<?php 
    
           foreach ($selectStatement->fetchAll() as $appointment){
   ?>
               <tr>
               <td><?= $appointment['firstname']?></td>
               <td><?= $appointment['lastname']?></td>
  
               <td><?= $appointment['id']?></td>
  
               <td><?= $appointment['idPatients'];?></td>

               <td><?= $appointment['dateHour'];?></td>

               <td><a href="voirrdv.php?id=<?=$appointment["id"]?>">clic moi</a></td>
               <td><a href="modifRDV.php?id=<?=$appointment["id"] ?>">clic moi</a></td>
              
               <td><a href="deleteRDV.php?id=<?=$appointment["id"]?>">Suppression</a></td>

               </tr>

 <?php   

           }
?>
</tbody>
</table>

      
</body>
</html>
   