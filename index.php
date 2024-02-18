<?php
session_start();

require 'model/connection.php';

// liste des routes autorisées
$authorizedRoutes = [
    'homepage',
    'register',
    'login',
    'disconnect',
    'create_post-it'
    ];

// page par default    
$route = 'homepage';

// condition qui vérifie si la route dans l'url recuperer par la méthode get est stocker dans le tableau $availableRoutes []

if (in_array($_GET['page'], $authorizedRoutes)) {
    $route = $_GET['page'];
}

require 'views/layout.php';