const articulos = [
    {
        codigo: "14",
        nombre: "TV 25 pulgadas",
        palabrasClave: ["electrónica", "pequeño electrodoméstico", "TV"],
        departamento: "electrónica",
        precioVenta: 450,
        descuento: 10,
        existencias: 3
    },
    {
        codigo: "15",
        nombre: "TV 50 pulgadas",
        palabrasClave: ["electrónica", "gran formato", "TV"],
        departamento: "electrónica",
        precioVenta: 800,
        descuento: 15,
        existencias: 2
    },
    {
        codigo: "20",
        nombre: "Camisa Hombre",
        palabrasClave: ["ropa", "textil", "hombre"],
        departamento: "textil",
        precioVenta: 35,
        existencias: 10
    },
    {
        codigo: "21",
        nombre: "Pantalón Vaquero",
        palabrasClave: ["ropa", "textil", "casual"],
        departamento: "textil",
        precioVenta: 50,
        descuento: 20,
        existencias: 5
    },
    {
        codigo: "30",
        nombre: "Arroz 1kg",
        palabrasClave: ["comida", "cereales", "básico"],
        departamento: "alimentación",
        precioVenta: 2,
        existencias: 50
    },
    {
        codigo: "31",
        nombre: "Aceite Oliva 1L",
        palabrasClave: ["comida", "aceites", "premium"],
        departamento: "alimentación",
        precioVenta: 8,
        descuento: 5,
        existencias: 20
    },
    {
        codigo: "40",
        nombre: "Portátil Gaming",
        palabrasClave: ["informática", "ordenador", "gaming"],
        departamento: "informática",
        precioVenta: 1200,
        descuento: 10,
        existencias: 1
    },
    {
        codigo: "41",
        nombre: "Ratón Inalámbrico",
        palabrasClave: ["informática", "periféricos", "inalámbrico"],
        departamento: "informática",
        precioVenta: 25,
        existencias: 15
    },
    {
        codigo: "42",
        nombre: "Teclado Mecánico",
        palabrasClave: ["informática", "periféricos", "gaming"],
        departamento: "informática",
        precioVenta: 80,
        descuento: 25,
        existencias: 8
    },
    {
        codigo: "50",
        nombre: "Microondas",
        palabrasClave: ["electrónica", "electrodoméstico", "cocina"],
        departamento: "electrónica",
        precioVenta: 120,
        existencias: 4
    }
];

function buscarPorPalabraClave(articulos, palabraClave) {
    return articulos.filter(articulo => 
        articulo.palabrasClave.includes(palabraClave)
    );
}

function calcularPrecioFinal(articulo) {
    if (articulo.descuento) {
        return articulo.precioVenta * (1 - articulo.descuento / 100);
    }
    return articulo.precioVenta;
}

function articuloMasCaroPorDepartamento(articulos) {
    const porDepartamento = {};
    
    articulos.forEach(articulo => {
        const precioFinal = calcularPrecioFinal(articulo);
        
        if (!porDepartamento[articulo.departamento] || 
            precioFinal > calcularPrecioFinal(porDepartamento[articulo.departamento])) {
            porDepartamento[articulo.departamento] = articulo;
        }
    });
    
    return Object.values(porDepartamento);
}

function comprarConPresupuesto(articulos, presupuesto) {
    const articulosComprados = [];
    let dineroRestante = presupuesto;
    
    const articulosConExistencias = articulos.map(art => ({...art}));
    
    let seguirComprando = true;
    
    while (seguirComprando) {
        seguirComprando = false;
        
        const departamentos = [...new Set(articulosConExistencias.map(art => art.departamento))];
        
        for (const departamento of departamentos) {
            const articulosDept = articulosConExistencias.filter(
                art => art.departamento === departamento && art.existencias > 0
            );
            
            if (articulosDept.length === 0) continue;
            
            articulosDept.sort((a, b) => calcularPrecioFinal(a) - calcularPrecioFinal(b));
            
            const masBarato = articulosDept[0];
            const precioFinal = calcularPrecioFinal(masBarato);
            
            if (dineroRestante >= precioFinal) {
                articulosComprados.push({
                    ...masBarato,
                    precioCompra: precioFinal
                });
                dineroRestante -= precioFinal;
                masBarato.existencias--;
                seguirComprando = true;
            }
        }
    }
    
    return {
        articulosComprados,
        dineroGastado: presupuesto - dineroRestante,
        dineroRestante
    };
}

function mostrarResultados() {
    let html = '<h1>Gestión de Artículos</h1>';
    
    html += '<h2>Lista de Artículos Disponibles</h2>';
    html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 30px;">';
    html += '<tr><th>Código</th><th>Nombre</th><th>Departamento</th><th>Precio</th><th>Descuento</th><th>Precio Final</th><th>Existencias</th></tr>';
    
    articulos.forEach(art => {
        const precioFinal = calcularPrecioFinal(art);
        html += `<tr>
            <td>${art.codigo}</td>
            <td>${art.nombre}</td>
            <td>${art.departamento}</td>
            <td>${art.precioVenta}€</td>
            <td>${art.descuento ? art.descuento + '%' : '-'}</td>
            <td style="font-weight: bold;">${precioFinal.toFixed(2)}€</td>
            <td>${art.existencias}</td>
        </tr>`;
    });
    html += '</table>';
    
    const palabraBuscar = "informática";
    const resultadoBusqueda = buscarPorPalabraClave(articulos, palabraBuscar);
    html += `<h2>A) Artículos con palabra clave "${palabraBuscar}"</h2>`;
    html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 30px;">';
    html += '<tr><th>Código</th><th>Nombre</th><th>Palabras Clave</th><th>Precio Final</th></tr>';
    
    resultadoBusqueda.forEach(art => {
        html += `<tr>
            <td>${art.codigo}</td>
            <td>${art.nombre}</td>
            <td>${art.palabrasClave.join(', ')}</td>
            <td>${calcularPrecioFinal(art).toFixed(2)}€</td>
        </tr>`;
    });
    html += '</table>';
    
    const masCaros = articuloMasCaroPorDepartamento(articulos);
    html += '<h2>B) Artículo más caro por departamento (con descuento aplicado)</h2>';
    html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 30px;">';
    html += '<tr><th>Departamento</th><th>Código</th><th>Nombre</th><th>Precio Original</th><th>Descuento</th><th>Precio Final</th></tr>';
    
    masCaros.forEach(art => {
        html += `<tr>
            <td style="font-weight: bold;">${art.departamento}</td>
            <td>${art.codigo}</td>
            <td>${art.nombre}</td>
            <td>${art.precioVenta}€</td>
            <td>${art.descuento ? art.descuento + '%' : '-'}</td>
            <td style="font-weight: bold; color: green;">${calcularPrecioFinal(art).toFixed(2)}€</td>
        </tr>`;
    });
    html += '</table>';
    
    const presupuesto = 500;
    const resultadoCompra = comprarConPresupuesto(articulos, presupuesto);
    html += `<h2>C) Compra con presupuesto de ${presupuesto}€</h2>`;
    html += `<p><strong>Dinero gastado:</strong> ${resultadoCompra.dineroGastado.toFixed(2)}€</p>`;
    html += `<p><strong>Dinero restante:</strong> ${resultadoCompra.dineroRestante.toFixed(2)}€</p>`;
    html += `<p><strong>Artículos comprados:</strong> ${resultadoCompra.articulosComprados.length}</p>`;
    
    html += '<table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 30px;">';
    html += '<tr><th>#</th><th>Código</th><th>Nombre</th><th>Departamento</th><th>Precio Compra</th></tr>';
    
    resultadoCompra.articulosComprados.forEach((art, index) => {
        html += `<tr>
            <td>${index + 1}</td>
            <td>${art.codigo}</td>
            <td>${art.nombre}</td>
            <td>${art.departamento}</td>
            <td>${art.precioCompra.toFixed(2)}€</td>
        </tr>`;
    });
    html += '</table>';
    
    document.body.innerHTML = html;
    
    console.log("Búsqueda por palabra clave:", resultadoBusqueda);
    console.log("Más caros por departamento:", masCaros);
    console.log("Resultado compra:", resultadoCompra);
}
