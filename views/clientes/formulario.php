<div class="campo">
        <label for="nit">NIT o documento de Identificacion</label>
        <input 
            type="number"
            name="nit"
            id="nit"
            placeholder="Nit o documento de Identificacion del Cliente"
            value="<?php echo s($cliente->nit) ?>"
        />
    </div>

    <div class="campo">
        <label for="razon">Razon Social</label>
        <input 
            type="text"
            name="razon_social"
            id="razon"
            placeholder="Nombre de la empresa"
            value="<?php echo s($cliente->razon_social) ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            name="telefono"
            id="telefono"
            placeholder="Telefono de la empresa"
            value="<?php echo s($cliente->telefono) ?>"
        />
    </div>

    <div class="campo">
        <label for="direccion">Direccion Empresarial</label>
        <input
            type="text"
            name="direccion"
            id="direccion"
            placeholder="Direccion empresarial"
            value="<?php echo s($cliente->direccion) ?>"
        />
    </div>

    <div class="campo">
        <label for="correo">Correo Empresarial</label>
        <input 
            type="email"
            name="correo"
            id="correo"
            placeholder="Correo empresarial"
            value="<?php echo s($cliente->correo) ?>"
        />
    </div>

    <div class="campo">
        <label for="departamento">Departamento</label>
        <select name="departamentoId" id="departamento">
            <option value="" selected disabled>--Seleccione una Opcion--</option>
            <?php foreach($departamentos as $departamento): ?>
                <option value="<?php echo s($departamento->id) ?>"><?php echo s($departamento->departamento) ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="campo">
        <label for="ciudad">Ciudad</label>
        <input 
            type="text"
            name="ciudad"
            id="ciudad"
            placeholder="Ciudad de la empresa"
            value="<?php echo s($cliente->ciudad) ?>"
        />
    </div>

    <div class="campo">
        <label for="asesor">Asesor Encargado</label>
        <select name="usuarioId" id="asesor">
            <option value="" selected disabled>--Seleccione una Opcion--</option>
            <?php foreach($usuarios as $usuario): ?>
                <option value="<?php echo s($usuario->id) ?>"><?php echo s($usuario->nombre). " " .s($usuario->apellido) ?></option>
            <?php endforeach ?>
        </select>
    </div>