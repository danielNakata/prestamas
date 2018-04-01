<?php
    include("../base/Conexion.php");

    $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE2\"}";
    $clientesJSON = "";
    if((isset($_GET["tipoBsq"]))&&(isset($_GET["filtro"]))){
        $conex = new Conexion();
        $conexion = $conex->getConexion();
        $sql = "SELECT a.idcliente AS idcliente
                ,IFNULL(a.nombre,'-') AS nombre
                ,IFNULL(a.apellidos,'-') AS apellidos
                ,IFNULL(a.fechanac,'1990-01-01') AS fechanac
                ,IFNULL(a.email,'-') AS email
                ,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1
                ,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2
                ,IFNULL(a.calle, '-') AS calle
                ,IFNULL(a.numext, '-') AS numext
                ,IFNULL(a.numint, '-') AS numint
                ,IFNULL(a.delmun, '-') AS delmun
                ,IFNULL(a.estado, '-') AS estado
                ,IFNULL(a.pais, '-') AS pais
                ,IFNULL(a.codpost, '00000') AS codpost
                ,a.idestatus AS idestatus
                ,IFNULL(a.montototal, 0) AS montototal
                ,IFNULL(a.montoplazo, 0) AS montoplazo
                ,IFNULL(a.numplazo, 0) AS numplazo
                ,a.idtipoprestamo AS idtipoprestamo
                ,IFNULL(a.interesprestamo, 0) AS interesprestamo
                ,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo
                ,IFNULL(a.numprestamos, 0) AS numprestamos
                ,a.idestatusprestamo AS idestatusprestamo
                ,a.idusuario AS idusuario
                ,a.fechareg AS fechareg
                ,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod
                ,b.estatuscliente AS estatuscliente
                ,c.estatusprestamos AS estatusprestamos
            FROM tclientes a
            INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes
            INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos
            WHERE ";
        
        switch($_GET["tipoBsq"]){
            case "1":
                $sql.= " a.idusuario = ".$_GET["filtro"]." ";
                break;
        }
        
        $sql.=" order by a.idestatus asc, a.idcliente asc";
        
        $resultado = $conexion->query($sql);
        $numfilas = $resultado->num_rows;
        $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO HAY DATOS PARA MOSTRAR\"}";
        if($numfilas > 0){
            $columnas = $resultado->fetch_fields();
            $clientesJSON = "";
            $filaJSON = "";
            while($fila = $resultado->fetch_assoc()){
                $filaJSON = "";
                foreach($columnas as $col){
                    $filaJSON.="\"".$col->name."\":\"".$fila[$col->name]."\",";
                }
                $filaJSON = "{".substr($filaJSON,0,(strrpos($filaJSON,",")))."},";
            }
            
            $clientesJSON = ",\"clientes\":[".substr($filaJSON,0,(strrpos($filaJSON,",")))."]";
            $salidaJSON = "{\"res\":\"1\", \"msg\":\"DATOS OBTENIDOS\"".$clientesJSON."}";
        }
        $resultado->free();
        $conexion->close();
    }
    
    echo $salidaJSON;

?>