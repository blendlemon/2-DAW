function Busca(cadena, num = 1) {
    let aux = "";
    let captura = false;
    const array = ["", "()", "<>"];
    for (let i = 0; i < cadena.length; i++) {

        if (cadena.charAt(i-1) == array[num].charAt(0) ) captura = true;

        else if (cadena.charAt(i) == array[num].charAt(1) ) captura = false;

        if (captura == true) aux += cadena.charAt(i);

    }

    return aux;
}

document.write(Busca("<hola> (adios)", 2));
