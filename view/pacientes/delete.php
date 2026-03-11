<div class="mt-5">
    <h1 class="display-4">Eliminar paciente</h1>
</div>
    <div class="mt-5">
<?php
     foreach($pacientes as $pac){
    ?>
                <div class="col-md-6"> 
                    <div class="card mb-5 ">
                        <div class="card-body">
                            <form action="<?php echo getUrl("pacientes", "pacientes", "postDelete") ?>" method="post">

                                <input type="hidden" name="pac_id" id="pac_id" value="<?php echo $pac['pac_id'] ?>">

                                <label for="pac_documento" class="form-label">Documento:</label>
                                <input type="text" class="form-control" name="pac_documento" id="pac_documento" value="<?php echo $pac['pac_documento']?>"readonly>


                                    <label for="pac_nombre" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="pac_nombre" id="pac_nombre" value="<?php echo $pac['pac_nombre'] ?>" readonly>

                                    <label for="pac_apellido" class="form-label">Apellido:</label>
                                    <input type="text" class="form-control" name="pac_apellido" id="pac_apellido" value="<?php echo $pac['pac_apellido'] ?>" readonly>

                                    <label for="pac_direccion" class="form-label">direccion:</label>
                                    <input type="text" class="form-control" name="pac_direccion" id="pac_direccion" value="<?php echo $pac['pac_direccion'] ?>" readonly>

                                    
                                    <label for="pac_telefono" class="form-label">telefono:</label>
                                    <input type="text" class="form-control" name="pac_telefono" id="pac_telefono" value="<?php echo $pac['pac_telefono'] ?>" readonly>


                                    <label for="pac_correo" class="form-label">Email:</label>
                                    <input type="text" class="form-control" name="pac_correo" id="pac_correo" value="<?php echo $pac['pac_correo'] ?>" readonly>

                                    <label for="gen_id" class="form-label">Genero:</label>
                                    <input type="text" class="form-control" name="gen_id" id="gen_id" value="<?php echo $pac['gen_id'] ?>" readonly>
                                    

                                    <label for="estr_id" class="form-label">Estrato:</label>
                                    <input type="text" class="form-control" name="estr_id" id="estr_id" value="<?php echo $pac['estr_id'] ?>" readonly>



                                <div class="d-grid gap-2"> <!--amplia el boton eliminar  -->
                                    <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
        }
    ?>
</div>