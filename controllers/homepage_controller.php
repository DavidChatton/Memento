<?php
    if (!isset($_SESSION['user_id'])) {
            header('location: ?page=login&access_denied=true');
            exit();
    }
   $firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';

    $query = "SELECT p.id, p.title, p.content, DATE_FORMAT(p.date, '%d/%m/%Y') AS formatted_date FROM post_its AS p WHERE p.user_id = :user_id ";
    $response = $bdd->prepare($query);
    $response->execute([':user_id' => $_SESSION['user_id']]);
    $datas = $response->fetchAll();
    
require 'views/homepage.php';
?>
