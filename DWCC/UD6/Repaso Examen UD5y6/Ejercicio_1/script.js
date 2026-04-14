function validar(event) {
    event.preventDefault();
    if (validarExpediente()) {
        if (validarPiso()) {
            if (validarLetra()) {
                if (validarTerminos()) {
                    event.currentTarget.requestSubmit();
                    return;
                }
            }
        }
    }
    alert("Alguno de los campos no es correcto");
}

function validarExpediente() {
    let reg = /^[0-9]{4}-[A-Za-z]{6}$/;
    let expediente = document.getElementById("expediente").value.trim();

    return reg.test(expediente);
}

function validarPiso() {
    let reg = /^[1-5]$/;
    let piso = document.getElementById("piso").value;

    return reg.test(piso);  
}

function validarLetra() {
    let reg = /^[A-F]$/;
    let letra = document.getElementById("letra").value.trim();

    return reg.test(letra);
}

function validarTerminos() {
    let terminos = document.getElementById("terminos").checked;

    return terminos;
}

document.getElementById("formulario").addEventListener("submit", validar);