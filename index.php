<?php
session_start();

require 'model/connection.php';

// list of authorized routes
$authorizedRoutes = [
    'homepage',
    'register',
    'login',
    'disconnect',
    'create_post-it'
    ];

// default page 
$route = 'homepage';

// condition that checks if the route in the url retrieved by the get method is stored in the $availableRoutes array []

if (in_array($_GET['page'], $authorizedRoutes)) {
    $route = $_GET['page'];
}

require 'views/layout.php';