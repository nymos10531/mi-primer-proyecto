<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/fondolist.css">
    <title>Lista de pacientes</title>
</head>
<body>
    
<div class="container mt-5">
    <h1 class="text-center">Lista de pacientes</h1>
    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>DOCUMENTO</th>
                <th>NOMBRE PACIENTE</th>
                <th>TELEFONO</th>
                <th>GENERO</th>
                <th>ESTRATO</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $pac): ?>
                <tr>
                    <td><?php echo $pac['pac_documento']; ?></td>
                    <td><?php echo $pac['pac_nombre'] . ' ' . $pac['pac_apellido']; ?></td>
                    <td><?php echo $pac['pac_telefono']; ?></td>
                    <td><?php echo $pac['gen_nombre']; ?></td>
                    <td><?php echo $pac['estr_nombre']; ?></td>
                    <td>
                        <a href="<?php echo getUrl('historias', 'historias', 'getCreate', ['pac_id' => $pac['pac_id']]); ?>" class="btn btn-info btn-sm">Crear Historia</a>
                        <a href="<?php echo getUrl('pacientes', 'pacientes', 'getUpdate', ['pac_id' => $pac['pac_id']]); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?php echo getUrl('pacientes', 'pacientes', 'anular', ['pac_id' => $pac['pac_id']]); ?>" class="btn btn-danger btn-sm">Anular</a>
                        <a href="<?php echo getUrl('pacientes', 'pacientes', 'delete', ['pac_id' => $pac['pac_id']]); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este paciente?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>