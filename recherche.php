<?php

require_once(__DIR__."/pdo.php");


$search=$_GET["search"];


$selectStatement=  $pdo -> prepare("SELECT * FROM patients WHERE firstname LIKE '$search%'OR lastname  LIKE '$search%'");
$selectStatement->execute(); 

if (empty($search)){
    die("parametre manquants");
}

$data = $selectStatement->fetchAll();
foreach($data as $patient){
    ?>
  


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <table border=1>
    <thead>
    <tr>
    <th>Nom:</th>
   <th> Prénom:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><?= $patient['firstname']?></td>

    <td><?= $patient['lastname']?></td>
    </tr>
    </tbody>
    <?php }



if(empty($data) ){
die ("Le patient doit être créé. Je ne l'ai pas trouvé");
}

;
    
    ?>
    </table>
    </body>
    </html>