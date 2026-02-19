function crearTablero() {
    let tablero = [];
    let color = 0;

    for (let i = 0; i < 8; i++) {
        for (let j = 0; j < 8; j++) {
            tablero.push(
                {
                    fila: i,
                    columna: j,
                    colorCasilla: color,
                    pieza: null
                });
            if (color == 1) {
                color = 0;
            }
            else {
                color = 1;
            }
        }
        if (color == 0) {
            color = 1;
        }
        else {
            color = 0;
        }
    }
    return tablero;
}

// Esta es una funcion de prueba para rellenar aleatorioamente por lo que no es necesario hacer comprobaciones si una casilla esta ocupada o no
function rellenar(tablero) {
    const blanco = 10;
    const negro = 20;
    let fila;
    let columna;
    let pieza;

    for (let i = 0; i < 8; i++) {
        if (Math.floor(Math.random() * (1 - 0 + 1) + 0) == 1) {
            fila = Math.floor(Math.random() * (7 - 0 + 1) + 0);
            columna = Math.floor(Math.random() * (7 - 0 + 1) + 0);
            pieza = tablero.find(x => x.fila == fila && x.columna == columna);
            pieza.pieza = 10;
        }
        if (Math.floor(Math.random() * (1 - 0 + 1) + 0) == 1) {
            fila = Math.floor(Math.random() * (7 - 0 + 1) + 0);
            columna = Math.floor(Math.random() * (7 - 0 + 1) + 0);
            pieza = tablero.find(x => x.fila == fila && x.columna == columna);
            pieza.pieza = 20;
        }
    }
}

function Dame_numero(Tablero, color) {
    const validos = ["B", "N"];
    let piezas;

    if (!validos.includes(color.toUpperCase())) {
        return null
    }

    if (color.toUpperCase() == "B") {
        color = 10;
    }
    else {
        color = 20;
    }
    piezas = Tablero.filter(x => x.pieza == color);

    return piezas.length;
}

let Tablero = crearTablero();
rellenar(Tablero);
console.log(Dame_numero(Tablero, "b"));