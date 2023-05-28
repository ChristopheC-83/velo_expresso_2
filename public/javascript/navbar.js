// Apparition navbar en mode mobile

const navHamburger = document.querySelector(".btn-hamburger");
const navigation = document.querySelector(".navigation");

navHamburger.addEventListener("click", () => {
  navHamburger.classList.toggle("nav-visible");
  navigation.classList.toggle("nav-visible");
});

//modale de contact

const btnModalContact = document.querySelector(".modal-contact"); 
const fermerModalContact = document.querySelector(".fermerModaleContact");
const fenetreModale = document.querySelector(".fenetre-modale");
const overlayContact = document.querySelector(".overlay-contact")


btnModalContact.addEventListener("click", () => {
  fenetreModale.classList.toggle("dnone");
});
fermerModalContact.addEventListener("click", () => {
  fenetreModale.classList.toggle("dnone");
});
overlayContact.addEventListener("click", () => {
  fenetreModale.classList.toggle("dnone");
});
