const passwordGenerationDiv = document.querySelectorAll(".passwordGenerationDiv")
const generatePasswordBtn = document.querySelector("#generatePasswordBtn")
const passwordGenerationCancel = document.querySelector("#passwordGenerationCancel")

export function changeModalVisibility(state=true){
    passwordGenerationDiv.forEach(element=>{
        element.hidden = !state
    })
}

generatePasswordBtn.addEventListener("click", ()=>{
    changeModalVisibility(true)
})

passwordGenerationCancel.addEventListener("click", ()=>{
    changeModalVisibility(false)
})
