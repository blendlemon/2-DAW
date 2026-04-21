var facultad = document.getElementById("facultad");
fetch('servicios/facultades.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(element => {
            facultad.add(new Option(element.nombre, element.id));
        });
    })
    .catch(error => console.error("Error:", error));

function carreras() {
    let carrera = document.getElementById("carrera");
    while (carrera.children.length > 0) {
        carrera.children[0].remove();
    }

    fetch('servicios/carreras.php?facultad=' + facultad.value)
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                carrera.add(new Option(`${element.nombre} (${element.codigo})`), element.codigo);
            });
        })
        .catch(error => console.error("Error:", error));
    carrera.removeAttribute("disabled");
}

facultad.addEventListener("change", carreras);