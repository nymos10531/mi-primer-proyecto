<?php

include_once '../lib/conf/connection.php';

class MasterModel extends Connection {
    // Extends permite heredar la clase

    public function consult($sql) {
        
    $result = mysqli_query($this->getConnect(), $sql);
    
    //  Cada uno de estos métodos utiliza mysqli_query para ejecutar las consultas SQL 
    return $result; // luego devuelve el resultado de la consulta
    }

    public function insert($sql) {
        $result = mysqli_query($this->getConnect(), $sql);
    
        return $result;
        }

        public function update($sql) {
            $result = mysqli_query($this->getConnect(), $sql);
        
            return $result;
            }

            public function delete($sql) {
                $result = mysqli_query($this->getConnect(), $sql);
            
                return $result;
                }

    public function getLastError() {
        return mysqli_error($this->getConnect());
    }

}
?>