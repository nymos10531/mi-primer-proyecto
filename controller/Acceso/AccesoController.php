<?php

include_once '../Model/Acceso/AccesoModel.php';

class AccesoController {
    public function login() {
        if (isset($_POST['docum'], $_POST['password'])) {
            $obj = new AccesoModel();
    
            $docum = $_POST['docum'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];
    
            // 1. Buscar al usuario con su documento y contraseña
            //inner join devuelve las filas donde hay coincidencias en ambas tablas unidas
            $sql = "SELECT * FROM usuario u INNER JOIN rol r ON u.rol_id = r.rol_id WHERE u.usu_docum = '$docum' AND u.usu_password = '$password' AND u.rol_id = '$rol'";
            $usuario = $obj->consult($sql);

            // Eliminar la dependencia directa del controlador en la conexión
            if (!$usuario) {
                error_log("Error en la consulta SQL: No se pudo ejecutar la consulta.");
                redirect("login.php?msg=Error en la base de datos");
                return;
            }
    
            if (mysqli_num_rows($usuario) > 0) {
                foreach ($usuario as $usu) {
                    $_SESSION['id'] = $usu['usu_id'];
                    $_SESSION['docum'] = $usu['usu_docum'];
                    $_SESSION['password'] = $usu['usu_password'];
                    $_SESSION['rol'] = $usu['rol_id'];
                }
                redirect("index.php");
            }else{
                redirect("login.php");
            }
            
        }
    }

    public function logout() {
        session_destroy();
        redirect("login.php");
    }
}

?>