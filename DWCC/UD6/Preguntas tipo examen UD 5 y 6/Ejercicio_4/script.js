function crearFilaConInputs() {
    const inputs = document.querySelectorAll("#registro input");
    const fila = document.createElement("tr");

    for (const input of inputs) {
        const col = document.createElement("td");
        col.textContent = input.value;
        fila.appendChild(col);
    }

    return fila;
}

function anhadirAlFinal(event) {
    event.preventDefault();
    const tabla = document.getElementById("tabla");
    tabla.appendChild(crearFilaConInputs());
}

function anhadirAlPrincipio(event) {
    event.preventDefault();
    const tabla = document.getElementById("tabla");
    tabla.prepend(crearFilaConInputs());
}

document.getElementById("final").addEventListener("click", anhadirAlFinal);
document.getElementById("principio").addEventListener("click", anhadirAlPrincipio);