<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Enregistrement</title>
</head>
<section>
<div class="bg-form">
    <div class="register-wrapper">
        <div class="register-card">
            <h2 class="register-title"><i class="fa-solid fa-address-card"></i>Créer un compte</h2>
            
            <form method="post" enctype="multipart/form-data"  class="register-form" id="registerForm">

                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="name" name="firstname" placeholder="Prénom" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="lastname" placeholder="Nom" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="nickname" placeholder="Pseudo" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
                </div>

                <div class="input-group password">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" onblur="checkPassword()" placeholder="Mot de passe" required>

                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye input-icon-eye"></i>
                    </span>
                    <div id="password-strength" class="password-strength"></div>
                </div>
                <p id="passwordMessage" class="error-password">Votre mot de passe doit contenir au moins 8 caractères</p>

                <input type="hidden" name="token" value="<?= $_SESSION['token']?>">

                <button onclick="showToast()" type="submit" class="register-button" >S'inscrire</button>
            </form>

            <div class="register-footer">
                Vous avez déjà un compte ? <a href="?page=login">Connexion</a>
            </div>
        </div>
    </div>
</div>
</section>
</html>
