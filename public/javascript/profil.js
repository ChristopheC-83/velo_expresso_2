// appararition modif mail
const btnModifMail = document.getElementById("btn_modif_mail");
const divModifMail = document.getElementById("modif_mail");

btnModifMail.addEventListener("click", () => {
  if (divModifMail.classList.contains("dnone")) {
    divModifMail.classList.remove("dnone");
  } else {
    divModifMail.classList.add("dnone");
  }
});

// appararition modif mdp
const btnModifMdp = document.getElementById("btn_modif_mdp");
const divModifMdp = document.getElementById("modif_mdp");

btnModifMdp.addEventListener("click", () => {
  if (divModifMdp.classList.contains("dnone")) {
    divModifMdp.classList.remove("dnone");
  } else {
    divModifMdp.classList.add("dnone");
  }
});

// appararition btn modif mdp
const newPassword = document.querySelector("#newPassword");
const verifNewPassword = document.querySelector("#verifNewPassword");
const btn_validation_modif_mdp = document.querySelector(
  "#btn_validation_modif_mdp"
);
const msg_psw_diff = document.querySelector("#msg_psw_diff");

newPassword.addEventListener("keyup", () => {
  verificationPassword();
});
verifNewPassword.addEventListener("keyup", () => {
  verificationPassword();
});

function verificationPassword() {
  if (newPassword.value === verifNewPassword.value) {
    btn_validation_modif_mdp.classList.remove("btn_disable");
    msg_psw_diff.classList.add("dnone");
  } else {
    btn_validation_modif_mdp.classList.add("btn_disable");
    if (newPassword.value !== "" && verifNewPassword.value !== "") {
      msg_psw_diff.classList.remove("dnone");
    } else {
      msg_psw_diff.classList.add("dnone");
    }
  }
}
