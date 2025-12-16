function sumaCantidad(productos) {
    let aux = [];
    let suma = 0;
    for (let i = 0; i < productos.length; i++) {
        aux = [...productos][i].split("|");
        suma += Number(aux[1]);
    }
    return suma;
}