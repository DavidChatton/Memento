<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {

    $email =  filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    $stmt = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    var_dump($_POST);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged'] = true;

        header('Location: ?page=homepage');
        exit();
        
    } else {
        echo 'Invalid email or password';
    }

    if (!$_POST['token'] || $_POST['token'] !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit();
    }
  
}
require 'views/login.php';