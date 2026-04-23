function cargarDatos() {
    let id = parseInt(document.getElementById("id").value);
    
    if (id < 10 && id > 0) {
        fetch("http://variosfetch.atwebpages.com/alumno.php?id=" + String(id))
            .then(response => response.json())
            .then(data => {
                let alumno = data.alumno;

                document.getElementById("codigo").value = alumno.codigo;
                document.getElementById("nombre").value = alumno.nombre;
                document.getElementById("apellidos").value = alumno.apellidos;
                document.getElementById("direccion").value = alumno.direccion;
                document.getElementById("email").value = alumno.email;
                document.getElementById("telefono").value = alumno.telefono;

            })
            .catch(error => console.error("Error:", error));
    }
}

function modificarDatos() {
    const datos = {
        codigo: document.getElementById("codigo").value,
        nombre: document.getElementById("nombre").value,
        apellidos: document.getElementById("apellidos").value,
        direccion: document.getElementById("direccion").value,
        email: document.getElementById("email").value,
        telefono: document.getElementById("telefono").value
    };

    const formData = new FormData();
    formData.append("codigo", datos.codigo);
    formData.append("nombre", datos.nombre);
    formData.append("apellidos", datos.apellidos);
    formData.append("direccion", datos.direccion);
    formData.append("email", datos.email);
    formData.append("telefono", datos.telefono);

    

    fetch("http://variosfetch.atwebpages.com/modificaalumno.php", {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById("mensaje").textContent = data.message;
        })
        .catch(error => console.error("Error:", error));

}
document.getElementById("consultar").addEventListener("click", cargarDatos);
document.getElementById("modificar").addEventListener("click", modificarDatos);