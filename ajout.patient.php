<?php
require_once(__DIR__."/pdo.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un patient</title>
</head>
<body>
<h1>Créer un patient</h1> 
<form action="insert.php" method="post" >
    
               
               <p> <label>Prénom :<input type="text" name="lastname" required placeholder="prénom" ></label></p>
                <p><label> Nom:<input type="text" name="firstname" required placeholder="nom" >   </label></p>                 
                <p><label> Date de naissance:<input type="date" required name="birthdate">   </label></p>
                <p><label> Téléphone:<input type="text" name="phone"placeholder="téléphone" >   </label></p>
                <p><label> Email:<input type="text" name="mail" required placeholder="email">   </label></p>
                <button>Creer patient</button>
           
            </form>



    
</body>
</html>

