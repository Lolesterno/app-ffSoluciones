(function () {
    document.addEventListener('DOMContentLoaded', function() {
        buscarProductos();
    })
    
    function buscarProductos(){
        const buscador = document.querySelector('#buscador');
        
        buscador.addEventListener('submit', function(e){
    
            
            const valor = e.target.value;
            console.log(valor);
            buscar(valor);
        })
    }
    
    function buscar(valor) {
        
        fetch(`http://http://localhost:3000/api/buscarProducto?buscarProducto=${valor}`)
            .then( response => response.json() )
            .then( data => {
                window.location = `http://localhost:3000/editar-producto?id=${data.id}`;
            }).catch( data => {
                window.location = `http://localhost:3000/productos`;
            } ) 
    }
});