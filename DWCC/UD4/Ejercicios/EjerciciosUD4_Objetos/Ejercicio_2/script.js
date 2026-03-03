const alumnos = [
    {
        nombre: "José Luis",
        edad: 21,
        curso: "CS Informatica",
        grupo: "A",
        horas: 100,
        Asignatura: "Redes",
        Notas: [4, 6, 7, 8],
        faltas: 21
    },
    {
        nombre: "María García",
        edad: 20,
        curso: "CS Informatica",
        grupo: "B",
        horas: 100,
        Asignatura: "Programación",
        Notas: [8, 9, 9, 10],
        faltas: 5
    },
    {
        nombre: "Pedro Martínez",
        edad: 22,
        curso: "CS Informatica",
        grupo: "A",
        horas: 100,
        Asignatura: "Bases de Datos",
        Notas: [5, 6, 5, 7],
        faltas: 15
    },
    {
        nombre: "Ana López",
        edad: 21,
        curso: "CS Informatica",
        grupo: "B",
        horas: 100,
        Asignatura: "Sistemas",
        Notas: [9, 8, 9, 9],
        faltas: 3
    },
    {
        nombre: "Carlos Ruiz",
        edad: 23,
        curso: "CS Informatica",
        grupo: "A",
        horas: 100,
        Asignatura: "Desarrollo Web",
        Notas: [6, 7, 6, 6],
        faltas: 10
    },
    {
        nombre: "Laura Sánchez",
        edad: 20,
        curso: "DAW",
        grupo: "A",
        horas: 120,
        Asignatura: "Diseño Interfaces",
        Notas: [8, 8, 9, 7],
        faltas: 7
    },
    {
        nombre: "Miguel Torres",
        edad: 21,
        curso: "DAW",
        grupo: "B",
        horas: 120,
        Asignatura: "Cliente",
        Notas: [5, 5, 6, 5],
        faltas: 18
    },
    {
        nombre: "Isabel Fernández",
        edad: 22,
        curso: "DAW",
        grupo: "A",
        horas: 120,
        Asignatura: "Servidor",
        Notas: [7, 8, 8, 9],
        faltas: 4
    }
];

function calcularNotaMedia(alumno) {
    const suma = alumno.Notas.reduce((acc, nota) => acc + nota, 0);
    return suma / alumno.Notas.length;
}

function redistribuirPorNotaMedia(alumnos) {
    const alumnosCopia = alumnos.map(alumno => ({...alumno}));
    
    alumnosCopia.forEach(alumno => {
        const media = calcularNotaMedia(alumno);
        alumno.grupo = media > 7 ? "A" : "B";
        alumno.notaMedia = media.toFixed(2);
    });
    
    return agruparPorCurso(alumnosCopia);
}

function agruparPorCurso(alumnos) {
    const resultado = {};
    
    alumnos.forEach(alumno => {
        if (!resultado[alumno.curso]) {
            resultado[alumno.curso] = { A: [], B: [] };
        }
        resultado[alumno.curso][alumno.grupo].push(alumno);
    });
    
    return resultado;
}

function mostrarResultados(titulo, resultado) {
    let html = `<h2>${titulo}</h2>`;
    
    Object.keys(resultado).forEach(curso => {
        html += `<h3>Curso: ${curso}</h3>`;
        
        html += `<h4>Grupo A (${resultado[curso].A.length} alumnos)</h4>`;
        html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 20px;">';
        html += '<tr><th>Nombre</th><th>Asignatura</th><th>Notas</th><th>Media</th><th>Faltas</th></tr>';
        
        resultado[curso].A.forEach(alumno => {
            html += `<tr>
                <td>${alumno.nombre}</td>
                <td>${alumno.Asignatura}</td>
                <td>${alumno.Notas.join(', ')}</td>
                <td style="font-weight: bold; ${alumno.notaMedia > 7 ? 'color: green;' : 'color: orange;'}">${alumno.notaMedia}</td>
                <td>${alumno.faltas}</td>
            </tr>`;
        });
        
        html += '</table>';
        
        html += `<h4>Grupo B (${resultado[curso].B.length} alumnos)</h4>`;
        html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 20px;">';
        html += '<tr><th>Nombre</th><th>Asignatura</th><th>Notas</th><th>Media</th><th>Faltas</th></tr>';
        
        resultado[curso].B.forEach(alumno => {
            html += `<tr>
                <td>${alumno.nombre}</td>
                <td>${alumno.Asignatura}</td>
                <td>${alumno.Notas.join(', ')}</td>
                <td style="font-weight: bold; ${alumno.notaMedia > 7 ? 'color: green;' : 'color: orange;'}">${alumno.notaMedia}</td>
                <td>${alumno.faltas}</td>
            </tr>`;
        });
        
        html += '</table>';
    });
    
    html += '<hr style="margin: 30px 0;">';
    document.body.innerHTML += html;
    
    console.log(titulo);
    console.log(resultado);
}
