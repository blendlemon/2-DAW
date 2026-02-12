function crearCalendario(año) {
    let calendario = [];
    let fecha = new Date();

    fecha.setFullYear(año);
    fecha.setMonth(0);
    fecha.setDate(1);
    fecha.setHours(0);

    while (año === fecha.getFullYear()) {
        calendario.push(
            {
                Mes: fecha.getMonth(),
                diaMes: fecha.getDate(),
                diaSemana: fecha.getDay(),
                hora: fecha.getHours(),
                evento: ''
            }
        );
        fecha.setHours(fecha.getHours() + 1);
    }
    return calendario;
}

function registrarEvento(calendario) {
    const DIAS = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    const MESES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    let salir = false;

    let mes;
    let dia;
    let hora;
    let evento;
    let resultado = 'Eventos registrados:<br>';

    while (salir === false) {
        mes = prompt("Introduce el mes 1-12");

        if (mes === null) {
            salir = true;
        }
        else if (Number(mes) < 1 || Number(mes) > 12 || Number.isInteger(Number(mes)) === false) {
            alert("Mes fuera de rango");
        }
        else {
            mes = Number(mes) - 1;
            dia = prompt("Introduca dia del mes");

            if (dia === null) {
                salir = true;
            }
            else if (Number(dia) < 0 || Number(dia) > calendario.findLast(a => a.Mes == mes).diaMes || Number.isInteger(Number(dia)) === false) {
                alert("Dia fuera de rango");
            }
            else {
                dia = Number(dia);
                hora = prompt("Introduca la hora del evento 0-23:");

                if (hora === null) {
                    salir = true;
                }
                else if (Number(hora) < 0 || Number(hora) > 23 || Number.isInteger(dia) === false) {
                    alert("Hora fuera de rango");
                }
                else {
                    hora = Number(hora);
                    evento = prompt("Introduce el evento a registrar: ");
                    if (evento === null) {
                        salir = true;
                    }
                    else if (calendario.find(a => a.Mes == mes && a.diaMes == dia && a.hora == hora).evento != '') {
                        alert("Ya hay un evento registrado")
                    }
                    else {
                        let registro = calendario.find(a => a.Mes == mes && a.diaMes == dia && a.hora == hora);
                        registro.evento = evento;
                        resultado += `${registro.diaMes} de ${MESES[registro.Mes]}: ${registro.evento}<br>`;
                    }
                }
            }
        }

        salir = false;
        while (salir === false) {
            mes = prompt("Introduce el mes 1-12");
            if (mes === null) {
                salir = true;
            }
            else if (Number(mes) < 1 || Number(mes) > 12 || Number.isInteger(Number(mes)) === false) {
                alert("Mes fuera de rango");
            }
            else {
                salir = true;
                mes = Number(mes) - 1;
                resultado += `${MESES[mes]}:<br>`;
                let limite = calendario.findLast(a => a.Mes == mes).diaMes;

                for (let i = 1; i <= limite; i++) {
                    resultado += `${i} (${calendario.find(a => a.Mes && a.diaMes).diaSemana}) `;
                    for (let j = 0; j < 24; j++) {
                        let evento = calendario.find(a => a.Mes == mes && a.diaMes == i && a.hora == j);
                        if (evento && evento.evento != '') {
                            resultado += `${j}:00h ${evento.evento}`;
                        }
                    }
                }
            }
        }

        document.write(resultado);
    }
}

registrarEvento(crearCalendario(2026));
