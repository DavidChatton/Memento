<?php

$requestSQL = $bdd->prepare('SELECT * FROM post_its');
$requestSQL->execute();
$getpost_it = $requestSQL->fetchAll();


require 'views/homepage.php';
?>