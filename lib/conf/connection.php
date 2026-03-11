<?php

// Toda clase arranca con mayúscula
class Connection{     // Esta clase va a manejar la conección a la base de datos
    
    private $server;  // lo que lleve private no se puede heredar, solo lo utiliza la clase
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;  // Esta variable contiene la conección

    // Public permite heredar y lo puede modificar un tercero
    public function __construct(){  // El metódo construct carga la informacion en las variables 
       // para que la clase pueda operar y pueda conectarse

        $this->setConnect();
        $this->connect();
    }

    private function setConnect(){
        require_once 'conf.php';

        $this->server = $server;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->port = $port;
    }
    private function connect(){
        // orden en el que la funcion mysqli_connect espera los parametros: 
        // 1. Servidor, 2. Usuario, 3. Contraseña, 4. Base de Datos, 5. Puerto
        $this->link = mysqli_connect($this->server, $this->user, $this->pass, $this->database, $this->port);
        if(!$this->link){
            die("No se pudo conectar a la base de datos");
        }else{
                //echo "Conectado a la base de datos";
        }
    }

    // Protected permite heredar, pero no permite cambios por un tercero
    protected function getConnect(){ 
        // Esta funcion nos permite retornar la conección
        return $this->link;
    }
    
    protected function close(){
        // Esta funcion cierra la conección por seguridad
        mysqli_close($this->link);
    }
    
} 

?>