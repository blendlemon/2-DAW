function asignaAsiento(tAsientos) {
    let resultado = false;

    let fila = Math.floor(Math.random() * tAsientos.length);
    let columna = Math.floor(Math.random() * tAsientos[0].length);

    if (tAsientos[fila][columna] == 0) {
        resultado = true;
    } else {
        let c = columna;
        for (let i = fila; i < tAsientos.length; i++) {
            for (let j = c; j < tAsientos[i].length; j++) {
                if (tAsientos[i][j] == 0) {
                    resultado = true;
                    break;
                }
            }
            c = 0;
        }
        if (resultado == false) {
            for (let i = 0; i <= fila; i++) {
                if (i == fila) {
                    c = columna;
                } else {
                    c = tAsientos[i].length;
                }
                for (let j = 0; j < c; j++) {
                    if (tAsientos[i][j] == 0) {
                        resultado = true;
                        break;
                    }
                }
            }
        }
    }
    return resultado;
}