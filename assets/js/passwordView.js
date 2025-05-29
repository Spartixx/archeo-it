const passwordInput = document.querySelector("#passwordInput")
const passwordConfirmInput = document.querySelector("#passwordConfirmInput")
const passwordView = document.querySelector("#passwordView")
const passwordConfirmView = document.querySelector("#passwordConfirmView")

passwordView.addEventListener("click", ()=>{
    passwordInput.type === "text" ? passwordInput.type = "password": passwordInput.type = "text"
    passwordView.src === "hidePassword.webp" ? passwordView.src = "../assets/img/icons/viewPassword.png": passwordView.src = "../assets/img/icons/hidePassword.webp"
})