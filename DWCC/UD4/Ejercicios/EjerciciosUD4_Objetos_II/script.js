class Plato {
    static id = 0;
    constructor(nombre, tipo, precio) {
        this.id = Plato.id;
        this.nombre = nombre;
        this.tipo = tipo;
        this.precio = precio;
        Plato.id++;
    }

    static menuBarato(platos) {
        let platostipo = {};
        let preciototal = 0;
        let resultado = '<h1><b>Menú</b></h1>';
        for (let i = 0; i < platos.length; i++) {
            if (!platostipo[platos[i].tipo]) {
                platostipo[platos[i].tipo] = [];
            }
            platostipo[platos[i].tipo].push(platos[i]);
        }

        for (let i in platostipo) {
            platostipo[i].sort((a, b) => a.precio - b.precio);
            if (platostipo[i].length > 0) {
                resultado += `${platostipo[i][0].tipo} : ${platostipo[i][0].nombre}<br>`;
                preciototal += platostipo[i][0].precio;
            }
        }
        resultado += `Precio: ${preciototal}€`
        return resultado;
    }

    static menusUmbral(platos) {
        let platostipo = {};
        let precioMaximo = 0;
        let resultado = '';
        for (let i = 0; i < platos.length; i++) {
            if (!platostipo[platos[i].tipo]) {
                platostipo[platos[i].tipo] = [];
            }
            platostipo[platos[i].tipo].push(platos[i]);
        }

        for (let i in platostipo) {
            platostipo[i].sort((a, b) => b.precio - a.precio);
            if (platostipo[i].length > 0) {
                precioMaximo += platostipo[i][0].precio;
            }
        }
        
    }
}