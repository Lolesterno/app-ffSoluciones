
(function() {
    let cliente = [];
    capturarCliente();
    capturarProducto();
    agregarProducto();

    
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

            console.log(resultado)

            mostrarCotizados(resultado);
            
        } catch (error) {
            
        }
    }

    function mostrarCotizados(producto) {
        
    }


})();


/*



*/