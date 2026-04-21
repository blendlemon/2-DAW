function anhadir(event) {
    event.preventDefault();
    let contenedor = document.getElementById("contenedor");
    let select = document.getElementById("bebidas");
    let texto = select.options[select.selectedIndex].text;
    let cantidad = document.getElementById("cantidad").value;
    let divId = texto;

    if (document.getElementById(divId)) {
        let numero = document.getElementById(divId + "cantidad");
        numero.textContent = String(Number(numero.textContent) + Number(cantidad));
    }
    else {
        let div = document.createElement("div");
        div.id = texto;
        let numero = document.createElement("p");
        numero.textContent = String(cantidad);
        numero.id = divId + "cantidad";
        let parrafo = document.createElement("p");
        parrafo.textContent = texto;
        div.appendChild(numero);
        div.appendChild(parrafo);
        contenedor.appendChild(div);
    }
    let importe = document.getElementById("importe");
    importe.value =Number(importe.value) + (Number(cantidad) * Number(select.value));

}

function borrar(event) {
    event.preventDefault();
    let contenedor = document.getElementById("contenedor");
    contenedor.innerHTML = "";
    importe.value = 0;
}

document.getElementById("anhadir").addEventListener('click', anhadir);
document.getElementById("borrar").addEventListener('click', borrar);