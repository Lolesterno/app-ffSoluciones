
(function() {
    capturarCliente();
    
    function capturarCliente() {
        const nitBusqueda = document.querySelector('#nit')
        nitBusqueda.addEventListener('keyup', function(e){
            const nit = e.target.value;
            buscarCliente(nit);
        })
    }

    async function buscarCliente(nit) {
        const url = `/api/buscarClientes?nit=${nit}`;
        const respuesta = await fetch(url);
        const resultado = await respuesta.json();
        console.log(resultado);
    }


})();