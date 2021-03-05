<?php


require_once(__DIR__."/pdo.php");

$selectPatientsStatement=  $pdo -> prepare('SELECT * FROM patients ');
$selectPatientsStatement->execute(); 


$selectStatement=  $pdo -> prepare('SELECT * FROM appointments WHERE id=? ');
$selectStatement->execute([
    $_GET["id"]
  
]); 

$appointment=$selectStatement->fetch();
$dateTimeParts=explode(" ",$appointment["dateHour"]);
$date=$dateTimeParts[0];
$time=$dateTimeParts[1];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
</head>
<body>
<h1>Modifier un rendez vous</h1> 
<form action="updateRDV.php?id=<?=$appointment["id"]?>" method="post" >
    
<label name="id">
<SELECT name="idPatients">
<OPTION></OPTION>
<?php  foreach($selectPatientsStatement->fetchAll() as $patient){
    $selected="";
    if($patient["id"]===$appointment["id"]){
        $selected="selected";
    }
    ?>
<option value="<?=$patient["id"]?>"<?="selected"?>><?=$patient["firstname"]?><?=$patient["lastname"]?>  </option>

<?php
}
?>
</SELECT>
</label>
              

<input type="date" name="date" required value=<?=$date?>> </br>
<input type="time" name="time" required value=<?=$time?>></br>                

      <button>Modifier rendez vous</button>
        
  </form>

  <a href="index.php">acceuil</a>


    
</body>
</html>