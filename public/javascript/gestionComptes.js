const btnEnregistrement = document.querySelector(
  ".entry_creation .entryForm #btnEnregistrement"
);
const psw = document.querySelector(
  ".entry_creation .entryForm #passwordCreation"
);
const pswVerif = document.querySelector(
  ".entry_creation .entryForm #verif_passwordCreation"
);

const test = document.querySelector(".test");

// psw.addEventListener("click", () => console.log("click test"));
// pswVerif.addEventListener("click", () => console.log("click test2"));
// btnEnregistrement.addEventListener("click", () => console.log("click test"));

function checkPassword() {
  if (psw !== "" && psw === pswVerif) {
    btnEnregistrement.classList.remove(dnone)
  }
}

psw.addEventListener("input", checkPassword);
pswVerif.addEventListener("input", checkPassword);