<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $email =  filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $stmt = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged'] = true;
        $_SESSION['firstname'] = $user['firstname'];

        header('Location: ?page=homepage');
        exit();  
        } else {
            $error = 'Vérifiez votre adresse mail ou votre mot de passe saisis puis recommencez.';
        }
}
require 'views/login.php';