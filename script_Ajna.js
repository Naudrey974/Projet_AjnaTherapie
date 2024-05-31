
/*Ouverture et fermeture du menu burger*/
let sidenav = document.getElementById("mySidenav");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");

/* Ouvrir la navigation latérale sur 200px */
function openNav() {
  sidenav.classList.add("active");
}

 /*Fermer la navigation latérale en la passant à 0px */
 function closeNav() {
  sidenav.classList.remove("active");
} 

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;


/*----------Sécurité du formulaire de connexion----------*/

// ajout d'un écouteur d'événement sur le formulaire
document.getElementById('formConnexion').addEventListener('submit1', function(event) {
  
  // Récupération des valeurs des champs
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;

  // Définition des regex
  let emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
  let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

  // Validation de l'email
  if (!emailRegex.test(email)) {
      alert('Veuillez entrer un email valide.'); //affiche un message
      event.preventDefault(); // stop l'envoi du formulaire
  }

  // Validation du mot de passe
  if (!passwordRegex.test(password)) {
      alert('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.');//affiche un message
      event.preventDefault(); // stop l'envoi du formulaire
  }
});