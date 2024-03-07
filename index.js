/* ------------------------------- HOMEPAGE --------------------------------- */
const deleteButtons = document.querySelectorAll(".btn-delete-post-it");

deleteButtons.forEach((button) => {
  button.addEventListener("click", async (event) => {
    event.preventDefault();
    const postId = button.getAttribute("data-id");
    const confirmation = await Swal.fire({
      title: "Êtes-vous sûr ?",
      text: "Vous ne pourrez pas revenir en arrière!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Oui, supprimer!",
      cancelButtonText: "Annuler",
    });

    if (confirmation.isConfirmed) {
      try {
        await supprimerPostIt(postId);
        Swal.fire({
          icon: "success",
          title: "Suppression réussie",
          text: "Le post-it a été supprimé avec succès.",
        });
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "Erreur",
          text: `Une erreur s'est produite lors de l'exécution de la fonction : ${error.message}`,
        });
      }
    }
  });
});

async function supprimerPostIt(postId) {
  const response = await fetch('controllers/delete_post-it_controller.php', {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ postId: postId })
  });

  if (!response.ok) {
    throw new Error('La suppression a échoué.');
  }

  const data = await response.json();

  if (!data.success) {
    throw new Error('Une erreur s\'est produite lors de la suppression du post-it.');
  }

  window.location.reload();
}

/* ------------------------------- PAGE LOGIN --------------------------------- */
/* document.getElementById("loginForm").addEventListener("submit", function (event) {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
      event.preventDefault();
      alert("Veuillez remplir tous les champs.");
    }
  }); */
/* ------------------------------- PAGE REGISTER --------------------------------- */
/* document.addEventListener("DOMContentLoaded", (event) => {
  const passwordInput = document.getElementById("password");
  const passwordStrengthIndicator = document.getElementById("password-strength");

  passwordInput.addEventListener("input", () => {
    const strength = getPasswordStrength(passwordInput.value);
    updatePasswordStrengthDisplay(strength);
  });
}); */

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.querySelector(".input-icon-eye");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
  } else {
    passwordInput.type = "password";
    toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
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
  const strengthIndicator = document.getElementById("password-strength");

  strengthIndicator.className = "password-strength"; // Réinitialiser les classes
  if (strength < 20) {
    strengthIndicator.classList.add("weak");
  } else if (strength < 40) {
    strengthIndicator.classList.add("medium");
  } else {
    strengthIndicator.classList.add("strong");
  }

  strengthIndicator.style.width = `${strength}%`;
}
