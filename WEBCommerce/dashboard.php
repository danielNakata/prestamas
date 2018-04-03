<?php
    session_start();

    

?>
<html lang="es" ng-app="webcommerce">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Web para control de Prestamos">
        <meta name="author" content="dnlNkt">
        <title>.:Prest-ta-mas:.</title>
        <link rel="stylesheet" href="js/jqueryui/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/dashboard.css" type="text/css" />
        <script src="js/angular.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jqueryui/jquery-ui.js"></script>
        <script src="js/datetimepicker.js"></script>
        <script src="js/loading-bar.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/webcommerce.js"></script>
    </head>
    <body>                 
            <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0" ng-controller="SesionController">
                <form id="frmSesion">
                <input type="hidden" id="sesionIdUsuario" name="sesionIdUsuario" ng-model="sesion.idusuario" ng-init="sesion.idusuario =<?php echo $_SESSION['idusuario'] ?>" value="{{sesion.idusuario}}" />
                <input type="hidden" id="sesionEmail" name="sesionEmail" ng-model="sesion.email" ng-init="sesion.email ='<?php echo $_SESSION['email'] ?>'"  value="{{sesion.email}}" />
                <input type="hidden" id="sesionNickname" name="sesionNickname" ng-model="sesion.nickname" ng-init="sesion.nickname ='<?php echo $_SESSION['nickname'] ?>'"  value="{{sesion.nickname}}" />
                <input type="hidden" id="sesionNombre" name="sesionNombre" ng-model="sesion.nombre" ng-init="sesion.nombre ='<?php echo $_SESSION['nombre'] ?>'"  value="{{sesion.nombre}}" />
                <input type="hidden" id="sesionApellidos" name="sesionApellidos" ng-model="sesion.apellidos" ng-init="sesion.apellidos ='<?php echo $_SESSION['apellidos'] ?>'"  value="{{sesion.apellidos}}" />
                <input type="hidden" id="sesionFechanac" name="sesionFechanac" ng-model="sesion.fechanac" ng-init="sesion.fechanac ='<?php echo $_SESSION['fechanac'] ?>'"  value="{{sesion.fechanac}}" />
                <input type="hidden" id="sesionMovil" name="sesionMovil" ng-model="sesion.movil" ng-init="sesion.movil ='<?php echo $_SESSION['movil'] ?>'"  value="{{sesion.movil}}"/>
                <input type="hidden" id="sesionIdEstatus" name="sesionIdEstatus" ng-model="sesion.idestatus" ng-init="sesion.init ='<?php echo $_SESSION['idestatus'] ?>'"  value="{{sesion.idestatus}}"/>
                <input type="hidden" id="sesionFechaUltimoAcc" name="sesionFechaUltimoAcc" ng-model="sesion.fechaultimoacc" ng-init="sesion.fechaultimoacc =<?php echo $_SESSION['fechaultimoacc'] ?>'"  value="{{sesion.fechaultimoacc}}"/>
                <input type="hidden" id="sesionLugarUltimoAcc" name="sesionLugarUltimoAcc" ng-model="sesion.lugarultimoacc" ng-init="sesion.lugarultimoacc ='<?php echo $_SESSION['lugarultimoacc'] ?>'"  value="{{sesion.lugarultimoacc}}"/>
                <input type="hidden" id="sesionFechaReg" name="sesionFechaReg" ng-model="sesion.fechareg" ng-init="sesion.fechareg ='<?php echo $_SESSION['fechareg'] ?>'"  value="{{sesion.fechareg}}"/>
                <input type="hidden" id="sesionFechaMod" name="sesionFechaMod" ng-model="sesion.fechamod" ng-init="sesion.fechamod ='<?php echo $_SESSION['fechamod'] ?>'"  value="{{sesion.fechamod}}"/>
                <input type="hidden" id="sesionComentarios" name="sesionComentarios" ng-model="sesion.comentarios" ng-init="sesion.comentarios ='<?php echo $_SESSION['comentarios'] ?>'"  value="{{sesion.comentarios}}"/>
                <input type="hidden" id="sesionIdEstatusUsr" name="sesionIdEstatusUsr" ng-model="sesion.idestatususr" ng-init="sesion.idestatususr =<?php echo $_SESSION['idestatususr'] ?>"  value="{{sesion.idestatususr}}"/>
                <input type="hidden" id="sesionEstatusUsr" name="sesionEstatusUsr" ng-model="sesion.estatususr" ng-init="sesion.estatususr ='<?php echo $_SESSION['estatususr'] ?>'"  value="{{sesion.estatususr}}"/>
                    
                <input type="hidden" id="globalIdUsuario" name="globalIdUsuario" ng-model="idusuariogbl" ng-init="idusuariogbl ='<?php echo $_SESSION['idusuario'] ?>'"  value="{{idusuariogbl}}"/>
                <input type="hidden" id="globalNickname" name="globalNickname" ng-model="nicknamegbl" ng-init="nicknamegbl ='<?php echo $_SESSION['nickname'] ?>'"  value="{{nicknamegbl}}"/>
                <input type="hidden" id="globalEmail" name="globalEmail" ng-model="emailgbl" ng-init="emailgbl ='<?php echo $_SESSION['email'] ?>'"  value="{{emailgbl}}"/>
            </form>       
              <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Prest-ta-mas</a>
              <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar">
              <ul class="navbar-nav px-3">
                  <li class="nav-item text-nowrap">
                      <a class="nav-link" href="#">{{sesion.nickname}}</a>
                    </li>
              </ul>
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="actions/cerrarSesion.php">Salir</a>
                </li>
              </ul>
            </nav>
        <div class="container-fluid">
          <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          <span data-feather="home"></span>
                          Inicio <span class="sr-only">Actual</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDiv('clientesDiv')">
                          <span data-feather="file"></span>
                          Clientes
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDiv('prestamosDiv')">
                          <span data-feather="shopping-cart"></span>
                          Prestamos
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDiv('pagosDiv')">
                          <span data-feather="users"></span>
                          Pagos
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDiv('estadisticosDiv')">
                          <span data-feather="bar-chart-2"></span>
                          Estadisticos
                        </a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
            <main id="contenido" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" role="main">
                <div id="clientesDiv" class="container" style="visibility: hidden; height: 0px;" ng-include="'pages/clientes.php'" >
                </div>
                <div id="prestamosDiv" class="container" style="visibility: hidden; height: 0px;" ng-include="'pages/prestamos.php'" >
                </div>
                <div id="pagosDiv" class="container" style="visibility: hidden; height: 0px;" ng-include="'pages/pagos.php'" >
                </div>
                <div id="estadisticosDiv" class="container" style="visibility: hidden; height: 0px;" ng-include="'pages/estadisticos.php'" >
                </div>
            </main>
        </div>        
    </body>
</html>