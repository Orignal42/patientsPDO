<?php

require_once(__DIR__."/pdo.php");
if (empty($_GET["id"])){
die("parametres manquants");

}
$deleteStatement=$pdo->prepare("DELETE  FROM appointments WHERE id=?");
$deleteStatement->execute([

    $_GET['id']
]);

header('Location: index.php?message=Le patient a bien été supprimé');

