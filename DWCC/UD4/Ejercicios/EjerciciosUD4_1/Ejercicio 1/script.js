function Calcula_Dni(dni) {
    const letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "Z", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
    if (Number.isInteger(dni)) {
        return dni + letras[dni % 23];
    }
    else {
        return "";
    }
}

let dni = Calcula_Dni(Number(prompt("Introduzca dni: ")));

document.write(dni);