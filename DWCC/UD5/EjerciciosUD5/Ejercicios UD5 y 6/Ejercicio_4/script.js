function validar(event) {
    event.preventDefault();

    if (!validarUsuario()) return;
    if (!validarContrasena()) return;
    if (!validarContrasenas()) return;
    if (!validarEdad()) return;
    if (!validarSexo()) return;

    event.currentTarget.submit();
}

function validarUsuario() {
    const reg = /^[A-Za-z]/;
    let usuario = document.getElementById("usuario").value;

    return reg.test(usuario);
}

function validarContrasena() {
    const reg = /^(?=\S*[0-9])\S{7,}$/;
    let contrasena = document.getElementById("contrasena").value;

    return reg.test(contrasena);
}

function validarContrasenas() {
    let contrasena = document.getElementById("contrasena").value;
    let contrasena1 = document.getElementById("contrasena1").value;

    if (contrasena === contrasena1) {
        return true;
    }

    return false;
}

function validarEdad() {
    let edad = document.getElementById("edad").value;
    edad = Number(edad);
    if (edad > 17 && edad < 101) {
        return true;
    }

    return false;
}

function validarSexo() {
    let sexo = document.getElementById("sexo").value;
    if (sexo != "") {
        return true;
    }

    return false;
}

document.getElementById("formulario").addEventListener("submit", validar);