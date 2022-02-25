
(function() {
    let cliente = [];
    capturarCliente();

    
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
            console.log(error);
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

        console.log(cliente.cliente)
    }


})();