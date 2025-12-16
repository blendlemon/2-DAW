function entreNumeros(productos, num1, num2) {
    let aux = [];
    let aux2 = [];
    let mayor;
    let menor;
    if (num1 > num2) {
        mayor = num1;
        menor = num2;
    }
    else {
        mayor = num2;
        menor = num1;
    }
    for (let i = 0; i < productos.length; i++) {
        aux2 = [...productos][i].split("|");
        if (Number(aux2[1]) < mayor && Number(aux2[1]) > menor) {
            aux.push(productos[i]);
        }
    }
    return aux;
}