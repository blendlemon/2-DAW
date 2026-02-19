function compruebaPrimo(numero) {
    let primo = true;
    if (numero === 0) {
        primo === false;
    }
    for (let i = 2; i < numero; i++) {
        if (numero % i === 0) {
            primo = false;
            break;
        }
    }
    return primo;
}

function devuelvePrimos(numeros) {
    let primos = [];
    for (let numero in numeros) {
        if (compruebaPrimo(numero) === true) {
            primos.push(numero)
        }
    }
    return primos
}

console.log(devuelvePrimos([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]));