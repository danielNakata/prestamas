<?php
    include("../base/Conexion.php");

    $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
    $usuario = "";
    $usuarioJSON = "";
    if((isset($_GET["tipoAccion"]))&&(isset($_GET["param"]))){
        $usuario = base64_decode($_GET["param"]);
        $usuarioJSON = json_decode($usuario,true);
        $conex = new Conexion();
        $conexion = $conex->getConexion();
        if($_GET["tipoAccion"]==="1"){
            //nuevo cliente
            $sql = "SELECT IFNULL((SELECT MAX(idcliente) FROM tclientes WHERE idusuario = ".$usuarioJSON["idusuario"]."),0) AS maxcliente ";
            $resultado = $conexion->query($sql);
            $numfilas = $resultado->num_rows;
            $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER EL ULTIMO CLIENTE DEL USUARIO\"}";
            
            if($numfilas>0){
                $filaJSON = "";
                $idcliente = 0;
                while($fila = $resultado->fetch_assoc()){
                    $idcliente = $fila["maxcliente"];
                }
                try{
                    $resultado->free();
                }catch(Exception $ex){

                }
                $idcliente = $idcliente + 1;
                $sql = "INSERT INTO tclientes(idcliente, nombre, apellidos, fechanac, email, telefono1, telefono2, calle, colonia, numext, numint, delmun, estado, pais, codpost, idestatus, idusuario, fechareg) VALUES( "
                .$idcliente.", "
                ."'".$usuarioJSON["nombre"]."', "
                ."'".$usuarioJSON["apellidos"]."', "
                ."'".substr($usuarioJSON["fechanac"],0,10)."', "
                ."'".$usuarioJSON["email"]."', "
                ."'".$usuarioJSON["telefono1"]."', "
                ."'".$usuarioJSON["telefono2"]."', "
                ."'".$usuarioJSON["calle"]."', "
                ."'".$usuarioJSON["colonia"]."', "
                ."'".$usuarioJSON["numext"]."', "
                ."'".$usuarioJSON["numint"]."', "
                ."'".$usuarioJSON["delmun"]."', "
                ."'".$usuarioJSON["estado"]."', "
                ."'".$usuarioJSON["pais"]."', "
                ."'".$usuarioJSON["codpost"]."', "
                ."1, "
                ."".$usuarioJSON["idusuario"].", "
                ."current_timestamp) ";
                
                $resultado = $conexion->query($sql);
                $filasDev = $conexion->affected_rows;
                $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO INSERTAR AL CLIENTE CORRECTAMENTE\"}";
                if($filasDev > 0){
                    $salidaJSON = "{\"res\":\"1\", \"msg\":\"CLIENTE AGREGADO CORRECTAMENTE CON EL ID ".$idcliente."\"}";
                }
            }
        }else{
            //edita al cliente, validar si es edicion de estatus o edicion de datos
            if($_GET["tipoAccion"]==="2"){
                $sql = "UPDATE tclientes SET
                        nombre = '".$usuarioJSON["nombre"]."'
                        ,apellidos = '".$usuarioJSON["apellidos"]."'
                        ,fechanac = '".substr($usuarioJSON["fechanac"],0,10)."'
                        ,email = '".$usuarioJSON["email"]."'
                        ,telefono1 = '".$usuarioJSON["telefono1"]."'
                        ,telefono2 = '".$usuarioJSON["telefono2"]."'
                        ,calle = '".$usuarioJSON["calle"]."'
                        ,colonia = '".$usuarioJSON["colonia"]."'
                        ,numext = '".$usuarioJSON["numext"]."'
                        ,numint = '".$usuarioJSON["numint"]."'
                        ,delmun = '".$usuarioJSON["delmun"]."'
                        ,estado = '".$usuarioJSON["estado"]."'
                        ,pais = '".$usuarioJSON["pais"]."'
                        ,codpost = '".$usuarioJSON["codpost"]."'
                        ,fechamod = CURRENT_TIMESTAMP
                    WHERE idusuario = ".$usuarioJSON["idusuario"]." AND idcliente = ".$usuarioJSON["idcliente"]." ";
                $resultado = $conexion->query($sql);
                $filasDev = $conexion->affected_rows;
                $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO ACTUALIZAR AL CLIENTE CORRECTAMENTE\"}";
                if($filasDev > 0){
                    $salidaJSON = "{\"res\":\"1\", \"msg\":\"CLIENTE ACTUALIZADO CORRECTAMENTE\"}";
                }
                
            } else {
                //actualiza el estado (lo da de baja)
                if($_GET["tipoAccion"]==="3"){
                    $sql = "UPDATE tclientes SET
                                idestatus = 9
                            WHERE idusuario = ".$usuarioJSON["idusuario"]." AND idcliente = ".$usuarioJSON["idcliente"]." ";
                    $resultado = $conexion->query($sql);
                    $filasDev = $conexion->affected_rows;
                    $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO INACTIVAR AL CLIENTE CORRECTAMENTE\"}";
                    if($filasDev > 0){
                        $salidaJSON = "{\"res\":\"1\", \"msg\":\"CLIENTE INACTIVADO CORRECTAMENTE\"}";
                    }
                }
            }
        }
        $conexion->close();
    }
    echo $salidaJSON;
?>
