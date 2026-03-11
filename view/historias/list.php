<div class="container mt-5">
    <h1 class="text-center">Listado de Historias Clínicas</h1>
    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>No. Historia</th>
                <th>Nombre Paciente</th>
                <th>Motivo de Visita</th>
                <th>Recomendaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($historias)): ?>
                <?php foreach ($historias as $his): ?>
                    <tr>
                        <td><?= $his['hist_id']; ?></td>
                        <td><?= $his['pac_nombre'] . ' ' . $his['pac_apellido']; ?></td>
                        <td><?= $his['hist_motv']; ?></td>
                        <td><?= $his['hist_recom']; ?></td>
                        <td>
                            <a href="<?= getUrl('historias', 'historias', 'show', ['hist_id' => $his['hist_id']]); ?>" class="btn btn-info btn-sm">Ver Detalle</a>
                            <a href="<?= getUrl('historias', 'historias', 'getEdit', ['hist_id' => $his['hist_id']]); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= getUrl('historias', 'historias', 'delete', ['hist_id' => $his['hist_id']]); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta historia clínica?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No hay historias registradas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>