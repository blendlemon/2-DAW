function anhadir(event) {
    event.preventDefault();

    let selects = document.querySelectorAll(".menu select");
    let contenedor = document.getElementById("factura");

    for (let i = 0; i < selects.length; i++) {
        let seleccionada = selects[i].selectedOptions[0];

        if (seleccionada) {
            contenedor.append(seleccionada.cloneNode(true));
        }
    }
}

function borrarUno(event) {
    event.preventDefault();
    let select = document.getElementById("factura");

    if (select.selectedIndex > 0) {
        select.removeChild(select.options[select.selectedIndex]);
    }
}

function borrar(event) {
    event.preventDefault();
    let select = document.getElementById("factura");

    while (select.options.length > 1) {
        select.removeChild(select.options[1]);
    }
}

document.getElementById("anhadir").addEventListener("click", anhadir);
document.getElementById("borrarUno").addEventListener("click", borrarUno);
document.getElementById("borrar").addEventListener("click", borrar);