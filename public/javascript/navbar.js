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


// loading contact

const contactForm = document.querySelector("#contactForm");

contactForm.addEventListener('submit', ()=> {
  document.getElementById('contact-loading-animation').style.display = 'block';

  setTimeout(function() {
    document.getElementById('contact-loading-animation').style.display = 'none';
    window.location.href = "http://localhost:8090/Gaston/velo_expresso/accueil";
  }, 3000); 
});