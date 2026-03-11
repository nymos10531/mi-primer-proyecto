<div class="container mt-5">
    <h1 class="text-center">Editar Historia Clínica</h1>
    <form action="<?= getUrl('historias', 'historias', 'postEdit'); ?>" method="POST">
        <input type="hidden" name="hist_id" value="<?= $historias['hist_id']; ?>">

        <div class="mb-3">
            <label for="hist_motv" class="form-label">Motivo de Visita</label>
            <textarea id="hist_motv" name="hist_motv" class="form-control" required><?= $historias['hist_motv']; ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="hist_esfod" class="form-label">Esfera OD</label>
                <input type="text" id="hist_esfod" name="hist_esfod" class="form-control" value="<?= $historias['hist_esfod']; ?>">
            </div>
            <div class="col-md-4">
                <label for="hist_cilod" class="form-label">Cilindro OD</label>
                <input type="text" id="hist_cilod" name="hist_cilod" class="form-control" value="<?= $historias['hist_cilod']; ?>">
            </div>
            <div class="col-md-4">
                <label for="hist_ejeod" class="form-label">Eje OD</label>
                <input type="text" id="hist_ejeod" name="hist_ejeod" class="form-control" value="<?= $historias['hist_ejeod']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="hist_esfoi" class="form-label">Esfera OI</label>
                <input type="text" id="hist_esfoi" name="hist_esfoi" class="form-control" value="<?= $historias['hist_esfoi']; ?>">
            </div>
            <div class="col-md-4">
                <label for="hist_ciloi" class="form-label">Cilindro OI</label>
                <input type="text" id="hist_ciloi" name="hist_ciloi" class="form-control" value="<?= $historias['hist_ciloi']; ?>">
            </div>
            <div class="col-md-4">
                <label for="hist_ejeoi" class="form-label">Eje OI</label>
                <input type="text" id="hist_ejeoi" name="hist_ejeoi" class="form-control" value="<?= $historias['hist_ejeoi']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="hist_diaod" class="form-label">Diagnóstico Ojo Derecho</label>
                <input type="text" id="hist_diaod" name="hist_diaod" class="form-control" value="<?= $historias['hist_diaod']; ?>">
            </div>
            <div class="col-md-6">
                <label for="hist_diaoi" class="form-label">Diagnóstico Ojo Izquierdo</label>
                <input type="text" id="hist_diaoi" name="hist_diaoi" class="form-control" value="<?= $historias['hist_diaoi']; ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="hist_recom" class="form-label">Recomendaciones</label>
            <textarea id="hist_recom" name="hist_recom" class="form-control"> <?= $historias['hist_recom']; ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar Historia Clínica</button>
        </div>
    </form>
</div>