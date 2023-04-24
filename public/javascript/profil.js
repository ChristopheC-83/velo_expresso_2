const btnModifMail = document.getElementById("btn_modif_mail");
const btnValidationModifMail = document.getElementById(
  "btn_validation__modif_mail"
);
const divModifMail = document.getElementById("modif_mail");

btnModifMail.addEventListener("click", () => {
  if (divModifMail.classList.contains("dnone")) {
    divModifMail.classList.remove("dnone");
  } else {
    divModifMail.classList.add("dnone");
  }
});
