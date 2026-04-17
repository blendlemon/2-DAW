function principio(event) {
    event.preventDefault();
    let tabla = document.getElementById("tabla");
    tabla.prepend(obtenerFila());
    
}

function final(event) {
    event.preventDefault();
    let tabla = document.getElementById("tabla");
    tabla.appendChild(obtenerFila());
    
}

function obtenerFila() {
    let nombre = document.getElementById("nombre").value;
    let direccion = document.getElementById("direccion").value;
    let importe = document.getElementById("importe").value;
    let fila = document.createElement("tr");
    fila.innerHTML = `<td>${nombre}</td><td>${direccion}</td><td>${importe}</td>`;
    return fila;
}

document.getElementById("principio").addEventListener("click", principio);
document.getElementById("final").addEventListener("click", final);