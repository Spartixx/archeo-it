const sizeInput = document.querySelector("#sizeInput")
const modeInput = document.querySelector("#modeInput")
const loginBtn = document.querySelector("#loginBtn")

loginBtn.addEventListener("click", ()=>{
    let modeNb = parseInt(modeInput?.value)
    let sizeNb = parseInt(sizeInput?.value)

    fetch('http://127.0.0.1:8000/api/test', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ size:sizeNb, mode: modeNb})
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
})