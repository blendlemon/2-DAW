function articulosMayor(productos, n) {
    let aux = [];
    let aux2 = [];

    for (let i = 0; i < productos.length; i++) {
        aux2 = [...productos][i].split("|");
        if (Number(aux2[1]) > n) {
            aux.push(productos[i]);
        }
        
    }
    return aux;
}