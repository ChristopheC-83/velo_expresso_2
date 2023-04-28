const mdpMasque = document.querySelectorAll(".fa-eye-slash")
const mdpVisible = document.querySelectorAll(".fa-eye")
const password = document.querySelector("#password")



mdpMasque.addEventListener("click", ()=>{
    mdpMasque.classList.add("dnone")
    mdpVisible.classList.remove("dnone")
    password.type="text"

})
mdpVisible.addEventListener("click", ()=>{
    mdpMasque.classList.remove("dnone")
    mdpVisible.classList.add("dnone")
    password.type="password"

})