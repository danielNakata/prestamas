<?php
    
    class Conexion {
        
        var $host = "127.0.0.1";
        var $port = "3306";
        var $user = "root";
        var $pass = "";
        var $base = "webcommerce";
        var $conexion = "";
        
        
        /*Crea la conexion con la base de datos*/
        function getConexion(){
            try{
                $conexion = new mysqli($this->host.":".$this->port, $this->user, $this->pass, $this->base);
                if($conexion->connect_errno){
                    $conexion = "SIN CONEXION A LA BASE DE DATOS: ".$conexion->connect_errno." - ".$conexion->connect_error;
                }
            }catch(Exception $ex){
                $conexion = "Excepcion en la conexion: ".$ex->getMessage();    
            }            
            return $conexion;
        }
        
        
    }

?>