<input type="hidden" name="id_cliente" id="id_cliente" value="" required>

            <div class="campo">
                <label for="nitCliente">Nit del Cliente</label>
                <input 
                    type="number"
                    name="nit"
                    id="nitCliente"
                    class="nitCliente"
                    selected
                />
            </div>

            <div class="campo">
                <label for="razon">Razon Social</label>
                <input 
                    type="text"
                    name="razon_social"
                    id="razon"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="telefono">Telefono</label>
                <input 
                    type="tel" 
                    name="telefono" 
                    id="telefono"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="direccion">Direccion</label>
                <input 
                    type="text" 
                    name="direccion" 
                    id="direccion"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="departamento">Departamento</label>
                <select name="departamentoId" id="departamento" disabled>
                    <option value="" selected disabled>--Seleccione una Opcion--</option>
                    <?php foreach($departamentos as $departamento): ?>
                        <option value="<?php echo s($departamento->id) ?>"><?php echo s($departamento->departamento)?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="campo">
                <label for="ciudad">Ciudad</label>
                <input 
                    type="text"
                    name="ciudad"
                    id="ciudad"
                    disabled
                />
            </div>