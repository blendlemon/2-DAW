function validate(event) {
    event.preventDefault();
    if (!validaMatricula()) {
        alert("Matrícula invalida");
        return;
    }
    if (!validaExpediente()) {
        alert("Expediente invalido");
        return;
    }
    if (!validaCuentaBancaria()) {
        alert("Cuenta Bancaria invalida");
        return;
    }
    if (!validaSeguro()) {
        alert("Seguro invalido");
        return;
    }

    event.currentTarget.submit();
}

function validaMatricula() {
    let tipo1 = /^[0-9]{4}-[A-Za-z]{3}$/;
    let tipo2 = /^[A-Za-z]{2}-[0-9]{4}-[A-Za-z]{2}$/;
    let matricula = document.getElementById("matricula").value;

    if (tipo1.test(matricula) || tipo2.test(matricula)) {
        return true;
    }
    else {
        return false;
    }
    
}

function validaExpediente() {
    let reg = /^[A-Za-z][0-9]{2}-[0-9]{6}-[A-Za-z]$/;
    let expediente = document.getElementById("expediente").value;
    return reg.test(expediente);
}

function validaCuentaBancaria() {
    let reg = /^[0-9]{4}-[0-9]{4}-[0-9]-[0-9]{2}-[0-9]{8}$/;
    let cb = document.getElementById("cuentaBancaria").value;

    return reg.test(cb);
}

function validaSeguro() {
    let reg = /^[0-9]-[A-Za-z]-[A-Za-z]-[0-9]-[0-9]$/;
    let seguro = document.getElementById("seguro");

    return reg.test(seguro);
}

document.getElementById("formulario").addEventListener("submit", validate);