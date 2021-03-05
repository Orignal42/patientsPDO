<?php
require_once(__DIR__."/pdo.php"); 
$insertStatement = $pdo->prepare("
    UPDATE appointments 
    SET idPatients=?,
        dateHour=?
      
    WHERE id=?

");
$datetime=$_POST["date"]." ".$_POST["time"] ;

$insertStatement-> execute([
    $_POST["idPatients"],
    $datetime,
    $_GET["id"]
    
]);
header('Location: index.php?message=Votre-rendez-vous-a bien-été-modifié.');


