(function () {

    consultarClientesAPI();

    async function consultarClientesAPI() {
        try {
            const url = 'http://localhost:3000/api/clientes';
            const resultado = await fetch(url);
            const clientes = await resultado.json();
    
            mostrarClientes(clientes);
            
        } catch (error) {
            console.log(error);
        }
    };

    function mostrarClientes ( clientes ){
        clientes.forEach( cliente => {
            const { id, nit, razon_social, telefono, direccion, correo, ciudad } = cliente;
    
            const nitCliente = document.createElement('H3');
            nitCliente.classList.add('nit-cliente');
            nitCliente.textContent = nit;
    
            const razonCliente =  document.createElement('P');
            razonCliente.textContent = razon_social;
    
            const telefonoCliente =  document.createElement('P');
            telefonoCliente.textContent = telefono;
    
            const direccionCliente = document.createElement('P');
            direccionCliente.textContent = direccion;
    
            const correoCliente =  document.createElement('P');
            correoCliente.textContent = correo;
            
            const ciudadCliete =  document.createElement('P');
            ciudadCliete.textContent = ciudad;
            
            const divDatosCliente = document.createElement('DIV');
            divDatosCliente.classList.add('datos-cliente');
            divDatosCliente.appendChild(direccionCliente);
            divDatosCliente.appendChild(telefonoCliente);
            divDatosCliente.appendChild(correoCliente);
            divDatosCliente.appendChild(ciudadCliete);

            const editarCliente = document.createElement('A');
            editarCliente.setAttribute('href', `/editar-cliente?id=${id}`);
            editarCliente.classList.add('editar-cliente');
            editarCliente.textContent = 'Editar Cliente';
            
            
            const clienteDiv =  document.createElement('DIV');
            clienteDiv.classList.add('cliente');
            clienteDiv.dataset.idCliente = id;

            const divBoton = document.createElement('DIV');
            divBoton.classList.add('divBoton');
            divBoton.appendChild(editarCliente)
    
            clienteDiv.appendChild(nitCliente);
            clienteDiv.appendChild(razonCliente);
            clienteDiv.appendChild(divDatosCliente);
            clienteDiv.appendChild(divBoton);
    
            const listar = document.querySelector('#cliente');
            listar.appendChild(clienteDiv)
        })
    }
    

}) () ;