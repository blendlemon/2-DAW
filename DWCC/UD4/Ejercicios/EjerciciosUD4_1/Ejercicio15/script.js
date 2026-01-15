// 15) Necesitamos distribuir un array de 50 alumnos, cuyos nombres están ordenados alfabéticamente, de
// forma aleatoria en 10 filas y 5 columnas. Realiza un script que cargue un array con 50 nombres, los ordene
// de forma alfabética y luego los distribuya de forma aleatoria con respecto al nombre entre las 10 filas y 5
// columnas.

function distribuir() {
    let alumnos = [
        "Juan", "María", "Carlos", "Ana", "Pedro", "Laura", "Miguel", "Isabel", "José", "Carmen",
        "Luis", "Rosa", "Francisco", "Marta", "Diego", "Elena", "Antonio", "Sofía", "Manuel", "Beatriz",
        "David", "Teresa", "Andrés", "Francisca", "Ricardo", "Dolores", "Javier", "Amparo", "Enrique", "Consuelo",
        "Domingo", "Pilar", "Emilio", "Montserrat", "Julián", "Esperanza", "Víctor", "Aurora", "Mariano", "Ascensión",
        "Ramón", "Agustina", "Arturo", "Ramona", "Tomás", "Soledad", "Rubén", "Josefa", "Gabriel", "Emilia"
    ];
    alumnos.sort();
    alumnos = mezcla(alumnos);

    tabla(alumnos);

}

function mezcla(alumnos) {
    let numero = 0;
    let aux = [];
    for (let i = alumnos.length - 1 ; i >= 0; i--) {
        numero = Math.floor(Math.random() * (i));
        aux.push(alumnos[numero]);
        alumnos.splice(numero, 1);
    }
    return aux;
}

function tabla(alumnos) {
    let filas = 10;
    let columnas = 5;
    let html = `<table style="border: 1px solid black;">`;

    for (let i = 0; i < filas; i++){
        html += `<tr>`;
        for (let j = 0; j < columnas; j++) {
            html += `<td style="border: 1px solid black;">${alumnos.shift()}</td>`;
        }
        html += `</tr>`;
    }
    html += `</table>`;
    document.write(html);
}

function desordenar() {
    let devuelve = Math.floor(Math.random() * (1 + 1));
    let resultado = 0;
    if (devuelve == 0) {
        resultado = -1;
    }
    else {
        resultado = 1;
    }
    return resultado;
}