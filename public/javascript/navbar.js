// Apparition navbar en mode mobile

const navHamburger = document.querySelector(".btn-hamburger");
const navigation = document.querySelector(".navigation");

navHamburger.addEventListener("click", () => {
  navHamburger.classList.toggle("nav-visible");
  navigation.classList.toggle("nav-visible");
});
