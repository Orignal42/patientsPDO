<?php

require_once(__DIR__."/pdo.php");



 
$insertPatientStatement = $pdo->prepare("
INSERT INTO patients 
(firstname,lastname,birthdate, phone, mail)
VALUES
(?,?,?,?,?)

");


$insertPatientStatement-> execute([

    $_POST["lastname"],
    $_POST["firstname"],
    $_POST["birthdate"],
    $_POST["phone"],
    $_POST["mail"],
]);

$idpatients=$pdo->LastinsertId();


$insertRDVStatement = $pdo->prepare("
    INSERT INTO appointments
    (idPatients,
    dateHour
    
    )
     VALUES
    (?,?)

    ");
 
            $datetime=$_POST["date"]." ".$_POST["time"] ;
         
           $insertRDVStatement-> execute([
             $idpatients, 
             $datetime
            ]);
   









header('Location: index.php?message=Votre-patient-et le rendez vous ont bien été créé.');