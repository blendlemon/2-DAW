function actualizarTabla(pagina) {
    let tabla = document.getElementById("contenido");
    while (tabla.children.length > 0) {
        tabla.children[0].remove();
    }
    fetch("servicios/peliculas.php?pagina=" + pagina)
        .then(response => response.json())
        .then(data => {
            data.peliculas.forEach(element => {
                let fila = document.createElement("tr");
                fila.innerHTML = `<td>${element.titulo}</td><td>${element.director}</td><td>${element.anio}</td><td>${element.productor}</td>`;
                tabla.appendChild(fila);
            });
        })
        .catch(error => console.error("Error:", error));
}

function anterior() {
    let pagina = document.getElementById("pagina");
    if (Number(pagina.textContent) > 1) {
        pagina.textContent = Number(pagina.textContent) - 1;
        actualizarTabla(pagina.textContent);
    }
}

function siguiente() {
    let pagina = document.getElementById("pagina");
    pagina.textContent = Number(pagina.textContent) + 1;
    actualizarTabla(pagina.textContent);

}

document.getElementById("anterior").addEventListener("click", anterior);
document.getElementById("siguiente").addEventListener("click", siguiente);

// Cargar la tabla inicial
actualizarTabla(1);    