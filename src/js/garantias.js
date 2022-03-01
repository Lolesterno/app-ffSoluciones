//iife
(function() {
    let clientes = [];
    cliente();

    function cliente () {
        const nitCliente = document.querySelector('#nit');
        nitCliente.addEventListener('keyup', function(e){
            const nit = e.target.value;
            buscarCliente(nit);
        })
    }

    async function buscarCliente(nit) {
        try {
            const url = `/api/buscarClientes?nit=${nit}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            clientes = resultado.cliente;
            console.log(clientes);
            imprimirCliente();
        } catch (error) {
            
        }
    }

    function imprimirCliente() {
        const empresaCliente = document.querySelector('#empresa');
        empresaCliente.value = clientes.razon_social;

        const telefonoCliente = document.querySelector('#telefono');
        telefonoCliente.value = clientes.telefono;
        
        const direccionCliente = document.querySelector('#direccion');
        direccionCliente.value = clientes.direccion;

        const correoCliente = document.querySelector('#correo');
        correoCliente.value = clientes.correo;

        const departamentoCliente = document.querySelector('#departamento');
        departamentoCliente.value = clientes.departamentoId;

        const ciudadCliente = document.querySelector('#ciudad');
        ciudadCliente.value = clientes.ciudad;
    }
})();