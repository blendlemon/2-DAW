import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["name"];

    connect() {
        console.log("Controller conectado");
    }

    saludar() {
        alert("Hola " + this.nameTarget.value);
    }
}
