import { changeModalVisibility } from './modals.js'
const passwordSizeInput = document.querySelector("#passwordSizeInput")
const passwordModeSelection = document.querySelector("#passwordModeSelection")
const passwordGenerationBtn = document.querySelector("#passwordGenerationBtn")
const passwordInput = document.querySelector("#passwordInput")



passwordGenerationBtn.addEventListener("click", ()=>{
    let modeNb = passwordModeSelection?.options[passwordModeSelection.selectedIndex].value
    let sizeNb = parseInt(passwordSizeInput?.value)

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
            passwordInput.value = data["password"]
            changeModalVisibility(false)
        });
})