
(function() {
    let cliente = [];
    let productos = [];
    capturarCliente();
    capturarProducto();
    agregarProducto();
    mostrarDatos();

    
    function capturarCliente() {
        const nitBusqueda = document.querySelector('#nit')
        nitBusqueda.addEventListener('keyup', function(e){
            const nit = e.target.value;
            buscarCliente(nit);
        })
    }

    async function buscarCliente(nit) {
        try {
            const url = `/api/buscarClientes?nit=${nit}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json()

            cliente = resultado.cliente.id
            mostrarCliente(resultado);

        } catch (error) {
            
        }

        
    }

    function mostrarCliente(cliente) {
        const { ciudad, correo, direccion, razon_social, telefono } = cliente.cliente

        const razonCliente = document.querySelector('#razon');
        razonCliente.value = razon_social;

        const correoCliente = document.querySelector('#correo');
        correoCliente.value = correo

        const direccionCliente = document.querySelector('#direccion');
        direccionCliente.value = direccion;

        const ciudadCliente = document.querySelector('#ciudad');
        ciudadCliente.value = ciudad

        const telefonoCliente = document.querySelector('#telefono');
        telefonoCliente.value = telefono

    }

    function capturarProducto () {
        const codigoProducto = document.querySelector('#codigo');
        codigoProducto.addEventListener('keyup', function(e){
            const codigo = e.target.value;
            buscarProducto(codigo);
        })
    }

    async function buscarProducto(codigo) {
        try {
            const url = `/api/buscarProductos?codigo=${codigo}`;
            const resultado = await fetch(url);
            const respuesta = await resultado.json();
            
            mostrarProducto(respuesta);
        } catch (error) {
            const nombreProducto = document.querySelector('#producto');
            nombreProducto.value = '';

            const precioProducto = document.querySelector('#precio');
            precioProducto.value = '';
        }
    }

    function mostrarProducto(producto) {
        const { id, nombre, precio } = producto.producto;

        const idProducto = document.createElement('INPUT');
        idProducto.type = 'hidden';
        idProducto.classList.add('id')
        idProducto.value = id;

        const form = document.querySelector('.forms');
        form.appendChild(idProducto);

        const nombreProducto = document.querySelector('#producto');
        nombreProducto.value = nombre;

        const precioProducto = document.querySelector('#precio');
        precioProducto.value = precio;


    }

    function agregarProducto() {

        const formulario = document.querySelector('.forms');
        formulario.addEventListener('submit', function(event){
            event.preventDefault();
       
            const precio = document.querySelector('#precio').value;
            const cantidad = document.querySelector('#cantidad').value;
            const descuento = document.querySelector('#descuento').value;
            const id = document.querySelector('.id').value;

            api( precio, cantidad, descuento, id);

        } );

    }

    async function api(precio, cantidad, descuento, id) {
        const datos = new FormData();
        datos.append('productoId', id);
        datos.append('cantidad', cantidad);
        datos.append('precio', precio);
        datos.append('descuento', descuento);

        try {
            const url = `/api/temporal`;
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();

            apiCotizados(resultado);
            
        } catch (error) {
            
        }
    }

    async function apiCotizados(res) {
        try {
            const url = `/api/temporalProductos?token=${res.token}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            productos = resultado.producto
            mostrarDatos();
            totales(res.token)
        } catch (error) {
            
        }
    }

    function mostrarDatos() {
        console.log(productos)
        
        limpiarDatos();

        if(productos.length === 0) {
            const contenedor = document.querySelector('.productos-cotizados');
            const textoNoProductos = document.createElement('H3');
            textoNoProductos.textContent = 'No hay datos';
            textoNoProductos.classList.add('noDatos');

            contenedor.appendChild(textoNoProductos);
            return;
        }

        const estatus = {
            0 : 'pendiente',
            1 : 'aprovada',
            2 : 'anulada' 
        }

        numeracion();


        productos.forEach(producto => {

            const divBotonBorrar = document.createElement('DIV');
            divBotonBorrar.classList.add('borrar-producto');

            const botonBorrar = document.createElement('BUTTON');
            botonBorrar.classList.add('boton');
            botonBorrar.textContent = 'Borrar'
            botonBorrar.addEventListener('click', function(){
                borrarProducto(producto.id)
            });

            divBotonBorrar.appendChild(botonBorrar)
            
            const cotizado = document.createElement('DIV');
            cotizado.classList.add('producto-cotizado');
            cotizado.dataset.id = producto.id;

            const nombreProducto =  document.createElement('H3');
            nombreProducto.textContent = producto.nombre;

            const precioProducto = document.createElement('H4');
            precioProducto.textContent = `$.${producto.precio}`;

            const cantidadDescuento = document.createElement('DIV');
            cantidadDescuento.classList.add('cantidad-descuento');

            const descuentoProducto = document.createElement('P');
            descuentoProducto.textContent = producto.descuento;

            const unidadesProducto = document.createElement('P');
            unidadesProducto.textContent = producto.cantidad

            cantidadDescuento.appendChild(unidadesProducto);
            cantidadDescuento.appendChild(descuentoProducto);

            cotizado.appendChild(nombreProducto);
            cotizado.appendChild(precioProducto);
            cotizado.appendChild(cantidadDescuento);
            cotizado.appendChild(divBotonBorrar);

            const base = document.querySelector('.productos-cotizados');
            base.appendChild(cotizado);
        });

    }

    async function totales(token){
        try {
            const url = `/api/totales?token=${token}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            console.log(resultado);
        } catch (error) {
            
        }
    }

    function borrarProducto(res) {
        console.log(res);
    }


    function limpiarDatos() {
        const listadoDatos = document.querySelector('.productos-cotizados');

        while (listadoDatos.firstChild) {
            listadoDatos.removeChild(listadoDatos.firstChild);
        }
    }



})();


/*



*/