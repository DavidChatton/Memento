<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="description" content="Donnez vie à vos idées en créant et en supprimant des posts it sur notre site. Ne perdez plus vos bonnes idées et lancez-vous dès maintenant !"/>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- CDN Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <nav class="navigation">
            <a href="?page=homepage" class="favicon"><img src="assets/images/favicon.png" alt="logo de post-it" class="favicon" />
            </a>
            <input type="checkbox" id="check">
            <label for="check" class="icons">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
            </label>
            <nav class="navbar">
                <a href="?page=homepage" style="--i:0;">Accueil</a>
                <?php if (!isset($_SESSION['logged']) || !$_SESSION['logged']) { ?>
                        <a href="?page=login" style="--i:1;">Se connecter</a>
                        <a href="?page=register" style="--i:2;">S'inscrire</a>
                <?php } ?>

                <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) { ?>
                    <a href="?page=disconnect" style="--i:1;"> Se déconnecter</a>
                <?php } ?>
            </nav>

            <?php ?>
        </nav>
    </header>

    <main>
        <?php require 'controllers/' . $route . '_controller.php'; ?>
    </main>
    <script src="index.js"></script>
</body>