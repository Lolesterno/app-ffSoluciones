(function() {

    document.addEventListener('DOMContentLoaded', function() {
        iniciarApp();
    });
    
    function iniciarApp() {
        consultarProductosAPI();
        
    }
    
    
    async function consultarProductosAPI (){
        try {
            const url = 'http://localhost:3000/api/productos';
            const resultado = await fetch(url);
            const productos = await resultado.json();
    
            mostrarProductos(productos);
    
        } catch (error) {
            
        }
    }
    
    function mostrarProductos ( productos ) {
    
        productos.forEach(producto => {
            const { id, codigo, nombre, descripcion, imagen, precio, diametro } = producto;
    
            const imagenProducto = document.createElement('IMG');
            imagenProducto.setAttribute('src', `imagenes/${imagen}`);
            imagenProducto.setAttribute('alt', 'Imagen del Producto');
    
            const imagenDIV = document.createElement('DIV');
            imagenDIV.classList.add('imagen');
            imagenDIV.appendChild(imagenProducto);
    
            const nombreProducto = document.createElement('H3');
            nombreProducto.textContent = nombre;
    
            const codigoProducto = document.createElement('h3');
            codigoProducto.classList.add('codigo')
            codigoProducto.textContent = codigo;
    
            const descripcionProducto = document.createElement('P');
            descripcionProducto.textContent = descripcion;
    
            const precioProducto = document.createElement('H4');
            precioProducto.textContent = `$.${precio} + IVA`;
    
            const diametroProducto = document.createElement('H4');
            diametroProducto.textContent = diametro;

            const datosPrecioDiametro = document.createElement('DIV');
            datosPrecioDiametro.classList.add('datos-precio');
            datosPrecioDiametro.appendChild(diametroProducto);
            datosPrecioDiametro.appendChild(precioProducto);
            
            const botonEditarProducto = document.createElement('A');
            botonEditarProducto.setAttribute('href', `/editar-producto?id=${id}`);
            botonEditarProducto.classList.add('editar');
            botonEditarProducto.textContent = 'Editar Producto';        
    
            const botonesAgrupar = document.createElement('DIV');
            botonesAgrupar.classList.add('accion');
    
            botonesAgrupar.appendChild(botonEditarProducto);

    
            const productoDiv = document.createElement('DIV');
            productoDiv.classList.add('producto');
            productoDiv.dataset.idProducto = id;
    
            productoDiv.appendChild(imagenDIV);
            productoDiv.appendChild(nombreProducto);
            productoDiv.appendChild(codigoProducto);
            productoDiv.appendChild(descripcionProducto);
            productoDiv.appendChild(datosPrecioDiametro);
            productoDiv.appendChild(botonesAgrupar);
    
            
    
            const listar = document.querySelector('#productos');
            listar.appendChild(productoDiv);
            
        })
    }
    

}) ();