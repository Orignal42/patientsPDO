<?php

require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare('SELECT * FROM patients WHERE id=? ');
$selectStatement->execute([
    $_GET["id"] 
]); 


$patient= $selectStatement->fetch();
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un patient</title>
</head>
<body>
<h1>Modifier un patient</h1> 
<form action="update.php?id=<?=$patient['id']?>" method="post" >
    
               
               <p> <label>Prénom :<input type="text" name="lastname" required placeholder="prénom" value="<?=$patient["lastname"]?>"></label></p>
                <p><label> Nom:<input type="text" name="firstname" required placeholder="nom"  value="<?=$patient["firstname"]?>"> </label></p>                 
                <p><label> Date de naissance:<input type="date" required name="birthdate"   value="<?=$patient["birthdate"]?>"> </label></p>
                <p><label> Téléphone:<input type="text" name="phone"placeholder="téléphone"   value="<?=$patient["phone"]?>">  </label></p>
                <p><label> Email:<input type="text" name="mail" required placeholder="email" value="<?=$patient["mail"]?>" >  </label></p>
                <button>Modifier patient</button>
           
            </form>



    
</body>
</html>


