

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer patient et rendez vous</title>
</head>
<body>
<body>
<?php if(isset($_GET["message"])) : ?>
   <div style="padding:10px;background:green;color:#fff;">
   <?=    $_GET["message"]?>
   </div>          
     <?php endif ;?>     

<a href="ajout.patient.php"> créer nouveau patient  </a></br>
<a href="liste-patients.php"> Liste patients </a></br>
<a href="ajoutrendezvous.php"> Creer rendez vous </a></br>
<a href="listerendezvous.php"> Liste rendezvous </a></br>
<a href="patientRDV.php"> Patients et RDV </a></br>
<a href="pagination.php"> Pagination</a></br>
</body>
</html>