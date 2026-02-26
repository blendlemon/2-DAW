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
            if (this.contador == 2)
                texto.replace("inicial", "");
            for (let i = 0; i < 3; i++) {
                for (let j = 0; j < 3; j++) {
                    tabla.push(
                        {
                            valor: this.Probabilidades(),
                            fila: i,
                            columna: j,
                            color: "white",
                        }
                    );
                }
            }

            resultado += this.Imprimir(tabla);

        }
    }

    defineColor(tabla) {
        let aux;
        let puntos = 0;
        const Puntos = [
            {
                letra: 'P',
                puntos: 600
            },
            {
                letra: 'M',
                puntos: 200
            },
            {
                letra: 'C',
                puntos: 100
            },
            {
                letra: 'D',
                puntos: 30
            },
            {
                letra: 'X',
                puntos: 10
            },
            {
                letra: 'Y',
                puntos: 1
            },
        ];
        let diagonal = tabla.filter(slot => slot.fila == slot.columna);
        let diagonalInversa = tabla.filter(slot => (slot.fila + slot.columna) == 2);
        for (let i = 0; i < 3; i++) {
            aux = tabla.filter(x => x.fila == i);
            if (aux[0].valor === aux[1].valor && aux[1].valor === aux[2].valor) {
                for (let j = 0; j < 3; j++) {
                    aux[j].color = "lightgrey";
                }
                puntos += Puntos.find(x => x.letra == aux[0].valor).puntos;
            }
            if (diagonal[0].valor === diagonal[1].valor && diagonal[1].valor === diagonal[2].valor) {
                diagonal[i].color = "lightgrey";
                if (i === 0) {
                    puntos += Puntos.find(x => x.letra == diagonal[0].valor).puntos;
                }
            }
            if (diagonalInversa[0].valor === diagonalInversa[1].valor && diagonalInversa[1].valor === diagonalInversa[2].valor) {
                diagonalInversa[i].color = "lightgrey";
                if (i === 0) {
                    puntos += Puntos.find(x => x.letra == diagonalInversa[0].valor).puntos;
                }
            }
        }
    }
    Imprimir(tabla) {

    }
}

// hacer funcion para validar diagonales y simplificar y clarificar codigo