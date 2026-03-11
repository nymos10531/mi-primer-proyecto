<?php
include_once '../model/historias/historiasModel.php';


class historiasController {
    
    public function list() {
        $obj = new historiasModel();
        $sql = "SELECT h.hist_id, h.hist_motv, h.hist_recom, p.pac_nombre, p.pac_apellido 
                FROM historias h
                JOIN pacientes p ON h.pac_id = p.pac_id";
        $historias = $obj->consult($sql);

        include_once '../View/historias/list.php';
    }
    public function getCreate() {
        $pac_id = $_GET['pac_id']; // Obtener el ID del paciente desde la URL
        $obj = new historiasModel();
    
        // Obtener la información del paciente
        $sqlPacientes = "SELECT p.pac_documento, p.pac_nombre, p.pac_apellido, p.pac_direccion, p.pac_telefono, g.gen_nombre, e.estr_nombre 
                        FROM pacientes p
                        LEFT JOIN genero g ON p.gen_id = g.gen_id
                        LEFT JOIN estrato e ON p.estr_id = e.estr_id
                        WHERE p.pac_id = $pac_id";
        $resultpacientes = $obj->consult($sqlPacientes);
    
        if (!$resultpacientes) {
            error_log("Error en la consulta SQL: " . $sqlPacientes);
            echo "<p>Error al obtener la información del paciente. Por favor, intente nuevamente.</p>";
            return;
        }
    
        $pacientes = mysqli_fetch_assoc($resultpacientes);
    
        if (!$pacientes) {
            echo "<p>Error: No se encontró información del paciente.</p>";
            return;
        }
    
        // Aquí pasas la variable a la vista
        include_once '../view/historias/create.php';
    }
   
    public function postCreate() {
        $pac_id      = $_POST['pac_id'];
        $hist_motv   = $_POST['hist_motv'];
        $hist_esfod  = !empty($_POST['hist_esfod']) ? "'" . $_POST['hist_esfod'] . "'" : "NULL";
        $hist_cilod  = !empty($_POST['hist_cilod']) ? "'" . $_POST['hist_cilod'] . "'" : "NULL";
        $hist_ejeod  = !empty($_POST['hist_ejeod']) ? "'". $_POST['hist_ejeod'] . "'" : "NULL";
        $hist_diaod  = !empty($_POST['hist_diaod']) ? "'" . $_POST['hist_diaod'] . "'" : "NULL";
        $hist_diaoi  = !empty($_POST['hist_diaoi']) ? "'" . $_POST['hist_diaoi'] . "'" : "NULL";
        $hist_recom  = !empty($_POST['hist_recom']) ? "'" . $_POST['hist_recom'] . "'" : "NULL";
        $hist_esfoi  = !empty($_POST['hist_esfoi']) ? "'" . $_POST['hist_esfoi'] . "'" : "NULL";
        $hist_ciloi  = !empty($_POST['hist_ciloi']) ? "'" . $_POST['hist_ciloi'] . "'" : "NULL";
        $hist_ejeoi = !empty($_POST['hist_ejeoi']) ? "'" . $_POST['hist_ejeoi'] . "'" : "NULL";
       
        $sql = "INSERT INTO historias 
        (pac_id, hist_motv, hist_esfod, hist_cilod, hist_ejeod, hist_diaod, hist_diaoi, hist_recom, hist_esfoi, hist_ciloi, hist_ejeoi) 
        VALUES ('$pac_id', '$hist_motv', $hist_esfod, $hist_cilod, $hist_ejeod, $hist_diaod, $hist_diaoi, $hist_recom, $hist_esfoi, $hist_ciloi, $hist_ejeoi)";
        
        $obj = new historiasModel();
        $ejecutar = $obj->insert($sql);

        if ($ejecutar) {
            // Redirección directa (sin usar 'redirect', que no está definido)
            header("Location: " . getUrl('historias', 'historias', 'list'));
            exit();
        } else {
            // Registro del error en el log para depuración
            error_log("Error al insertar historia: $sql");
            error_log("Error de MySQL: " . $obj->getLastError());
            echo "<p>Error al crear historia clínica. Intente nuevamente.</p>";
        }
    }

    public function show() {
        $hist_id = $_GET['hist_id'];
        $obj = new historiasModel();

        $sql = "SELECT * FROM historias WHERE hist_id = $hist_id";
        $resulthistorias = $obj->consult($sql);
        $historias = mysqli_fetch_assoc($resulthistorias);

        $sqlpacientes = "SELECT p.pac_documento, p.pac_nombre, p.pac_apellido, p.pac_direccion, p.pac_telefono, 
                        g.gen_nombre, e.estr_nombre 
                        FROM pacientes p
                        LEFT JOIN genero g ON p.gen_id = g.gen_id
                        LEFT JOIN estrato e ON p.estr_id = e.estr_id
                        WHERE p.pac_id = (SELECT pac_id FROM historias WHERE hist_id = $hist_id)";
        $resultpacientes = $obj->consult($sqlpacientes);
        $pacientes = mysqli_fetch_assoc($resultpacientes);

        include_once '../View/historias/show.php';
    }

    public function getEdit() {
        $hist_id = $_GET['hist_id'];
        $obj = new historiasModel();

        $sql = "SELECT * FROM historias WHERE hist_id = $hist_id";
        $resulthistorias = $obj->consult($sql);
        $historias = mysqli_fetch_assoc($resulthistorias);

        if (!$historias) {
            echo "<p>Error: No se encontró la historia clínica.</p>";
            return;
        }

        include_once '../view/historias/edit.php';
    }

    public function postEdit() {
        $hist_id    = $_POST['hist_id'];
        $hist_motv  = $_POST['hist_motv'];
        $hist_recom = $_POST['hist_recom'];

        $sql = "UPDATE historias SET hist_motv = '$hist_motv', hist_recom = '$hist_recom' WHERE hist_id = $hist_id";

        $obj = new historiasModel();
        $ejecutar = $obj->update($sql);

        if ($ejecutar) {
            echo "<script>alert('Historia clínica actualizada exitosamente.');</script>";
            redirect(getUrl('historias', 'historias', 'list'));
        } else {
            error_log("Error en la consulta SQL: " . $sql);
            error_log("Error de MySQL: " . $obj->getLastError());
            echo "<p>Error al actualizar la historia clínica. Por favor, intente nuevamente.</p>";
        }
    }

    public function delete() {
        $hist_id = $_GET['hist_id'];
        $obj = new historiasModel();

        $sql = "DELETE FROM historias WHERE hist_id = $hist_id";
        $ejecutar = $obj->delete($sql);

        if ($ejecutar) {
            echo "<script>alert('Historia clínica eliminada exitosamente.');</script>";
            redirect(getUrl('historias', 'historias', 'list'));
        } else {
            echo "<p>Error al eliminar la historia clínica. Por favor, intente nuevamente.</p>";
        }
    }
}
?>