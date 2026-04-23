const URL_BASE = '/api/v2';
const API_LIBROS = `http://127.0.0.1:8001/api/v2/libros`;

document.addEventListener('DOMContentLoaded', () => {

    const btn = document.getElementById('btnLibros');

    if (!btn) return;

    btn.addEventListener('click', () => {

        fetch(API_LIBROS)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }
                return response.json();
            })
            .then(libros => {
                mostrarLibros(libros);
            })
            .catch(error => console.error('Ha ocurrido un error:', error));

    });

});

function mostrarLibros(libros) {
    const lista = document.getElementById('listaLibrosApi');
    if (!lista) return;

    lista.innerHTML = '';

    libros.forEach(libro => {
        const li = document.createElement('li');
        li.textContent = libro.titulo;
        lista.appendChild(li);
    });
}
