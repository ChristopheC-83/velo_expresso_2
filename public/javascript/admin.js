// on choisit le formulaire sur lequel on agit
// si confirmation dans la fenetre => on passe à l'étape suivante

function confirmation(formulaire) {
  if (confirm("Confirmez-vous la modification ?")) {
    formulaire.submit();
  } else {
    document.location.reload();
  }
}
function confirmationSupp(formulaire) {
  if (confirm("Confirmez-vous la modification ?")) {
    formulaire.submit();
  } else {
    document.location.reload();
  }
}

//disparition des alertes

// const alert = document.querySelector(".alert");

// if (alert) {
//   alert.classList.add("disparition-alert");
// }
