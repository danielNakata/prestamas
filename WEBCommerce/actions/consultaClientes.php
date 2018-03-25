<?php
    include("../base/Conexion.php");

    $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
    if((isset($_GET["tipoBsq"]))&&(isset($_GET["filtro"]))){
        $conex = new Conexion();
        $conexion = $conex->getConexion();
        
        
    }
    echo $salidaJSON;

?>