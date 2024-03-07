<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $error = false;
    if (!empty($_POST)) {
        if (empty($_POST['firstname'])) {
            echo 'Veuillez renseigner votre prénom';
            $error = true;
        } elseif (empty($_POST['lastname'])) {
            echo 'Veuillez renseigner votre nom';
            $error = true;
        } elseif (empty($_POST['nickname'])) {
            echo 'Veuillez renseigner votre pseudo';
            $error = true;
        } elseif (empty($_POST['email'])) {
            echo 'Veuillez renseigner votre email';
            $error = true;
        } elseif (empty($_POST['password'])) {
            echo 'Veuillez renseigner votre mot de passe';
            $error = true;
        } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
            echo 'Veuillez rentrer une adresse mail valide';
            $error = true;
        } elseif (strlen($_POST['password']) < 8) {
            echo "Veuillez rentrer un mot de passe d'au minimum 8 caractères";
            $error = true;
        }
    }
    if (!$error) {
        var_dump($_POST);
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $nickname = htmlspecialchars($_POST['nickname']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $bdd->prepare('INSERT INTO users (firstname, lastname, nickname, email, password) VALUES (?, ?, ?, ?, ?)');
            try {
                $stmt->execute([$firstname, $lastname, $nickname, $email, $password]);
                ?>
                <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Votre compte a bien été créé",
                    showConfirmButton: true,
                    timer: 2000
                  }).then(function() {
                    window.location.href = "?page=login";
                  });
                </script>
                <?php
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    if (!$_POST['token'] || $_POST['token'] !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit();
    }
}
require 'views/register.php';