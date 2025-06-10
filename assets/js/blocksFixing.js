const fixTempParagraphBtn = document.querySelector("#fixTempParagraph")
const delTempParagraphBtn = document.querySelector("#delTempParagraph")
const tempParagraph = document.querySelector("#tempParagraph")


delTempParagraphBtn?.addEventListener("click", ()=>{
    tempParagraph?.remove()
})

fixTempParagraphBtn?.addEventListener("click", ()=>{
    let fixedParagraph = document.querySelector("#fixedParagraph")

    for (let i = 0; i < tempParagraph?.children.length; i++) {
        tempParagraph?.removeChild(tempParagraph?.children[i])
    }

    console.log(fixedParagraph)

    for (let i = 0; i < fixedParagraph?.children.length; i++) {
        tempParagraph?.appendChild(fixedParagraph?.children[i])
        if(fixedParagraph?.children[i].id === "paragraphFixed"){
            fixedParagraph?.children[i].value = 2;
        }
    }
})