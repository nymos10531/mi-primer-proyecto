<div class="container mt-5">
    <h1 class="text-center">Historia Clínica</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <p><strong>Documento:</strong> <?php echo $pacientes['pac_documento']; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Nombre:</strong> <?php echo $pacientes['pac_nombre']; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Apellido:</strong> <?php echo $pacientes['pac_apellido']; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Teléfono:</strong> <?php echo $pacientes['pac_telefono']; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Género:</strong> <?php echo $pacientes['gen_nombre']; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Estrato:</strong> <?php echo $pacientes['estr_nombre']; ?></p>
        </div>
    </div>
    <form action="<?php echo getUrl('historias', 'historias', 'postCreate'); ?>" method="POST">
        <input type="hidden" name="pac_id" value="<?php echo $_GET['pac_id']; ?>">
        <div class="mb-3">
            <label for="hist_motv" class="form-label">Motivo de Visita</label>
            <textarea id="hist_motv" name="hist_motv" class="form-control" placeholder="Motivo Visita" required></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="hist_esfod" class="form-label">Esfera OD</label>
                <input type="text" id="hist_esfod" name="hist_esfod" class="form-control" placeholder="Esfera ojo derecho">
            </div>
            <div class="col-md-4">
                <label for="hist_cilod" class="form-label">Cilindro OD</label>
                <input type="text" id="hist_cilod" name="hist_cilod" class="form-control" placeholder="Cilindro ojo derecho">
            </div>
            <div class="col-md-4">
                <label for="hist_ejeod" class="form-label">Eje OD</label>
                <input type="text" id="hist_ejeod" name="hist_ejeod" class="form-control" placeholder="Eje ojo derecho">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="hist_esfoi" class="form-label">Esfera OI</label>
                <input type="text" id="hist_esfoi" name="hist_esfoi" class="form-control" placeholder="Esfera ojo izquierdo">
            </div>
            <div class="col-md-4">
                <label for="hist_ciloi" class="form-label">Cilindro OI</label>
                <input type="text" id="hist_ciloi" name="hist_ciloi" class="form-control" placeholder="Cilindro ojo izquierdo">
            </div>
            <div class="col-md-4">
                <label for="hist_ejeoi" class="form-label">Eje OI</label>
                <input type="text" id="hist_ejeoi" name="hist_ejeoi" class="form-control" placeholder="Eje ojo izquierdo">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="diag_od" class="form-label">Diagnóstico Ojo Derecho</label>
                <input type="text" id="hist_diaod" name="hist_diaod" class="form-control" placeholder="Ojo derecho">
            </div>
            <div class="col-md-6">
                <label for="diag_oi" class="form-label">Diagnóstico Ojo Izquierdo</label>
                <input type="text" id="hist_diaoi" name="hist_diaoi" class="form-control" placeholder="Ojo izquierdo">
            </div>
        </div>
        <div class="mb-3">
            <label for="hist_recom" class="form-label">Recomendaciones</label>
            <textarea id="hist_recom" name="hist_recom" class="form-control" placeholder="Digite las recomendaciones..."></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-warning">Registrar Historia Clínica</button>
        </div>
    </form>
</div>