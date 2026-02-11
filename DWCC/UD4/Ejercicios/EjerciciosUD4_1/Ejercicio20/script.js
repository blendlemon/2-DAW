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

function dame_numero_casillas_blanco(Tablero) {
    let nMovimientos = 0;

    Tablero.find(x => x.fila == 0 && x.columna == 0).pieza = 1000;
    Tablero.find(x => x.fila == 0 && x.columna == 1).pieza = 10;

    let rey = Tablero.find(rey => rey.pieza == 1000);

    for (let i = rey.fila - 1; i <= rey.fila + 1; i++) {
        if (i >= 0 && i <= 7) {
            for (let j = rey.columna - 1; j <= rey.columna + 1; j++) {
                if (j >= 0 && j <= 7) {
                    if (i != rey.fila || j != rey.columna) {
                        if (Tablero.find(x => x.fila == i && x.columna == j).pieza === null) {
                            nMovimientos += 1;
                        }
                    }
                }
            }
        }
    }

    return nMovimientos;

}

console.log(dame_numero_casillas_blanco(crearTablero()));
