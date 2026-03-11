<h2 class="text-center">Información Historia Clínica</h2>

<?php if (isset($historias) && $historias): ?>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <p><strong>No. Historia:</strong> <?php echo $historias['hist_id'] ?? 'No disponible'; ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Paciente:</strong> <?php echo isset($pacientes) && $pacientes ? ($pacientes['pac_nombre'] ?? 'No disponible') . " " . ($pacientes['pac_apellido'] ?? 'No disponible') : 'No disponible'; ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Género:</strong> <?php echo $pacientes['gen_nombre'] ?? 'No disponible'; ?></p>
            </div>
        </div>

        <div class="mb-3">
            <p><strong>Motivo de Visita:</strong></p>
            <textarea class="form-control" readonly><?php echo $historias['hist_motv'] ?? 'No disponible'; ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label><strong>Esfera OD:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_esfod'] ?? 'No disponible'; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label><strong>Cilindro OD:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_cilod'] ?? 'No disponible'; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label><strong>Eje OD:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_ejeod'] ?? 'No disponible'; ?>" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label><strong>Esfera OI:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_esfoi'] ?? 'No disponible'; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label><strong>Cilindro OI:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_ciloi'] ?? 'No disponible'; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label><strong>Eje OI:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_ejeoi'] ?? 'No disponible'; ?>" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label><strong>Diagnóstico Ojo Derecho:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_diaod'] ?? 'No disponible'; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label><strong>Diagnóstico Ojo Izquierdo:</strong></label>
                <input type="text" class="form-control" value="<?php echo $historias['hist_diaoi'] ?? 'No disponible'; ?>" readonly>
            </div>
        </div>

        <div class="mb-3">
            <p><strong>Recomendaciones:</strong></p>
            <textarea class="form-control" readonly><?php echo $historias['hist_recom'] ?? 'No disponible'; ?></textarea>
        </div>

        <div class="text-center">
            <a href="<?php echo getUrl('historias','historias','list'); ?>" class="btn btn-primary">Volver al listado</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-center">No se encontró la información de la historia clínica.</p>
<?php endif; ?>