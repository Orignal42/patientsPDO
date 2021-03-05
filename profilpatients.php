<?php

require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare('SELECT * FROM patients WHERE id=? ');
$selectStatement->execute([$_GET["id"]
]); 


$patient= $selectStatement->fetch();

$selectRdvStatement=  $pdo -> prepare(
    "SELECT appointments.*,
            patients.firstname,patients.lastname 
     FROM appointments  
     JOIN patients 
     ON patients.id=appointments.idPatients 
    WHERE patients.id=?
     ");
$selectRdvStatement->execute([$_GET["id"]
]); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile patient</title>
    <link href="./patients.css" rel="stylesheet">
</head>
<body>
   
<h1>Profile patient</h1>

<table border=1>
<thead>
<tr>
<th>nom</th>
<th>prénom</th>
<th>telephone</th>
<th>profil patient</th>
<th>date de naissance</th>
<th>mail</th>
</tr>



  

 
    <tr>
    <td><?=$patient['firstname'] ?></td>
    <td><?=$patient['lastname'] ?></td>
    <td><?=$patient['phone']?></td>
    <td><?=$patient['id']  ?></td>
    <td><?=$patient['birthdate']   ?></td>
    <td><?=$patient['mail']?></td>
</tr>




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
    
           foreach ($selectRdvStatement->fetchAll() as $appointment){
   ?>
   <h1>liste des rendez vous</h1>
               <tr>
               <td><?= $appointment['firstname']?></td>
               <td><?= $appointment['lastname']?></td>
  
               <td><?= $appointment['id']?></td>
  
               <td><?= $appointment['idPatients'];?></td>

               <td><?= $appointment['dateHour'];?></td>

               <td><a href="voirrdv.php?id=<?=$appointment["id"]?>">👀</a></td>
               <td><a href="modifRDV.php?id=<?=$appointment["id"] ?>">🖊</a></td>
              
               <td><a href="deleteRDV.php?id=<?=$appointment["idPatients"]?>">❌</a></td>

               </tr>

 <?php   

           }
?>
</tbody>
</table>
 
  

</tbody>
</body>
</html>