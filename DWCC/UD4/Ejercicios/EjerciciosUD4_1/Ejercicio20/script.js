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
    console.log(tablero)
    return tablero;
}

function dame_numero_casillas_blanco(Tablero) {
    let nMovimientos = 0;

    let prueba = Tablero.map();

}