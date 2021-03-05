<?php



require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare(
    "SELECT appointments.*,
            patients.firstname,patients.lastname 
     FROM appointments  
     JOIN patients 
     ON patients.id=appointments.idPatients 
    WHERE appointments.id=?
     ");
$selectStatement->execute([$_GET["id"]]); 
$appointment=$selectStatement->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile patient</title>
</head>
<body>
   
<h1>RDV</h1>
 


            
              Prénom: <?= $appointment['firstname']?></br>
               Nom:<?= $appointment['lastname']?></br>
  
               ID:<?= $appointment['id']?></br>
  
               Patient:<?= $appointment['idPatients']?></br>

               date et heure:<?= $appointment['dateHour']?></br>

            
                
            



</tbody>
</body>
</html>