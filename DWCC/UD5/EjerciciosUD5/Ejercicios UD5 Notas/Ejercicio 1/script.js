function CambiarTexto() {
    let precio = document.getElementById("precio").value;
    let resultado = document.getElementById("resultado");
    resultado.textContent = "Precio base: " + precio + "€";
}

document.getElementById("precio").onchange = CambiarTexto;

window.onload = CambiarTexto;

