<h3>Editar Cliente</h3>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/clientes" class="boton-crear">&laquo; Volver</a>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="nit">Nit o Documento de la Empresa</label>
        <input 
            type="number"
            name="nit"
            id="nit"
            value="<?php echo s($clientes->nit) ?>"
        />
    </div>

    <div class="campo">
        <label for="razon">Razon Social</label>
        <input 
            type="text"
            name="razon_social"
            id="razon"
            value="<?php echo s($clientes->razon_social) ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            name="telefono"
            id="telefono"
            value="<?php echo s($clientes->telefono) ?>"
        />
    </div>

    <div class="campo">
        <label for="direccion">Direccion Empresarial</label>
        <input 
            type="text"
            name="direccion"
            id="direccion"
            value="<?php echo s($clientes->direccion) ?>"
        />
    </div>

    <div class="campo">
        <label for="correo">Correo Empresarial</label>
        <input 
            type="email"
            name="correo"
            id="correo"
            value="<?php echo s($clientes->correo) ?>"
        />
    </div>

    <div class="campo">
        <label for="departamento">Departamento</label>
        <select name="departamento" id="departamento">
            <option value="" disabled>--Seleccione un Departamento--</option>
            <?php foreach($departamentos as $departamento): ?>
                <option <?php $clientes->departamentoId === $departamento->id ? 'selected' : '' ?> 
                value="<?php echo s($departamento->id) ?>"><?php echo s($departamento->departamento) ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="campo">
        <label for="ciudad">Ciudad</label>
        <input 
            type="text"
            name="ciudad"
            id="ciudad"
            value="<?php echo s($clientes->ciudad) ?>"
        />
    </div>

    <div class="campo">
        <label for="asesor">Asesor Encargado</label>
        <select name="usuarioId" id="asesor">
            <option value="">--Seleccione una Opcion--</option>
            <?php foreach($usuarios as $usuario): ?>
                <option <?php $clientes->usuarioId === $usuario->id ? 'selected' : '' ?>
                value="<?php echo s($usuario->id) ?>"><?php echo s($usuario->nombre). " " .s($usuario->apellido) ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="submit" value="Actualizar Cliente" class="boton-crear">
</form>