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
const overlayContact = document.querySelector(".overlay-contact");

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

contactForm.addEventListener("submit", () => {
  document.getElementById("contact-loading-animation").style.display = "block";

  setTimeout(function () {
    document.getElementById("contact-loading-animation").style.display = "none";
    window.location.href = "http://localhost:8090/Gaston/velo_expresso/accueil";
  }, 3000);
});

// Slider accueil

// liste des images et btn
let img_slider = document.querySelectorAll(".img-slider");
let precedent = document.querySelector("#previous");
let suivant = document.querySelector("#next");

// taille de la liste des images
let nb_img = img_slider.length;

// on affiche l'image avec id=1
let etape = 0;


suivant.addEventListener("click", function () {
  img_slider[etape].classList.add("dnone");
  etape++;
  if (etape >= nb_img) {
    etape =0;
  }
  img_slider[etape].classList.remove("dnone");
});

precedent.addEventListener("click", function () {
  img_slider[etape].classList.add("dnone");
  etape--;
  if (etape < 0) {
    etape = nb_img - 1;
  }
  img_slider[etape].classList.remove("dnone");
});

// pour défilement automatique :
setInterval(function(){
  
  img_slider[etape].classList.add("dnone");
    etape++;
    if (etape >= nb_img) {
        etape=0;
    }
    img_slider[etape].classList.remove('dnone')
},5000)
