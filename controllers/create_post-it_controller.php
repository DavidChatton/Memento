<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {

    if (!isset($_SESSION['user_id'])) {
        header('location: ?page=login&access_denied=true');
        exit();
    }

    if (!$_POST['token'] || $_POST['token'] !== $_SESSION['token']) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit();
    }

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $date = htmlspecialchars($_POST['date']);

    if (empty($title) || empty($content) || empty($date)) {
        echo "Tous les champs doivent être remplis.";
        exit();
    }

    $query = $bdd->prepare('INSERT INTO post_its(title, content, date, user_id) VALUES(:title, :content, :date, :user_id)');
    $query->execute([
        ':title' => $title,
        ':content' => $content,
        ':date' => $date,
        ':user_id' => $_SESSION['user_id']
    ]);
    header('location: ?page=homepage');
    exit();
} else {
    
}

require 'views/create_post-it.php';
