function busca(x, y) {
    let resultado = false;
    for (let i = 0; i < x.length; i++){
        for (let j = 0; j < i.length; j++){
            if (y == j) {
                resultado = true;
                break;
            }
        }
    }
    return resultado;
}