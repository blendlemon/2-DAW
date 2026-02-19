class TragaPerras {
    constructor() {
        this.saldo = 10;
        this.puntos = 0;
        this.contador = 1;
        this.valores = ['P', 'M', 'C', 'D', 'X', 'Y'];
    }

    Probabilidades() {
        let devolver = Math.floor(Math.random() * (100 - 1 + 1) + 1);

        if (devolver > 94) {
            return this.valores[0];
        }
        else if (devolver > 79) {
            return this.valores[1];
        }
        else if (devolver > 69) {
            return this.valores[2];
        }
        else if (devolver > 49) {
            return this.valores[3];
        }
        else if (devolver > 29) {
            return this.valores[4];
        }
        else {
            return this.valores[5];
        }

    }
    Jugar() {
        let texto = `Saldo inicial:${this.saldo}<br>Tirada:${contador++}<br>`
        let resultado = '';
        let tabla = [];
        while (this.saldo > 0) {
            resultado += texto;
            if (contador == 2)
                texto.replace("inicial", "");
            for (let i = 0; i < 3; i++) {
                tabla[i] = [];
                for (let j = 0; j < 3; j++) {
                    tabla[i][j] = this.Probabilidades();
                }
            }

            resultado += this.Imprimir(tabla);

        }
    }

    Imprimir(tabla) {
        let color = '';
        let resultado = `<table style="border: 1px solid black; border-collapse: collapse;">`;
        for (let i = 0; i < tabla.length; i++) {
            resultado += `<tr>`
            for (let j = 0; j < i.length; j++) {
                if (j === 0) {
                    if (tabla[i][j] === tabla[i][j + 1] && tabla[i][j] === tabla[i][j + 2]) {
                        color = "grey";
                    }
                }
            }
            resultado += `</tr>`
        }
        resultado += `</table>`;
    }
}