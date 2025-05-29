document.addEventListener("DOMContentLoaded", ()=>{

    const alertBtns = document.querySelectorAll(".alertBtn")

    alertBtns.forEach((btn)=>{
        btn.addEventListener("click", ()=>{
            btn.closest('.alertForm')?.remove()
        })
    })
})