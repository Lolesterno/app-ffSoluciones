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
    
            const nitCliente = document.createElement('P');
            nitCliente.classList.add('nombre-usuario');
            nitCliente.textContent = nit;
    
            const razonCliente =  document.createElement('P');
            razonCliente.textContent = razon_social;
    
            const telefonoCliente =  document.createElement('P');
            telefonoCliente.textContent = telefono;
    
            const direccionCliente = document.createElement('P');
            direccionCliente.textContent = direccion;
    
            const clienteDiv =  document.createElement('DIV');
            clienteDiv.classList.add('usuario');
            clienteDiv.dataset.idCliente = id;
    
            const correoCliente =  document.createElement('P');
            correoCliente.textContent = correo;
    
            const ciudadCliete =  document.createElement('P');
            ciudadCliete.textContent = ciudad;
    
            const editarCliente = document.createElement('A');
            editarCliente.setAttribute('href', `/editar-cliente?id=${id}`);
            editarCliente.classList.add('boton-crear');
            editarCliente.textContent = 'Editar Cliente';
    
            clienteDiv.appendChild(nitCliente);
            clienteDiv.appendChild(razonCliente);
            clienteDiv.appendChild(telefonoCliente);
            clienteDiv.appendChild(direccionCliente);
            clienteDiv.appendChild(correoCliente);
            clienteDiv.appendChild(ciudadCliete);
            clienteDiv.appendChild(editarCliente);
    
            const listar = document.querySelector('#cliente');
            listar.appendChild(clienteDiv)
        })
    }
    

}) () ;