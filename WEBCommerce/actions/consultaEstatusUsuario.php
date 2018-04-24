<?php
    include("../base/Conexion.php");
    
    $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO CONSULTAR EL CATALOGO DE ESTATUS DE USUARIOS\"}";
    $tiposPagos = "";
    $conex = new Conexion();
    $conexion = $conex->getConexion();
    $sql = "SELECT idestatususr AS idestatususr
                ,estatususr AS estatususr
                ,fechareg AS fechareg
              FROM tcatestatususuarios
             ORDER BY idestatususr ASC ";
    $resultado = $conexion->query($sql);
    $numfilas = $resultado->num_rows;
    if($numfilas>0){
        $columnas = $resultado->fetch_fields();
        $clientesJSON = "";
        $filaJSON = "";
        $filasJSON = "";
        while($fila = $resultado->fetch_assoc()){
            $filaJSON = "";
            foreach($columnas as $col){
                $filaJSON.="\"".$col->name."\":\"".$fila[$col->name]."\",";
            }
            $filasJSON .= "{".substr($filaJSON,0,(strrpos($filaJSON,",")))."},";
        }

        $clientesJSON = ",\"tipopagos\":[".substr($filasJSON,0,(strrpos($filasJSON,",")))."]";
        $salidaJSON = "{\"res\":\"1\", \"msg\":\"DATOS OBTENIDOS\"".$clientesJSON."}";
        $resultado->free();
        $conexion->close();
    }
    echo $salidaJSON;

?>