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
/* ------------------------------- PAGE REGISTER --------------------------------- */
function checkPassword() {
  const passwordStrength = document.getElementById("password").value.length;
  const messageElement = document.getElementById("passwordMessage");
  
  if (passwordStrength < 8) {
      messageElement.textContent = "Votre mot de passe est trop court, il doit comprendre au moins 8 caractères.";
  } else {
      messageElement.textContent = ""; // Deletes message if already present
  }
}

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
