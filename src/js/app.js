
const cotizacion = {
    id = '',
    clienteId = '',
    productos = [],
    total = 0
}


/* * Mostrar Todos los usuarios registrados en una base de datos * */

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {

    seleccionarProductos();

    buscarCliente();
    buscarProductos();

    agregarProductoCotizacion();
    buscarProductosTemporal(data);

   
    
}

//Buscar Clientes
const nitCliente = document.querySelector('#nitCliente').addEventListener('keyup', function(e){
    const nit = e.target.value;
    buscarCliente(nit);
});

const idCliente = document.querySelector('#id_cliente');
const razonSocial = document.querySelector('#razon');
const telefonoCliente = document.querySelector('#telefono');
const direccionCliente = document.querySelector('#direccion');
const departamentoCliente = document.querySelector('#departamento');
const ciudadCliente = document.querySelector('#ciudad');



async function buscarCliente (nitCliente) {

    try {
        const url = `http://localhost:3000/api/buscarClientes?nit=${nitCliente}`;
        const resultado = await fetch(url);
        const respuesta = await resultado.json();
        
        if(respuesta != 'error'){
            idCliente.value = respuesta.id;
            razonSocial.value = respuesta.razon_social;
            telefonoCliente.value = respuesta.telefono;
            direccionCliente.value = respuesta.direccion;
            departamentoCliente.value = respuesta.departamentoId;
            ciudadCliente.value = respuesta.ciudad;
        } 

    } catch (error) {
            razonSocial.value= '';
            telefonoCliente.value = '';
            direccionCliente.value = '';
            departamentoCliente.value = '';
            ciudadCliente.value = '';
    }
};



//Buscar Productos
const codigoProducto = document.querySelector('#codigoProducto').addEventListener('keyup', function(e) {
    const codigo = e.target.value;
    buscarProductos(codigo);
});

const productoNombre = document.querySelector('#nombreProducto');
const descripcionProducto = document.querySelector('#descripcionProducto');
const precioProducto = document.querySelector('#precioProducto');
const idProducto = document.querySelector('#idProducto');

async function buscarProductos (codigoProducto) {
    try {
        const url = `http://localhost:3000/api/buscarProductos?producto=${codigoProducto}`;
        const resultado =await fetch(url);
        const respuesta = await resultado.json();

        if(respuesta != 'error'){
            productoNombre.value = respuesta.nombre;
            descripcionProducto.value = respuesta.descripcion;
            precioProducto.value = `$.${parseInt(respuesta.precio)}`;
            precioProducto.setAttribute('value', respuesta.precio);
            idProducto.value = respuesta.id;
        }
    } catch (error) {
        productoNombre.value = '';
        descripcionProducto.value = '';
        precioProducto.value = '';
        idProducto.value = '';
    }
}


//Agregar productos a la cotizacion
const agregarProducto = document.querySelector('#agregarProducto');
agregarProducto.addEventListener('submit', function(e) {
    e.preventDefault();

    const data = new FormData(agregarProducto);
    
    fetch('http://localhost:3000/api/temporal', {
        method: 'POST',
        body: data
    }).then( res => res.json() ).then( data => {
            mostrarProductos();
        })
});

async function mostrarProductos() {
    const url = `http://localhost:3000/api/obtenerTemporal`;
    const  resultado = await fetch(url);
    const productosCotizados = await resultado.json();
    
    mostrarProducto(productosCotizados);
   
}

//Mostrar todos los Productos

function mostrarProducto(productosCotizados) {
    const detalles =  document.querySelector('.detalles');

   const lastElement = productosCotizados.pop();

   const { cantidad , descuento, id, numero_producto, precio, producto } = lastElement;

   const numProducto = document.createElement('p');
   numProducto.classList.add('cod-producto');
   numProducto.textContent = numero_producto;

   const titulo = document.createElement('H3');
   titulo.textContent = producto

   const precioProducto = document.createElement('H3');
   precioProducto.textContent = `$${precio}`;

   const divCantidades =  document.createElement('DIV');
        divCantidades.classList.add('cantidades')
        const cantidades =  document.createElement('P');
        cantidades.textContent = `${cantidad} Unidades`;
        const Descuentos = document.createElement('P');
        Descuentos.textContent = `${descuento}%`;

        divCantidades.appendChild(cantidades);
        divCantidades.appendChild(Descuentos);
    
    //Subtotales
    const subtotal = precio * cantidad; 
    const subtotalDescuento = (subtotal - (subtotal * descuento) / 100 );

    const precioDescuento = document.createElement('H4');
    precioDescuento.textContent = `$.${subtotalDescuento}`;

    //Crear y anidar todo al div.producto
   const divProducto = document.createElement('DIV');
   divProducto.classList.add('producto');
   divProducto.dataset.idtemporal = id

   divProducto.appendChild(numProducto)
   divProducto.appendChild(titulo)
   divProducto.appendChild(precioProducto)
   divProducto.appendChild(divCantidades);
   divProducto.appendChild(precioDescuento);

   detalles.appendChild(divProducto);

   mostrarTotal( subtotalDescuento );
}

//Seleccionar todos los productos cotizados

function mostrarTotal( subtotalDescuento ) {
    const subtotal = subtotalDescuento;
    const iva = subtotal * ( 19/100 );
    const total = subtotal + iva;   
    
    const divTotal = document.querySelector('.total');

    const h4Subtotal = document.createElement('H4');
    h4Subtotal.textContent = `$.${subtotal}`;

    const ivap = document.createElement('P');
    ivap.textContent = iva;

    const totalH3 = document.createElement('H3');
    totalH3.textContent = total;

    divTotal.appendChild(h4Subtotal)
    divTotal.appendChild(ivap)
    divTotal.appendChild(totalH3);

    const totales = document.querySelector('.totales');
    totales.appendChild(divTotal);
}