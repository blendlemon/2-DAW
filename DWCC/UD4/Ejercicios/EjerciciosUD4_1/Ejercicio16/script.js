// 16) Crea dos arrays de 10 elementos y rellénalo con valores aleatorios. Luego ordena los dos arrays. Realiza
// un script que cree un tercer array de 20 elementos con los elementos de los dos arrays anteriores y ordenados
// (hay que ir creándolo a medida que se lean los arrays, no vale ordenarlo al final de todo)

function creaArray() {
    let x = [];
    for (let i = 0; i < 10; i++) {
        x.push(Math.floor(Math.random() * (100) + 1));
    }
    return x.sort((a,b)=>a-b);
}

function ordena(x, y) {
    let z = [];
    let i = 0, j = 0;

    while (i < 10 && j < 10) {
        if (x[i] < y[j]) {
            z.push(x[i]);
            i++;
        } else {
            z.push(y[j]);
            j++;
        }
    }
    
    while (i < 10) {
        z.push(x[i]);
        i++;
    }
    
    while (j < 10) {
        z.push(y[j]);
        j++;
    }
    return z;
}
