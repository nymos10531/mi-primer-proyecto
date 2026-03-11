<?php

include_once '../Model/pacientes/pacientesModel.php';

class pacientesController {
    public function getCreate() {
        include_once '../view/pacientes/create.php';
    }

    public function postCreate() {
       
        // Validar si las claves existen en $_POST antes de usarlas
        $pac_id = isset($_POST['pac_id']) ? $_POST['pac_id'] : null;
        $pac_documento = isset($_POST['pac_documento']) ? $_POST['pac_documento'] : null;
        $pac_nombre = isset($_POST['pac_nombre']) ? $_POST['pac_nombre'] : null;
        $pac_apellido = isset($_POST['pac_apellido']) ? $_POST['pac_apellido'] : null;
        $pac_direccion = isset($_POST['pac_direccion']) ? $_POST['pac_direccion'] : null;
        $pac_telefono = isset($_POST['pac_telefono']) ? $_POST['pac_telefono'] : null;
        $pac_correo = isset($_POST['pac_correo']) ? $_POST['pac_correo'] : null;
        $gen_id = isset($_POST['gen_id']) ? $_POST['gen_id'] : null;
        $estr_id = isset($_POST['estr_id']) ? $_POST['estr_id'] : null;

        // Validar que los campos obligatorios no estén vacíos
        if (!$pac_documento || !$pac_nombre || !$pac_apellido) {
            echo "<script>alert('Por favor, complete los campos obligatorios: Documento, Nombre y Apellido.');</script>";
            return;
        }

        $obj = new pacientesModel();

        $sql = "INSERT INTO pacientes (pac_documento, pac_nombre, pac_apellido, pac_direccion, pac_telefono, pac_correo, gen_id, estr_id) 
                VALUES ('$pac_documento', '$pac_nombre', '$pac_apellido', '$pac_direccion', '$pac_telefono', '$pac_correo', $gen_id, $estr_id)";
        $ejecutar = $obj->insert($sql);

        if ($ejecutar) {
            redirect(getUrl("pacientes", "pacientes", "list")); 
        } else {
            error_log("Error en la consulta SQL: " . $obj->getLastError());
            echo "<script>alert('Error al registrar el paciente. Por favor, revise los datos e intente nuevamente.');</script>";
        }
    }

    public function list() {
        $obj = new PacientesModel();
        $sql = "SELECT p.*, g.gen_nombre, e.estr_nombre 
                FROM pacientes p
                LEFT JOIN genero g ON p.gen_id = g.gen_id
                LEFT JOIN estrato e ON p.estr_id = e.estr_id";
        $pacientes = $obj->consult($sql);

        include_once '../view/pacientes/list.php';
    }
    public function postDelete() {
        $pac_id = $_POST['pac_id']; // obtener id del formulario
        $obj = new PacientesModel();

        $sql = "DELETE FROM pacientes WHERE pac_id = $pac_id";
        $eliminar = $obj->delete($sql);

        if ($eliminar) {
            redirect(getUrl("pacientes", "pacientes", "list"));
        } else {
            echo "Error al eliminar el paciente.";
        }
    }

    public function getDelete() {
        $pac_id = $_GET['pac_id']; // Obtener el ID del paciente desde la URL
        $obj = new PacientesModel();

        $sql = "SELECT * FROM pacientes WHERE pac_id = $pac_id";
        $result = $obj->consult($sql);
        $pacientes = mysqli_fetch_assoc($result);

        if (!$pacientes) {
            echo "<p>Error: No se encontró el paciente con ID $pac_id.</p>";
            return;
        }

        include_once '../view/pacientes/delete.php';
    }

    public function getUpdate() {
        $pac_id = $_GET['pac_id']; // Obtener el ID del paciente desde la URL
        $obj = new PacientesModel();

        $sql = "SELECT p.*, g.gen_nombre, e.estr_nombre, p.pac_hobbies 
                FROM pacientes p
                LEFT JOIN genero g ON p.gen_id = g.gen_id
                LEFT JOIN estrato e ON p.estr_id = e.estr_id
                WHERE p.pac_id = $pac_id";
        $result = $obj->consult($sql);
        $pacientes = mysqli_fetch_assoc($result);
        $pacientes = [$pacientes]; // Convertir el registro único en un arreglo para que sea compatible con la vista

        if (!$pacientes) {
            echo "<p>Error: No se encontró el paciente con ID $pac_id.</p>";
            return;
        }

        include_once '../view/pacientes/update.php';
    }

    public function postUpdate() {
        $pac_id = $_POST['pac_id'];
        $pac_documento = $_POST['pac_documento'];
        $pac_nombre = $_POST['pac_nombre'];
        $pac_apellido = $_POST['pac_apellido'];
        $pac_direccion = $_POST['pac_direccion'];
        $pac_telefono = $_POST['pac_telefono'];
        $pac_correo = $_POST['pac_correo'];
        $gen_id = $_POST['gen_id'];
        $estr_id = $_POST['estr_id'];
        $pac_hobbies = $_POST['pac_hobbies'];

        $sql = "UPDATE pacientes SET 
                    pac_documento = '$pac_documento', 
                    pac_nombre = '$pac_nombre', 
                    pac_apellido = '$pac_apellido', 
                    pac_direccion = '$pac_direccion', 
                    pac_telefono = '$pac_telefono', 
                    pac_correo = '$pac_correo', 
                    gen_id = $gen_id, 
                    estr_id = $estr_id 
                WHERE pac_id = $pac_id";

        $obj = new PacientesModel();
        $ejecutar = $obj->update($sql);

        if ($ejecutar) {
            echo "<script>alert('Paciente actualizado exitosamente.');</script>";
            redirect(getUrl('pacientes', 'pacientes', 'list'));
        } else {
            error_log("Error en la consulta SQL: " . $sql);
            error_log("Error de MySQL: " . $obj->getLastError());
            echo "<p>Error al actualizar el paciente. Por favor, intente nuevamente.</p>";
        }
    }

    public function anular() {
        $pac_id = $_GET['pac_id']; // Obtener el ID del paciente desde la URL
        $obj = new pacientesModel();

        // Cambiar el estado del paciente a 'Inactivo'
        $sql = "UPDATE pacientes SET estado = 'inactivo' WHERE pac_id = $pac_id";
        $result = $obj->update($sql);

        if ($result) {
            echo "<script>alert('Paciente anulado exitosamente.');</script>";
            redirect(getUrl("pacientes", "pacientes", "list"));
        } else {
            echo "<script>alert('Error al anular el paciente.');</script>";
        }
    }
}
