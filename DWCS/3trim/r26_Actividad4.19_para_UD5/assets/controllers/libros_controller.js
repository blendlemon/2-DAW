import { Controller } from '@hotwired/stimulus';
import { apiCall } from './../js/api_client.js';

const API_URL = 'http://127.0.0';

export default class extends Controller {
    static targets = [
        'formularioContenedor',
        "divListaLibrosApi",
        "cuerpoTablaLibros"];
    connect() {
        console.log("Hola este es el controlador de libros");
    }
    async cargarLibros() {
        // Ocultamos el formulario usando el target
        this.formularioContenedorTarget.style.display = 'none';

        apiCall(API_URL)
            .then(libros => this.#mostrarLibros(libros))
            .catch(err => {
                console.error('Error al cargar libros:', err);
                this.#mostrarNotificacion('Error al cargar libros', 'danger');
            });
    }
    #mostrarLibros(libros) {
        //const cuerpoTabla = document.getElementById('cuerpoTablaLibros');
        // document.getElementById('divListaLibrosApi').style.display = 'block';
        this.divListaLibrosApiTarget.style.display = 'block';
        this.cuerpoTablaLibrosTarget.innerHTML = '';

        libros.forEach(libro => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
            <td>${libro.id}</td>
            <td><strong>${libro.titulo}</strong></td>
            <td>${libro.descripcion || '<span class="text-muted">Sin descripción</span>'}</td>
            <td class="text-center">
                <button class="btn btn-danger btn-sm btn-borrar" data-id="${libro.id}">
                    Eliminar
                </button>
            </td>
        `;
            cuerpoTabla.appendChild(fila);
        });
    }

    #mostrarNotificacion(mensaje, tipo = 'success') {
        const divAlert = document.getElementById('buzonMensajes');
        divAlert.className = `alert alert-${tipo} mt-3`;
        divAlert.innerHTML = mensaje;
        divAlert.style.display = 'block';

        if (tipo === 'success') {
            setTimeout(() => divAlert.style.display = 'none', 3000);
        }
    }

}
