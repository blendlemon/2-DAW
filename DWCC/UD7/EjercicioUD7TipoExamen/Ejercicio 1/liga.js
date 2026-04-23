fetch("http://variosfetch.atwebpages.com/ligas.php")
    .then(response => response.json())
    .then(data => {
        let ligas = document.getElementById("ligas");
        data.forEach(liga => {
            ligas.add(new Option(liga.nombre, liga.id));
        });
    })
    .catch(error => console.error("Error:", error));

function cargaLiga() {
    let id = document.getElementById("ligas").value;
    let equipos = document.getElementById("equipos");
    let tabla = "";
    equipos.innerHTML = "";
    

    fetch("http://variosfetch.atwebpages.com/equipos.php?liga=" + id)
        .then(response => response.json())
        .then(data => {
            tabla += `<table><thead><tr><th>Equipo</th><th>Ciudad</th><th>Capacidad</th></tr></thead>`;
            tabla += `<tbody>`
            data.forEach(equipo => {
                tabla += `<tr><td>${equipo.equipo}</td><td>${equipo.ciudad}</td><td>${equipo.capacidad}</td></tr>`;
            });
            tabla += `</tbody></table>`;
            equipos.innerHTML += tabla;
        })
        .catch(error => console.error("Error:", error));


}

document.getElementById("ligas").addEventListener("change", cargaLiga);