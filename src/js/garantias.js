//iife
(function() {

    obtenerGarantias();

    let garantias = [];

    //modal
    const agregarGarantiaBTN = document.querySelector('#agregar-garantia');
    agregarGarantiaBTN.addEventListener('click', mostrarFormulario);

    async function obtenerGarantias() {
        try {
            const id = obtenerGarantia();
            const url = `/api/garantia?url=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json()


            garantias = resultado.garantia;
            mostrarGarantias();
        } catch (error) {
            console.log(error);
        }
    }


    /*Scripting para mostrar las tareas*/

    function mostrarGarantias() {

        //Limpiar las garantias ya mostradas

        /*Cuando no hay garantias */
        if (garantias.length === 0) {
            const contenedorGarantias = document.querySelector('#listado-garantias');

            const textoNoGarantias = document.createElement('LI');
            textoNoGarantias.textContent = 'No hay garantias para esta empresa';
            textoNoGarantias.classList.add('no-tareas');

            contenedorGarantias.appendChild(textoNoGarantias);
            return;
        }

        const estados = {
            0: 'Pendiente',
            1: 'Aceptada',
            2: 'Rechazada' /* Buscar sinonimo */
        }

        garantias.forEach( garantia => {
            /* Contenedor padre */
            const contenedorGarantia =  document.createElement('LI');
            contenedorGarantia.dataset.garantiaId = garantia.id;
            contenedorGarantia.classList.add('garantiaDIV');

            const serialMedidorGarantia = document.createElement('P');
            serialMedidorGarantia.classList.add('seriales');
            serialMedidorGarantia.textContent = garantia.serialMedidor;

            const fechaIngresoHora = document.createElement('P');
            fechaIngresoHora.textContent = `Ingreso:  ${garantia.fecha} Hora: ${garantia.horaIngreso}`;

            const facturaNumeroGarantia =  document.createElement('P');
            facturaNumeroGarantia.textContent = ` Remision: ${garantia.tipoFactura.toUpperCase()} ${garantia.numeroFactura} `;

            const opcionesDIV = document.createElement('DIV');
            opcionesDIV.classList.add('opciones');


            /*Botones para las opciones (3)*/
            const generarPDFHidrometrica = document.createElement('BUTTON');
            generarPDFHidrometrica.classList.add('estado-garantia');
            generarPDFHidrometrica.classList.add(`${estados[garantia.estado].toLowerCase()}`);
            generarPDFHidrometrica.dataset.estadoGarantia = garantia.estado;
            generarPDFHidrometrica.dataset.idGarantia = garantia.id;
            generarPDFHidrometrica.textContent = 'Generar PDF';

            const estadoAprovado = document.createElement('BUTTON');
            estadoAprovado.classList.add('aprobado');
            estadoAprovado.dataset.idGarantia = garantia.id;
            estadoAprovado.textContent = `Aceptar`;

            const estadoRechazado = document.createElement('BUTTON');
            estadoRechazado.classList.add('rechazo');
            estadoRechazado.dataset.idGarantia = garantia.id;
            estadoRechazado.textContent = `Rechazar`;

            /*Agregar los botones al DIV*/
            opcionesDIV.appendChild(generarPDFHidrometrica);
            opcionesDIV.appendChild(estadoAprovado);
            opcionesDIV.appendChild(estadoRechazado);

            /*MOSTRAR EL LISTADO */
            contenedorGarantia.appendChild(serialMedidorGarantia);
            contenedorGarantia.appendChild(fechaIngresoHora);
            contenedorGarantia.appendChild(facturaNumeroGarantia);
            contenedorGarantia.appendChild(opcionesDIV);

            document.querySelector('#listado-garantia').appendChild(contenedorGarantia);  

            console.log(contenedorGarantia);

        })

    }



    /* Scripting para el modal */

    function mostrarFormulario() {
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `
            <form class="formulario" enctype="multipart/form-data">
                <legend>Añade una nueva Garantia</legend>
                <div class="campo">
                    <label for="medidorId">Tipo de Medidor</label>
                    <select name="medidorId" id="medidorId">
                        <option value="1">CAM3050R200PRCAL</option>
                        <option value="2">cam3075r160eqcal</option>
                        <option value="3">cam3100r160eqcal</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="serialMedidor">Serial del Medidor</label>
                    <input type="text" name="serialMedidor" id="serialMedidor" placeholder="Serial del Medidor">
                </div>
                <div class="campo">
                    <label for="tipoFactura">Tipo de Medidor</label>
                    <select name="tipoFactura" id="tipoFactura">
                        <option value="fs">FSFE</option>
                        <option value="vc">VCFE</option>
                        <option value="pos">POS</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="numeroFactura">Número del la Factura</label>
                    <input type="text" name="numeroFactura" id="numeroFactura" placeholder="Número de la factura">
                </div>
                <div class="campo">
                    <label for="archivoGarantia">Soporte Fisico</label>
                    <input type="file" name="archivoGarantia" id="archivoGarantia" accept=".pdf/*, image/*"> 
                </div>
                <div class="opciones">
                    <input type="submit" value="Crear Garantia" class="submit-nueva-garantia">
                    <button type="button" class="cerrar-modal">Cancelar</button>
                </div>
            </form>
        `;

        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 0);

        modal.addEventListener('click', function(e) {
            e.preventDefault();

            if (e.target.classList.contains('cerrar-modal')) {
                const formulario = document.querySelector('.formulario');
                formulario.classList.add('cerrar');
                setTimeout(() => {
                    modal.remove();
                }, 500);
            }

            if (e.target.classList.contains('submit-nueva-garantia')) {
                submitNuevaGarantia();
            }
        });
        document.querySelector('.todo').appendChild(modal);
    }

    function submitNuevaGarantia() {
        const serialMedidorGarantia = document.querySelector('#serialMedidor').value.trim();
        const numeroFacturaGarantia = document.querySelector('#numeroFactura').value.trim();
        const tipoFacturaGarantia = document.querySelector('#tipoFactura').value;
        const medidorId = document.querySelector('#medidorId').value;

        if (serialMedidorGarantia && numeroFacturaGarantia !== '') {
            agregarGarantia(serialMedidorGarantia, numeroFacturaGarantia, tipoFacturaGarantia, medidorId);
            return;
        } else {
            mostrarAlerta('Faltan datos ', 'error', document.querySelector('.formulario legend'))
        }
    }

    //Agregar nueva Garantia
    async function agregarGarantia(serialMedidorGarantia, numeroFacturaGarantia, tipoFacturaGarantia, medidorId) {

        const datos = new FormData();
        datos.append('medidorId', medidorId)
        datos.append('serialMedidor', serialMedidorGarantia);
        datos.append('tipoFactura', tipoFacturaGarantia);
        datos.append('numeroFactura', numeroFacturaGarantia);
        datos.append('garantiaId',
            obtenerGarantia());

        try {
            const url = `http://localhost:3000/api/garantia`;
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();
            mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario legend'));

            if (resultado.tipo === 'exito') {
                const modal = document.querySelector('.modal');
                setTimeout(() => {
                    modal.remove();
                }, 1500);
            }

        } catch (error) {
            console.log(error);
        }
    }


    //Obtener los id de los url
    function obtenerGarantia() {
        const params = new URLSearchParams(window.location.search);
        const garantia = Object.fromEntries(params.entries());
        return garantia.url;
    }

    //Alertas
    function mostrarAlerta(mensaje, tipo, referencia) {

        const alertaPrevia = document.querySelector('.alerta');
        if (alertaPrevia) {
            alertaPrevia.remove();
        }

        const alerta = document.createElement('DIV');
        alerta.classList.add('alerta', tipo);
        alerta.textContent = mensaje;

        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);

        setTimeout(() => {
            alerta.remove();
        }, 5000);
    }

})();