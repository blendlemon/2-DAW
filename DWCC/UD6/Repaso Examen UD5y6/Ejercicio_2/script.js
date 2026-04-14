function anhadir(event) {
    event.preventDefault();

    let contenedor = document.getElementById("contenedor");
    let texto = document.getElementById("texto").value;
    let parrafo = document.createElement("p");
    parrafo.textContent = texto;
    contenedor.appendChild(parrafo);
}

document.getElementById("formulario").addEventListener("submit", anhadir);