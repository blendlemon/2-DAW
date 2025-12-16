function contienePalabra (productos, palabra) {
    let aux = [];
    for (let element of productos) {
        for (let element1 of element.split(" ")) {
            if (element1 == palabra) {
                aux.push(element);
            }
        }
    }
    return Array.from(new Set(aux));
}