<?php
    session_start();
//redirect: nos direcciona a donde necesitamos ir
    function redirect($url) {
        
        echo "<script>";
            echo "window.location.href='$url'";
        echo "</script>";

    }

    function dd ($var) {
        
        //die (): evita que la función se siga ejecutando de acuerdo a ciertos parámetros, evitadno que se cometan errroes
        echo "<pre>";
        die (print_r($var));

    }

    function getUrl ($modulo, $controlador, $funcion, $parametros = null) {

        $url = "index.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
        // key/indice = dep_id
        // value = 1 (posición en tabla)
        if($parametros != null){
            //key = dep_id
            //value = 1
            foreach($parametros as $key => $value){
                $url .= "&$key=$value";
            }
        }

        return $url;

    }

    function resolve () {

        $modulo = ucwords($_GET ['modulo']);
        $controlador = ucwords($_GET ['controlador']);
        $funcion = $_GET ['funcion'];

        //- módulo = carpeta dentro de controller. Ej: Usuario.
        //- controlador = archivo dentro del módulo. Ej: UsuarioController.php
        //- función = método dentro del controlador.

        if (is_dir ("../controller/$modulo")) {

            if (is_file ("../controller/$modulo/".$controlador."Controller.php")) {

                include_once "../controller/$modulo/".$controlador."Controller.php";
                $clase = $controlador."Controller";
                $objeto = new $clase(); 

                if (method_exists ($objeto,$funcion)) {
                    $objeto -> $funcion();
                }else {
                    echo "El método específicasdo no existe.";
                }
            }else {
                echo "El controlador específicado no existe.";
            }
        }else {
            echo "El módulo específicado no existe.";
        }
    }
    
?>