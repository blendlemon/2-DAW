function validarFormulario(evento) {
    evento.preventDefault();
    if (validarExpediente()) {
        if (validarPiso()) {
            if (validarTerminos()) {
                this.submit();
            }
        }
    }
    alert("aaa");
}

function validarExpediente() {
    const reg = new RegExp("^[0-9]{4}-[A-Za-z]{6}$");
    let expediente = document.getElementById("expediente").value;

    return reg.test(expediente);
}

function validarPiso() {
    const reg = new RegExp("^[1-5]$");
    let piso = document.getElementById("piso").value;

    return reg.test(piso);
}

function validarTerminos() {
    let terminos = document.getElementById("terminos").checked;
    return terminos;
}

window.onload = () => {
    document.getElementById("formulario").addEventListener("submit", validarFormulario);
};