function Calcula_Iva(precio, iva = 0.1) {
    return (precio + precio * iva).toFixed(2);
}

document.write(Calcula_Iva(12.3));