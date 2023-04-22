const btnEnregistrement = document.getElementById("btnEnregistrement")
const psw = document.getElementById("passwordCreation")
const pswVerif = document.getElementById("verif_passwordCreation")


if (psw !== "" && psw === pswVerif){
    btnEnregistrement.classList.remove("dnone")
}