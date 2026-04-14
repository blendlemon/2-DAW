function borde() {
    let parrafos = document.querySelectorAll("p");
    parrafos.forEach(element => {
        element.addEventListener("mouseover", () => {
            element.style = "border: 1px solid black;";
        })
    });
    
}

window.onload = borde;