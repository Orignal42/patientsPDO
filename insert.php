<?php

require_once(__DIR__."/pdo.php");


 
$insertStatement = $pdo->prepare("
INSERT INTO patients 
(firstname,lastname,birthdate, phone, mail)
VALUES
(?,?,?,?,?)

");


$insertStatement-> execute([

    $_POST["lastname"],
    $_POST["firstname"],
    $_POST["birthdate"],
    $_POST["phone"],
    $_POST["mail"],
]);



header('Location: index.php?message=Votre-patient-a bien-été-créé.');





