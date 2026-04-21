var origen = document.getElementById('origen');
var destino = document.getElementById('destino');

origen.addEventListener("change", destinos);
fetch("servicios/aeropuertos.php")
    .then(response => response.json())
    .then(data => {
        console.log(data);


        data.forEach(aeropuerto => {
            let option = new Option(`${aeropuerto.nombre} (${aeropuerto.codigo})`, aeropuerto.codigo);
            origen.add(option);
        });
    })
    .catch(error => console.error('Error:', error));

function destinos() {
    while (destino.children.length > 0) {
        destino.children[0].remove();
    }
    fetch("servicios/destinos.php?origen="+origen.value)
        .then(response => response.json())
        .then(data => {
            
            data.forEach(aeropuerto => {
                destino.add(new Option(`${aeropuerto.nombre} (${aeropuerto.codigo})`, aeropuerto.codigo));
            });
        })
        .catch(error => console.error('Error:', error));
    destino.removeAttribute("disabled");
}
