<?php


require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo -> prepare('SELECT * FROM patients ');
$selectStatement->execute(); 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un rendez vous</title>
</head>
<body>
<h1>Créer un rendez vous</h1> 
<form action="insertrendezvous.php" method="post" >
    
<label name="id">
<SELECT name="idPatients">
<OPTION></OPTION>
<?php  foreach($selectStatement->fetchAll() as $patient){?>
<option value=<?=$patient["id"]?>><?=$patient["firstname"]?><?=$patient["lastname"]?>  </option>

<?php
};
?>
</SELECT>
</label>
              

<p> <label>Date et heure :<input type="date" name="date" required> 
     <input type="time" name="time" required ></label></p>                 

      <button>Creer rendez vous</button>
        
  </form>



    
</body>
</html>