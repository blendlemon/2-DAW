function actualizarTotal() {
    const precio = Number(document.getElementById("precio").textContent);
    const cantidad = Number(document.getElementById("cantidad").textContent);
    const resultado = document.getElementById("resultado");

    resultado.textContent = cantidad * precio + "€";
}

function cambiarCantidad(event) {
    const cambio = Number(event.target.value);
    const cantidadEl = document.getElementById("cantidad");
    let cantidad = Number(cantidadEl.textContent) + cambio;

    if (cantidad < 0) {
        cantidad = 0;
    }

    cantidadEl.textContent = cantidad;
    actualizarTotal();
}

document.querySelectorAll(".boton").forEach(function (boton) {
    boton.addEventListener("click", cambiarCantidad);
});

window.onload = actualizarTotal;

