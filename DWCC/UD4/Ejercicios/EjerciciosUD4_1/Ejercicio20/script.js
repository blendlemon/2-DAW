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
    let nMovimientos = 8;

    Tablero.find(x => x.fila == 0 && x.columna == 0).pieza = 1000;
    Tablero.find(x => x.fila == 0 && x.columna == 1).pieza = 10;

    let rey = Tablero.find(rey => rey.pieza == 1000);
    
    // por posicion es mas facil y simple de hacer los calculos dependen de si esta en 0 o 7 si esta en cero se le suma uno para comprobar
    // si esta en 7 se le resta simplifica todos los calculos de tener que hacer 4 sets de 3 if a 1 y solo 2 para establecer las variables
    //que tambien va a ayudar con todos los calculos dependientes de los limites del tablero

    if ((rey.fila == 0 && rey.columna == 0) || (rey.fila == 7 && rey.columna == 7) || (rey.fila == 0 && rey.columna == 7) || (rey.fila == 7 && rey.columna == 0)) {
        nMovimientos -= 5;
        if (rey.fila == 0 && rey.columna == 0) {
            if (Tablero.find(pos => pos.fila == rey.fila + 1 && pos.columna == rey.columna).pieza!=null) {
                nMovimientos -= 1;
            }
            if (Tablero.find(pos => pos.fila == rey.fila + 1 && pos.columna == rey.columna + 1).pieza!=null) {
                nMovimientos -= 1;
            }
            if (Tablero.find(pos => pos.fila == rey.fila  && pos.columna == rey.columna + 1).pieza!=null) {
                nMovimientos -= 1;
            }
        }
    }


    return nMovimientos;

}

console.log(dame_numero_casillas_blanco(crearTablero()));
