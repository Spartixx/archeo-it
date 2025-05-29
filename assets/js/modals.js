const passwordGenerationDiv = document.querySelectorAll(".passwordGenerationDiv")
const generatePasswordBtn = document.querySelector("#generatePasswordBtn")
const passwordGenerationCancel = document.querySelector("#passwordGenerationCancel")

function changeModalVisibility(state=true){
    passwordGenerationDiv.forEach(element=>{
        element.hidden = state
    })
}

generatePasswordBtn.addEventListener("click", ()=>{
    changeModalVisibility(false)
})

passwordGenerationCancel.addEventListener("click", ()=>{
    changeModalVisibility(true)
})
