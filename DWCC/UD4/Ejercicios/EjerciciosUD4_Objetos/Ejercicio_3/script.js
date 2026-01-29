function Curso(curso, grupo, alumnos) {
    this.curso = curso;
    this.grupo = grupo;
    this.alumnos = alumnos;
}

function Aula(aula, capacidad) {
    this.aula = aula;
    this.capacidad = capacidad;
}

function AsignaAula(arrayCurso, arrayAula) {
    let cursos = [...arrayCurso].sort((a, b) => b.alumnos - a.alumnos);
    let aulas = [...arrayAula].sort((a, b) => a.capacidad - b.capacidad);
    let conAulas = "Relación de cursos con aulas:<br>"
    let sinAulas = "Relación de cursos sin asignación de aula: <br>"
    let sinOcupar = "Relación de aulas sin ocupar: <br>"
    for(let i = 0; i < cursos.length; i++) {
        for (let j = 0; j < aulas.length; j++) {
            if (cursos[i].alumnos <= aulas[j].capacidad) {
                cursos[i].aula = aulas[j].aula;
                conAulas += `<b>Curso: </b>${cursos[i].curso} <b>Grupo: </b>${cursos[i].grupo} <b>Alumnos: </b>${cursos[i].alumnos} <b>Aula: </b>${aulas[j].aula} <b>Capacidad: </b>${aulas[j].capacidad} <br>`;
                aulas.splice(j, 1);
                cursos.splice(i, 1);
                i -= 1;
                break;
            }
        }
    }
    cursos.forEach(curso => {
        sinAulas += `<b>Curso: </b>${curso.curso} <b>Grupo: </b>${curso.grupo} <b>Alumnos: </b>${curso.alumnos}<br>`; 
    });
    aulas.forEach(aula => {
        sinOcupar += `<b>Aula: </b>${aula.aula} <b>Capacidad: </b>${aula.capacidad} <br>`;
    });

    document.write(conAulas + sinAulas + sinOcupar);
}