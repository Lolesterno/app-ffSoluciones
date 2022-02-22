let paso = 1;
let pasoInicial = 1;
let pasoFinal = 3;


document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});


function iniciarApp () {

    mostrarSeccion();   //Muestra y oculta las secciones
    tabs(); //Cambia la seccion cuando se presionen los tabs
    botonesPaginador(); //Agrega o quita los botones del paginador
    paginaSiguiente();
    paginaAnterior();



}


function mostrarSeccion() {

    //Ocultar a quien ya tenga la clase mostrar
    const seleccionarAnterior = document.querySelector('.mostrar');
    if(seleccionarAnterior){
        seleccionarAnterior.classList.remove('mostrar');
    }

    //Seleccionar una seccion con el paso
    const seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar');

    //Quitar la clase actual
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior){
        tabAnterior.classList.remove('actual');
    }

    //Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');

}

function tabs() {
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach( boton => {
        boton.addEventListener('click', function(e) {
            paso =   parseInt( e.target.dataset.paso );

            mostrarSeccion();

            botonesPaginador();
        })
    } )
}

function botonesPaginador () {

    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');

    if(paso === 1) {
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    } else if( paso === 3 ){
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');

        
    } else {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion();

}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function () {

        if( paso <= pasoInicial ) return;
            paso--;
        
        botonesPaginador();
       
    })  
}

function paginaSiguiente () {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click',  function() {
        if ( paso >= pasoFinal) return;

        paso ++;
        botonesPaginador();
    })

}

