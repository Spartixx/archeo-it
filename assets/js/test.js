import { changeModalVisibility } from './modals.js'
const passwordSizeInput = document.querySelector("#passwordSizeInput")
const passwordModeSelection = document.querySelector("#passwordModeSelection")
const passwordGenerationBtn = document.querySelector("#passwordGenerationBtn")
const passwordRegisterInput = document.querySelector("#passwordRegisterInput")



passwordGenerationBtn.addEventListener("click", ()=>{
    let modeNb = passwordModeSelection?.options[passwordModeSelection.selectedIndex].value
    let sizeNb = parseInt(passwordSizeInput?.value)
    console.log("oui")

    fetch('http://127.0.0.1:8000/api/password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ size:sizeNb, mode: modeNb})
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            passwordRegisterInput.value = data["password"]
            changeModalVisibility(false)
        });
})

const generatePassword = document.getElementById("button-generate")

generatePassword.addEventListener("click", function (){
    const sizeOfPassword = parseInt(document.getElementById("number-of-character").value)
    const complexityOfPassword = document.getElementById("type-of-password").value

    console.log(complexityOfPassword)

    let optionOfPassword = {
        size: sizeOfPassword,
        complexity: complexityOfPassword
    }

    try{
        fetch("http://127.0.0.1:8000/password", {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify(optionOfPassword)
        }).then(response => response.json())
            .then(data => {
                console.log(data);
            });
    }
    catch (error){
        console.log(error)
    }




    //console.log(optionOfPassword)

    //console.log(sizeOfPassword)
    //console.log(complexityOfPassword)
})
