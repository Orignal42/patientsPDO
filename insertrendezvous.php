<?php
require_once(__DIR__."/pdo.php");

if( empty ($_POST["idPatients"])){
die ("parametres manquants");
}
 
    $insertStatement = $pdo->prepare("
    INSERT INTO appointments
    (idPatients,dateHour)
    VALUES
    (?,?)

    ");
 
        $datetime=$_POST["date"]." ".$_POST["time"] ;
          $insertStatement-> execute([

        $_POST["idPatients"], 
        $datetime
        ]);
   






header('Location: index.php?message=Votre-rendez-vous-a bien-été-créé.');


