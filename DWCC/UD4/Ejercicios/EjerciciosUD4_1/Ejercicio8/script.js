function Aleatorio(min = 1, max = 100) {
    let array = [];
    let aleatorio;

    if ((max - min) >= 99) {
        while (array.length < 100) {
            aleatorio = Math.floor(Math.random() * (max - min + 1) + min);

            if (array.includes(aleatorio) == false) {
                array.push(aleatorio);
            }
        }
    }

    return array;
}
