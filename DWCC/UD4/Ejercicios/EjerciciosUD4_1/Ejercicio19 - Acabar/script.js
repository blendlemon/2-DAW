function eventos() {
    calendario = crearCalendario();
    let mes;
    let dia;
    let hora;
    let evento;
    let resultado = '';
    let salir = true;
    let agregado = false;

    while (salir) {
        agregado = false;
        mes = prompt("Introduzca el mes(0-11):");
        if (Number(mes) < 0 || Number(mes) > 11) {
            alert("Mes fuera de rango");
        }
        else if (mes == null) salir = false;
        else {
            while (salir || agregado == false) {
                dia = prompt("Introduzca día:");
                if (dia == null) {
                    salir = false;
                }
                else if (Number.isInteger(Number(dia))) {
                    if (dia in calendario[mes]) {
                        while (salir || agregado == false) {
                            hora = prompt("Introduzca hora del dia 0-23:");
                            if (hora == null) {
                                salir = false;
                            }
                            else if (Number(hora) >= 0 && Number(hora) < 24 && hora in calendario[mes][dia]) {
                                while (salir || agregado == false) {
                                    evento = prompt("Introduce el evento:");
                                    if (evento == null) {
                                        salir = false;
                                    }
                                    else if (calendario[mes][dia][hora].eventos.length > 0) {
                                        alert("Ya existe un evento a esta hora");
                                    }
                                    else {
                                        calendario[mes][dia][hora].eventos.push(evento);
                                        alert("Evento agregado correctamente");
                                        resultado += `${calendario[mes]}`//Continuar desde aqui cambiar todo para que sea un objeto json es mas facil de esa forma
                                        agregado = true;
                                    }
                                }
                            } else {
                                alert("Hora fuera de rango");
                            }
                        }
                    } else {
                        alert("Dia fuera de rango");
                    }
                }
            }
        }
    }

}

function crearCalendario(año) {
    let calendario = {};

    for (let mes = 0; mes < 12; mes++) {
        calendario[mes] = {};
        let date = new Date(año, mes, 1);

        while (date.getMonth() === mes) {
            let dia = date.getDate();
            calendario[mes][dia] = {};
            
            for (let hora = 0; hora < 24; hora++) {
                calendario[mes][dia][hora] = {
                    eventos: [],
                    diasemana: date.getDay()
                };
            }
            date.setDate(date.getDate() + 1);
        }
    }
    return calendario;
}