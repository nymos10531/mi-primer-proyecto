<div class="mt-4">
    <h1 class="display-4"></h1>
</div>

<div class="mt-2">
    <a href="<?php echo getUrl("pacientes","getCreate")?>">
        <button class="btn btn-primary"></button>
</a>
</div>

<div class="mt-2">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>direccion</th>
                <th>telefono</th>
                <th>correo</th>
                <th>genero</th>
                <th>estrato</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Fecha registro</td>
            </tr>
        </thead>
        <tbody>

        <?php
            foreach($pacientes as $pac){ 
                echo "<tr>";
                echo "<td>".$pac['pac_id']."</td>";
                echo "<td>".$pac['pac_documento']."</td>";
                echo "<td>".$pac['pac_nombre']."</td>";
                echo "<td>".$pac['pac_apellido']."</td>";
                echo "<td>".$pac['pac_direccion']."</td>";
                echo "<td>".$pac['pac_telefono']."</td>";
                echo "<td>".$pac['pac_correo']."</td>";
                echo "<td>".$pac['gen_id']."</td>";
                echo "<td>".$pac['estr_id']."</td>";
                

                echo "<td>"
                    ."<a href='".getUrl("pacientes","pacientes","getUpdate",array("pac_id"=>$pac['pac_id']))."'>"
                        ."<button class='btn btn-secondary'>Editar</button>"
                    ."</a>"
                ."</td>";

                echo "<td>"
                    ."<a href='".getUrl("pacientes","pacientes","getDelete",array("pac_id"=>$pac['pac_id']))."'>"
                        ."<button class='btn btn-danger'>Eliminar</button>"
                    ."</a>"
                ."</td>";
                
                echo "</tr>";

            }
            ?>
        </tbody>
   </table>
</div>