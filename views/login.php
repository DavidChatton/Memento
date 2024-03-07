<head> 
    <title>Connexion</title>
</head>
<section>
<div class="bg-form">
    <div class="login-wrapper">
        <div class="login-card">
            <h2 class="login-title"><i class="fas fa-user-circle login-icon"></i> 
            Connexion
            </h2>
            <form action="?page=login" method="post"  class="login-form" id="loginForm">
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="email" id="username" name="email" placeholder="Adresse Mail" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                <button type="submit" class="login-button">Connexion</button>
            </form>
            <div class="login-footer">
                <a href="?page=register">S'enregistrer</a>
            </div>
        </div>
    </div>
</div>
</section>
<?php
    // ternary operator for check if GET access_denied is present
    $accessDenied = isset($_GET['access_denied']) ? $_GET['access_denied'] : false;
    
    // If access is denied, display the error message with SweetAlert2
    if ($accessDenied) {
        echo <<<HTML
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Accès refusé',
                    text: 'Vous devez être connecté pour accéder à cette page.',
                });
            });
        </script>
        HTML;
    }
    ?>