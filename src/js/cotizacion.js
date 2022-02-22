
(function() {

    let cliente = [];
    let productos = [];

    mostrarCliente(cliente);
    buscarCliente();
    productosCotizar() ;
    buscarProducto();
    


    const nitCliente = document.querySelector('.nitCliente');
    nitCliente.addEventListener('keyup', function(e){
        const nitCliente = e.target.value;
        buscarCliente(nitCliente)
    });
    
    
    async function buscarCliente(nitCliente) {
        try {
            const url = `http://localhost:3000/api/buscarClientes?nit=${nitCliente}`;
            const resultado = await fetch(url);
            const respuesta = await resultado.json();
            
            const cliente = respuesta.cliente;
            mostrarDatosCliente(cliente);
            
    
        } catch (error) {
            console.log(error)
        }
    }

    function mostrarDatosCliente (cliente) {

        const razonSocial = document.querySelector('#razon');
        const telefonoCliente = document.querySelector('#telefono');
        const direccionCliente = document.querySelector('#direccion');
        const departamentoCliente = document.querySelector('#departamento');
        const ciudadCliente = document.querySelector('#ciudad');


        razonSocial.value = cliente.razon_social;
        telefonoCliente.value = cliente.telefono;
        direccionCliente.value = cliente.direccion;
        departamentoCliente.value = cliente.departamentoId;
        ciudadCliente.value = cliente.ciudad;

        mostrarCliente({...cliente});
    }


    /**Productos**/

    function buscarProducto() {
        const codigoProductoBuscar = document.querySelector('#codigo')
        codigoProductoBuscar.addEventListener('keyup', function(e){
            const numero = e.target.value.trim();
            
            if(numero === ''){
                mostarAlerta('error', 'El producto es Obligatorio', document.querySelector('.paso2Titulo'));
                return;
            }
            apiBuscarProducto(numero);
        })
    }

    /**Funcion Asincrona PHP**/
    async function apiBuscarProducto(numero) {
        const url = `http://localhost:3000/api/buscarProductos?producto=${numero}`;
        const respuesta = await fetch(url);
        const resultado = await respuesta.json();
    
        const producto = resultado.producto;

        if(resultado === 'error'){
            mostarAlerta(respuesta.tipo, respuesta.mensaje, document.querySelector('.paso2Titulo'))
        }
        mostrarProducto(producto);
       
    }


    function mostrarProducto(producto) {

        const idProductoo =  document.querySelector('#idProducto');
        idProductoo.value = producto.id;

        const nombrePorducto = document.querySelector('#producto');
        nombrePorducto.value = producto.nombre;

        const precioProducto = document.querySelector('#precio');
        precioProducto.value = producto.precio;
    }



    function productosCotizar() {
        const buscarProducto = document.querySelector('.formlario-buscar-producto');

        buscarProducto.addEventListener('click', function(e) {
            e.preventDefault();

            if(e.target.classList.contains('boton-enviar')){
                const numeroProducto = document.querySelector('#codigo').value.trim();
                
                if(numeroProducto === ''){
                    mostarAlerta('error', 'El producto es Obligatorio', document.querySelector('.paso2Titulo'));
                    return;
                }

                const id = document.querySelector('#idProducto').value;
                const nombreProducto = document.querySelector('#producto').value;
                const precioProducto = document.querySelector('#precio').value;
                const cantidadProducto= document.querySelector('#cantidad').value;
                const descuentoProducto = document.querySelector('#descuento').value;

                productoAgregar = {
                    idProducto: id,
                    nombre: nombreProducto,
                    precio: precioProducto,
                    cantidad: cantidadProducto,
                    descuento: descuentoProducto
                };

                cotizar(productoAgregar);
            };

        })
    }

    async function cotizar(productoAgregar) {

        const datos = new FormData();
        datos.append('productoId', productoAgregar.idProducto);
        datos.append('cantidad', productoAgregar.cantidad);
        datos.append('precio', productoAgregar.precio);
        datos.append('descuento', productoAgregar.descuento);

        try {
            const url = 'http://localhost:3000/api/temporal';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();
            colocarCotizados(resultado);

        } catch (error) {
            console.log(error);
        }
    }

    async function colocarCotizados(resultado) {
        const url = `http://localhost:3000/api/buscarTemporal?token=${resultado.token}`;
        const resul =  await fetch(url);
        const respuesta = await resul.json()

        productos = respuesta.producto
        
        tempCotizacion();
    }


    /**Imprimir la cotizacion en pantalla**/

    function tempCotizacion() {
        
        limpiarCotizacion();

        if(productos.length === 0) {
            const cotizador =  document.querySelector('#cotizador');

            const textoNoCotizacion = document.createElement('H3');
            textoNoCotizacion.textContent = 'No hay Productos, Agrega uno desde el formulario de la izquierda';
            textoNoCotizacion.classList.add('no-cotizacion');

            cotizador.appendChild(textoNoCotizacion);
            return;
        }

        productos.forEach( producto => {
            const contenedorProducto = document.createElement('DIV');
            contenedorProducto.dataset.productoId = producto.id;
            contenedorProducto.classList.add('productoDiv');

            const nombreProducto = document.createElement('H3');
            nombreProducto.textContent = producto.nombre

            const precioProducto = document.createElement('H4');
            precioProducto.textContent = `$.${producto.precio}`;

            const cantidadesDescuentos = document.createElement('DIV');
            cantidadesDescuentos.classList.add('cantidad-descuento');

            const cantidadProducto = document.createElement('P');
            cantidadProducto.textContent = `${producto.cantidad} UND`;

            const descuentoProducto = document.createElement('P');
            descuentoProducto.textContent = `${producto.descuento}%`;

            const subtotal = producto.precio * producto.cantidad
            const total = subtotal - (subtotal*producto.descuento) / 100;

            const totalProducto = document.createElement('H4');
            totalProducto.textContent = `$.${total}`;
            

            cantidadesDescuentos.appendChild(cantidadProducto);
            cantidadesDescuentos.appendChild(descuentoProducto);

            contenedorProducto.appendChild(nombreProducto);
            contenedorProducto.appendChild(precioProducto);
            contenedorProducto.appendChild(cantidadesDescuentos);
            contenedorProducto.appendChild(totalProducto);

            const colocar = document.querySelector('#cotizador');
            colocar.appendChild(contenedorProducto);

            productoprecio = {
                total: total,
                idProducto: producto.id  
            };

            procesarCotTemp(productoprecio);
        })

    }

    function limpiarCotizacion() {
        const cotizador = document.querySelector('#cotizador');

        while(cotizador.firstChild) {
            cotizador.removeChild(cotizador.firstChild);
        }
    }


    /**Alertas**/

    function mostarAlerta(tipo, mensaje, referencia) {

        const alertaPrevia = document.querySelector('.alerta');
        if(alertaPrevia) {
            alertaPrevia.remove();
        }

        const alerta = document.createElement('DIV');
        alerta.classList.add('alerta', tipo);
        alerta.textContent = mensaje;

        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);
        setTimeout(() => {
            alerta.remove();
        }, 2500);
    }


    /**Mostrar el ID del Cliente a Cotizar*/
    function mostrarCliente(cliente){
        console.log(cliente.id);
    }

    /* Procesar la Cotizacion */

    function procesarCotTemp(productoprecio) {
        const clienteid =  mostrarCliente(cliente);
        console.log(clienteid);
        const procesar = document.querySelector('.procesar');
        procesar.addEventListener('click', function(e){
            console.log(productoprecio);
        });
    }  
    
})();