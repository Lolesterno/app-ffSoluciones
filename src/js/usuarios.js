(function() {
    consultarUsuariosApi();

    async function consultarUsuariosApi() {
        try {
            const url = 'http://localhost:3000/api/usuarios';
            const resultado = await fetch(url);
            const usuarios = await resultado.json();
    
            mostrarUsuarios(usuarios);
        } catch (error) {
           console.log(error); 
        }
    }

    function mostrarUsuarios (usuarios) {
        usuarios.forEach( usuario => {
            const { id, nombre, apellido, email, telefono, user } = usuario;
     
            const nombreUsuario = document.createElement('H3');
            nombreUsuario.classList.add('nombre-usuario');
            nombreUsuario.textContent = `${nombre} ${apellido}`;
    
            const emailUsuario = document.createElement('P');
            emailUsuario.classList.add('email-usuario');
            emailUsuario.textContent = email;
    
            const userName = document.createElement('P');
            userName.classList.add('user-usuario');
            userName.textContent = user;
    
            const telefonoUsuario = document.createElement('P');
            telefonoUsuario.classList.add('telefono-usuario');
            telefonoUsuario.textContent = telefono;
    
            const botonEditar = document.createElement('A');
            botonEditar.classList.add('editar-cliente');
            botonEditar.setAttribute('href', `/editar?id=${id}`);
            botonEditar.textContent = 'Editar Usuario';

            const divBoton = document.createElement('DIV');
            divBoton.classList.add('divBoton');
            divBoton.appendChild(botonEditar)
    
            const usuarioDIV = document.createElement('DIV');
            usuarioDIV.classList.add('usuario');
            usuarioDIV.dataset.idUsuario = id;
    
            usuarioDIV.appendChild(nombreUsuario);
            usuarioDIV.appendChild(emailUsuario);
            usuarioDIV.appendChild(userName);
            usuarioDIV.appendChild(telefonoUsuario);
            usuarioDIV.appendChild(divBoton);
    
    
            document.querySelector('#usuario').appendChild(usuarioDIV);
    
        } );
    }
    

}) ();