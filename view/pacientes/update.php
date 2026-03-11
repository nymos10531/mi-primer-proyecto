<div class="container mt-5">
    <h1 class="text-center">Editar Paciente</h1>
    <form action="<?php echo getUrl('pacientes', 'pacientes', 'postUpdate'); ?>" method="post">
        <div class="row">
            <input type="hidden" name="pac_id" value="<?php echo $pacientes[0]['pac_id']; ?>">

            <div class="col-md-4 mb-3">
                <label for="pac_documento" class="form-label">Documento:</label>
                <input type="text" id="pac_documento" name="pac_documento" class="form-control" value="<?php echo $pacientes[0]['pac_documento']; ?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="pac_nombre" class="form-label">Nombre:</label>
                <input type="text" id="pac_nombre" name="pac_nombre" class="form-control" value="<?php echo $pacientes[0]['pac_nombre']; ?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="pac_apellido" class="form-label">Apellido:</label>
                <input type="text" id="pac_apellido" name="pac_apellido" class="form-control" value="<?php echo $pacientes[0]['pac_apellido']; ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="pac_direccion" class="form-label">Dirección:</label>
                <input type="text" id="pac_direccion" name="pac_direccion" class="form-control" value="<?php echo $pacientes[0]['pac_direccion']; ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="pac_telefono" class="form-label">Teléfono:</label>
                <input type="text" id="pac_telefono" name="pac_telefono" class="form-control" value="<?php echo $pacientes[0]['pac_telefono']; ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="pac_correo" class="form-label">Correo:</label>
                <input type="email" id="pac_correo" name="pac_correo" class="form-control" value="<?php echo $pacientes[0]['pac_correo']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="pac_hobbies" class="form-label">Hobbies:</label>
                <div>
                    <input type="checkbox" name="pac_hobbies[]" value="Ir a cine" <?php echo (strpos($pacientes[0]['pac_hobbies'], 'Ir a cine') !== false) ? 'checked' : ''; ?>> Ir a cine<br>
                    <input type="checkbox" name="pac_hobbies[]" value="Playa" <?php echo (strpos($pacientes[0]['pac_hobbies'], 'Playa') !== false) ? 'checked' : ''; ?>> Playa<br>
                    <input type="checkbox" name="pac_hobbies[]" value="Comida" <?php echo (strpos($pacientes[0]['pac_hobbies'], 'Comida') !== false) ? 'checked' : ''; ?>> Comida
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="gen_id" class="form-label">Género:</label>
                <select id="gen_id" name="gen_id" class="form-control">
                    <option value="1" <?php echo ($pacientes[0]['gen_nombre'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="2" <?php echo ($pacientes[0]['gen_nombre'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="estr_id" class="form-label">Estrato:</label>
                <div>
                    <input type="radio" id="estrato1" name="estr_id" value="1" <?php echo ($pacientes[0]['estr_nombre'] == 'Estrato 1') ? 'checked' : ''; ?>> Estrato 1<br>
                    <input type="radio" id="estrato2" name="estr_id" value="2" <?php echo ($pacientes[0]['estr_nombre'] == 'Estrato 2') ? 'checked' : ''; ?>> Estrato 2<br>
                    <input type="radio" id="estrato3" name="estr_id" value="3" <?php echo ($pacientes[0]['estr_nombre'] == 'Estrato 3') ? 'checked' : ''; ?>> Estrato 3
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
