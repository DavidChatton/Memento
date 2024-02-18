/* ------------------------------- PAGE LOGIN --------------------------------- */
document.getElementById('loginForm').addEventListener('submit', function(event) {
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    if(username === "" || password === "") {
        event.preventDefault();
        alert("Veuillez remplir tous les champs.");
    }
});
/* ------------------------------- PAGE REGISTER --------------------------------- */
document.addEventListener('DOMContentLoaded', (event) => {
    const passwordInput = document.getElementById('password');
    const passwordStrengthIndicator = document.getElementById('password-strength');

    passwordInput.addEventListener('input', () => {
        const strength = getPasswordStrength(passwordInput.value);
        updatePasswordStrengthDisplay(strength);
    });
});

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.input-icon-eye');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

function getPasswordStrength(password) {
    let strength = 0;
    
    if (password.length > 5) strength += 10; // Longueur minimale
    if (password.match(/[a-z]+/)) strength += 10; // Contient des lettres minuscules
    if (password.match(/[A-Z]+/)) strength += 10; // Contient des lettres majuscules
    if (password.match(/[0-9]+/)) strength += 10; // Contient des chiffres
    if (password.match(/[\W]+/)) strength += 10; // Contient des caractères spéciaux
    
    return strength;
}

function updatePasswordStrengthDisplay(strength) {
    const strengthIndicator = document.getElementById('password-strength');
    
    strengthIndicator.className = 'password-strength'; // Réinitialiser les classes
    if (strength < 20) {
        strengthIndicator.classList.add('weak');
    } else if (strength < 40) {
        strengthIndicator.classList.add('medium');
    } else {
        strengthIndicator.classList.add('strong');
    }
    
    strengthIndicator.style.width = `${strength}%`;
}

