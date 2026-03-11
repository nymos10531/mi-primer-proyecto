<div class="container mt-5">
    <h1 class="text-center">Registro de Paciente</h1>
    <form action="<?php echo getUrl('pacientes', 'pacientes', 'postCreate'); ?>" method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="pac_documento" class="form-label">Documento</label>
                <input type="text" id="pac_documento" name="pac_documento" class="form-control" placeholder="Ingrese el documento" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="pac_nombre" class="form-label">Nombre</label>
                <input type="text" id="pac_nombre" name="pac_nombre" class="form-control" placeholder="Ingrese el nombre" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="pac_apellido" class="form-label">Apellido</label>
                <input type="text" id="pac_apellido" name="pac_apellido" class="form-control" placeholder="Ingrese el apellido" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pac_direccion" class="form-label">Dirección</label>
                <input type="text" id="pac_direccion" name="pac_direccion" class="form-control" placeholder="Ingrese la dirección">
            </div>
            <div class="col-md-6 mb-3">
                <label for="pac_telefono" class="form-label">Teléfono</label>
                <input type="text" id="pac_telefono" name="pac_telefono" class="form-control" placeholder="Ingrese el teléfono">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pac_correo" class="form-label">Correo</label>
                <input type="email" id="pac_correo" name="pac_correo" class="form-control" placeholder="ejemplo@correo.com" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gen_id" class="form-label">Género</label>
                <select id="gen_id" name="gen_id" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Hobbies</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hobby1" name="hobbies[]" value="Ir a cine">
                    <label class="form-check-label" for="hobby1">Ir a cine</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hobby2" name="hobbies[]" value="Playa">
                    <label class="form-check-label" for="hobby2">Playa</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hobby3" name="hobbies[]" value="Comida">
                    <label class="form-check-label" for="hobby3">Comida</label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Estrato</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="estrato1" name="estr_id" value="1">
                    <label class="form-check-label" for="estrato1">Estrato 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="estrato2" name="estr_id" value="2">
                    <label class="form-check-label" for="estrato2">Estrato 2</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="estrato3" name="estr_id" value="3">
                    <label class="form-check-label" for="estrato3">Estrato 3</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar Paciente</button>
        </div>
    </form>
</div>