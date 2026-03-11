<?php
    
    include_once '../Model/usuario/usuarioModel.php';

    class usuarioController {
        public function getCreate(){

        
        include_once '../view/usuario/create.php';

        }
        
        public function postCreate(){
            
            $usu_docum = $_POST['usu_docum'];
            $usu_password =$_POST['usu_password'];
            $rol_id = $_POST['rol_id'];
            
            $obj = new usuarioModel();
            
          // dd($_POST);
            $sql = "INSERT INTO usuario (usu_docum,usu_password,rol_id) VALUES ('$usu_docum','$usu_password','$rol_id')";

            $ejecutar = $obj -> insert($sql);
            if($ejecutar){
                redirect(getUrl("usuario","usuario","list"));
            }else{
                echo "Error: No se pudo registrar el Usuario";
            }
        }

        public function list(){

            $obj = new usuarioModel(); //permite acceder a las funciones de MasterModel (insertar, eliminar, actualizar, consultar)
           
            $sql = "SELECT usu_id,usu_docum,usu_password , usu_imagen , rol.rol_nombre, usu_fecha_registro FROM usuario , rol WHERE usu_id = usu_id AND usuario.rol_id = rol.rol_id ";
            
            $usuario = $obj ->consult($sql);
            

            include_once '../view/usuario/list.php';
        }
        

        public function getUpdate(){

                $usu_id = $_GET['usu_id'];

                $obj = new UsuarioModel();

                $sql = "SELECT * FROM usuario WHERE usu_id = $usu_id";

                $usuario = $obj->consult($sql);


                include_once '../view/usuario/update.php';
        }
        public function postUpdate(){
            
            $usu_id = $_POST['usu_id'];
            $usu_docum = $_POST['usu_docum'];
            $usu_password = $_POST['usu_password'];
            $rol_nombre = $_POST['rol_nombre'];
            

            $obj = new UsuarioModel();

            $sql = "UPDATE usuario SET usu_id = '$usu_id' ,   usu_docum = '$usu_docum', usu_password = '$usu_password', rol_nombre = '$rol_nombre' WHERE usu_id = $usu_id";

            $ejecutar = $obj->update($sql);

            if($ejecutar){
                redirect(getUrl("usuario","usuario","list"));
            }else{
                echo "Error: No se  pudo editar el Usuario";
            }
        }
        public function getDelete(){
            //se carga el formulario de eliminar 
            $usu_id = $_GET['usu_id'];
 
            $obj = new UsuarioModel();

            $sql = "SELECT usu_id ,  usu_docum , usu_rol FROM usuario WHERE usuario.usu_id = $usu_id"; //

            $usuario = $obj->consult($sql);

            include_once '../view/usuario/delete.php';

        }
        public function postDelete(){
            //se elimina

            $usu_id = $_POST['usu_id'];
            

            $obj = new UsuarioModel();

            $sql = "DELETE FROM usuario WHERE usu_id = $usu_id";

            $ejecutar = $obj->delete($sql);

            if($ejecutar){
                redirect(getUrl("usuario","usuario","list"));
            }else{
                echo "Error: No se  pudo eliminar el usuario ";
            }
   }
}

?>