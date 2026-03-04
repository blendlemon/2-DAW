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
        let resultado = '';
        while (this.saldo > 0) {
            let texto = `Saldo: ${this.saldo}<br>Tirada: ${this.contador++}<br>`;
            resultado += texto;
            
            let tabla = [];
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

            let puntosGanados = this.defineColor(tabla);
            resultado += this.Imprimir(tabla);
            resultado += `Puntos ganados: ${puntosGanados}<br>`;
            
            this.puntos += puntosGanados;
            this.saldo += puntosGanados - 1;
            resultado += `Puntos totales: ${this.puntos}<br>`;
            resultado += `Saldo final: ${this.saldo}<br><hr>`;
        }
        document.body.innerHTML = resultado + `<br><strong>JUEGO TERMINADO</strong><br>Puntos totales: ${this.puntos}`;
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
        
        // Validar filas
        for (let i = 0; i < 3; i++) {
            aux = tabla.filter(x => x.fila == i);
            if (aux[0].valor === aux[1].valor && aux[1].valor === aux[2].valor) {
                for (let j = 0; j < 3; j++) {
                    aux[j].color = "lightgrey";
                }
                puntos += Puntos.find(x => x.letra == aux[0].valor).puntos;
            }
        }
        
        // Validar columnas
        for (let i = 0; i < 3; i++) {
            aux = tabla.filter(x => x.columna == i);
            if (aux[0].valor === aux[1].valor && aux[1].valor === aux[2].valor) {
                for (let j = 0; j < 3; j++) {
                    aux[j].color = "lightgrey";
                }
                puntos += Puntos.find(x => x.letra == aux[0].valor).puntos;
            }
        }
        
        // Validar diagonal principal
        if (diagonal[0].valor === diagonal[1].valor && diagonal[1].valor === diagonal[2].valor) {
            for (let i = 0; i < 3; i++) {
                diagonal[i].color = "lightgrey";
            }
            puntos += Puntos.find(x => x.letra == diagonal[0].valor).puntos;
        }
        
        // Validar diagonal inversa
        if (diagonalInversa[0].valor === diagonalInversa[1].valor && diagonalInversa[1].valor === diagonalInversa[2].valor) {
            for (let i = 0; i < 3; i++) {
                diagonalInversa[i].color = "lightgrey";
            }
            puntos += Puntos.find(x => x.letra == diagonalInversa[0].valor).puntos;
        }
        
        return puntos;
    }
    Imprimir(tabla) {
        let html = '<table border="1" cellpadding="10" style="border-collapse: collapse; margin: 10px 0;">';
        for (let i = 0; i < 3; i++) {
            html += '<tr>';
            for (let j = 0; j < 3; j++) {
                let celda = tabla.find(slot => slot.fila == i && slot.columna == j);
                html += `<td style="background-color: ${celda.color}; text-align: center; font-size: 20px; font-weight: bold;">${celda.valor}</td>`;
            }
            html += '</tr>';
        }
        html += '</table>';
        return html;
    }
}
