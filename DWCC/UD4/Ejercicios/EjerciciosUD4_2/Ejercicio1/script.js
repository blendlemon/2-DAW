function diaSemana(n1, n2 = 0) {
    n1 -= 1;
    let dias = "Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo".split(",");
    dias[-1] = "Domingo";
    return dias[n1 - n2];
}
