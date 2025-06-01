const passwordRegisterInput = document.querySelector("#passwordRegisterInput")
const passwordConfirmInput = document.querySelector("#passwordConfirmInput")
const passwordView = document.querySelector("#passwordView")
const passwordConfirmView = document.querySelector("#passwordConfirmView")


function setPasswordMode(viewImage, input){
    viewImage?.addEventListener("click", ()=>{
        input.type === "text" ? input.type = "password": input.type = "text"
        viewImage.src.endsWith("hidePassword.webp") ? viewImage.src = "../assets/img/icons/viewPassword.png": viewImage.src = "../assets/img/icons/hidePassword.webp"
    })
}

setPasswordMode(passwordView, passwordRegisterInput)
setPasswordMode(passwordConfirmView, passwordConfirmInput)