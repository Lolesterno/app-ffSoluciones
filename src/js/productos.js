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
            imagenDIV.classList.add('imagen-producto');
            imagenDIV.appendChild(imagenProducto);
    
            const nombreProducto = document.createElement('H3');
            nombreProducto.textContent = nombre;
    
            const codigoProducto = document.createElement('H3');
            codigoProducto.textContent = codigo;
    
            const descripcionProducto = document.createElement('P');
            descripcionProducto.textContent = descripcion;
    
            const precioProducto = document.createElement('H4');
            precioProducto.textContent = `$.${precio} + IVA`;
    
            const diametroProducto = document.createElement('H4');
            diametroProducto.textContent = diametro;
            
            const botonEditarProducto = document.createElement('A');
            botonEditarProducto.setAttribute('href', `/editar-producto?id=${id}`);
            botonEditarProducto.classList.add('boton-crear');
            botonEditarProducto.textContent = 'Editar Producto';        
    
            const formularioBorrar = document.createElement('FORM');
            formularioBorrar.action = '/productos/eliminar';
            formularioBorrar.method = 'POST';
    
            const idBorrar = document.createElement('INPUT');
            idBorrar.type = 'hidden';
            idBorrar.value = id;
            idBorrar.name = 'id';
    
            const enviarBorrar = document.createElement('INPUT');
            enviarBorrar.type = 'submit';
            enviarBorrar.value = 'Borrar Producto';
            enviarBorrar.classList.add('boton-borrar');
    
            formularioBorrar.appendChild(idBorrar);
            formularioBorrar.appendChild(enviarBorrar);
    
            const botonesAgrupar = document.createElement('DIV');
            botonesAgrupar.classList.add('acciones');
    
            botonesAgrupar.appendChild(botonEditarProducto);
            botonesAgrupar.appendChild(formularioBorrar);
    
            const productoDiv = document.createElement('DIV');
            productoDiv.classList.add('producto');
            productoDiv.dataset.idProducto = id;
    
            productoDiv.appendChild(imagenDIV);
            productoDiv.appendChild(nombreProducto);
            productoDiv.appendChild(codigoProducto);
            productoDiv.appendChild(descripcionProducto);
            productoDiv.appendChild(diametroProducto);
            productoDiv.appendChild(precioProducto);
            productoDiv.appendChild(botonesAgrupar);
    
            
    
            const listar = document.querySelector('#listado-productos');
            listar.appendChild(productoDiv);
            
        })
    }
    

}) ();