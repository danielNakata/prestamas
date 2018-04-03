<?php
    include("../base/Conexion.php");

    $txtUsuario = $_GET["txtUsuario"];
    $txtContrasena = $_GET["txtContrasena"];

    $conexion = new Conexion();
    $conex = $conexion->getConexion();

    if(isset($txtUsuario)&&isset($txtContrasena)){
        $resultado = $conex->query("select count(*) as existe from ".$conexion->base.".tusuarios where email = '".$txtUsuario."' and contrasena= password('".$txtContrasena."') ");
        $numfilas = $resultado->num_rows;
        if($numfilas > 0){
            while($fila = $resultado->fetch_assoc()){
                $existe = $fila["existe"];
            }
            if(($existe === "1")||($existe === 1)){
                $resultado->free();
                $resultado = $conex->query("SELECT a.idusuario AS idusuario, IFNULL(a.email,'-') AS email, PASSWORD(IFNULL(a.contrasena,'-')) AS contrasena
	, IFNULL(a.nickname,'-') AS nickname, IFNULL(a.nombre,'-') AS nombre
	, IFNULL(a.apellidos,'-') AS apellidos, IFNULL(a.fechanac,'1990-01-01') AS fechanac
	, IFNULL(a.movil,'(00) 1234 5678') AS movil, IFNULL(a.idestatus,0) AS idestatus
	, IFNULL(a.fechaultimoacc, '0000-00-00 00:00:00') AS fechaultimoacc, IFNULL(a.lugarultimoacc,'-') AS lugarultimoacc
	, IFNULL(a.fechareg, '0000-00-00 00:00:00') AS fechareg, IFNULL(a.fechamod,'0000-00-00 00:00:00') AS fechamod
	, IFNULL(a.comentarios,'-') AS comentarios
	, IFNULL(b.idestatususr,0) AS idestatususr
	, IFNULL(b.estatususr,'-') AS estatususr
FROM ".$conexion->base.".tusuarios a
INNER JOIN ".$conexion->base.".tcatestatususuarios b ON a.idestatus = b.idestatususr
WHERE email = '".$txtUsuario."' ");
                $numfilas = $resultado->num_rows;
                if($numfilas > 0){
                    while($fila = $resultado->fetch_assoc()){
                        session_start();
                        $_SESSION["idusuario"] = $fila["idusuario"];
                        $_SESSION["email"] = $fila["email"];
                        $_SESSION["contrasena"] = $fila["contrasena"];
                        $_SESSION["nickname"] = $fila["nickname"];
                        $_SESSION["nombre"] = $fila["nombre"];
                        $_SESSION["apellidos"] = $fila["apellidos"];
                        $_SESSION["fechanac"] = $fila["fechanac"];
                        $_SESSION["movil"] = $fila["movil"];
                        $_SESSION["idestatus"] = $fila["idestatus"];
                        $_SESSION["fechaultimoacc"] = $fila["fechaultimoacc"];
                        $_SESSION["lugarultimoacc"] = $fila["lugarultimoacc"];
                        $_SESSION["fechareg"] = $fila["fechareg"];
                        $_SESSION["fechamod"] = $fila["fechamod"];
                        $_SESSION["comentarios"] = $fila["comentarios"];
                        $_SESSION["idestatususr"] = $fila["idestatususr"];
                        $_SESSION["estatususr"] = $fila["estatususr"];
                        
                        $resultado->free();
                        $conex->close();
                        header("Location: ../dashboard.php");
                    }
                }else{
                    $resultado->free();
                    $conex->close();
                    header("Location: ../index.php?msg=NO EXISTE EL USUARIO");
                }                
            }else{
                $resultado->free();
                $conex->close();
                header("Location: ../index.php?msg=EMAIL O CONTRASEÑA ERRONEO");
            }            
        }else{
            $resultado->free();
            $conex->close();
            header("Location: ../index.php?msg=EMAIL INCORRECTO");    
        }
    }else{
        $conex->close();
        header("Location: ../index.php?msg=PARAMETROS NO RECIBIDOS CORRECTAMENTE");
    }

?>