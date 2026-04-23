fetch("http://variosfetch.atwebpages.com/marcas.php")
    .then(response => response.json())
    .then(data => {
        let marcas = document.getElementById("marcas");
        data.forEach(marca => {
            marcas.add(new Option(marca.nombre, marca.id));

        });
    })
    .catch(error => console.error("Error:", error));

function cargarModelos() {
    let id = document.getElementById("marcas").value;
    let modelos = document.getElementById("modelos");
    modelos.innerHTML = ``;
    fetch("http://variosfetch.atwebpages.com/modelos.php?marca=" + id)
        .then(response => response.json())
        .then(data => {
            let tabla = document.createElement("table");
            let thead = document.createElement("thead");
            let tbody = document.createElement("tbody");

            thead.innerHTML = `<tr>
            <th>Modelo</th>
            <th>Año</th>
            </tr>`

            data.forEach(modelo => {
                tbody.innerHTML += `<tr>
                    <td>${modelo.modelo}</td>
                    <td>${modelo.anio}</td>
                </tr>`

            });
            tabla.appendChild(thead);
            tabla.appendChild(tbody);
            modelos.appendChild(tabla);
        })
        .catch(error => console.error("Error:", error));

}

document.getElementById("marcas").addEventListener("change", cargarModelos);