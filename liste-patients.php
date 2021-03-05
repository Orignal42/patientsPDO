<?php



require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare('SELECT * FROM patients  ');
$selectStatement->execute(); 
$reponse=$selectStatement;


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
</head>
<body>
<h1> Liste des patient</hi></br>
<a href="index.php">accueil</a>
<a href="ajout.patient.php"> créer nouveau patient  </a>
</br>
<table border=1>
<thead>
<tr>
<th>nom</th>
    <th>prénom</th>
        <th> id patient</th>
            <th>profil patient</th>
                <th>modifier patient</th>
                <th>supprimer</th>
</tr>
</thead>

<tbody>

<?php 
    
           foreach ($selectStatement->fetchAll() as $patient){
               ?>
               <tr>
               <td><?= $patient['firstname']?></td>
  
               <td><?= $patient['lastname'];?></td>

               <td><?= $patient['id'];?></td>

               <td> <a href="profilpatients.php?id=<?=$patient["id"]?>" >clic moi</a></td>
 
               <td><a href="modif.php?id=<?=$patient["id"]?>">clic moi</a></td>
               <td><a href="delete.php?id=<?=$patient["id"]?> ">supprimer patient</a></td>
           
               </tr>

 <?php   

           }
?>
</tbody>
<form type="get" action="recherche.php" name="search">
    <div> 
        <input type="search" id="maRecherche" name="search">  
        <button>Rechercher</button> 
    </div> 
</form>   
</body>
</html>
