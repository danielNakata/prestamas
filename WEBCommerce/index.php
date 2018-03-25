<?php
    session_start();
    session_destroy();
    $msg = "";

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
    }
?>
<html lang="es" ng-app="webcommerce">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.:Prest-ta-mas:.</title>
        <link rel="stylesheet" href="js/jqueryui/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/iniciosesion.css" type="text/css" />
        <script src="js/angular.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jqueryui/jquery-ui.js"></script>        
        <script src="js/datetimepicker.js"></script>
        <script src="js/loading-bar.js"></script>
        <script src="js/webcommerce.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Prest-ta-mas</a>
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-      target="#navbarCollapse" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div ng-controller="InicioSesionController">
            <form class="form-signin">
              <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Inicio de Sesión</h1>
              <label for="inputEmail" class="sr-only">Correo Electronico</label>
              <input type="email" id="txtEmail" name="txtEmail" ng-model="consulta.txtEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
              <label for="inputPassword" class="sr-only">Contraseña</label>
              <input type="password" id="txtContrasena" name="txtContrasena" ng-model="consulta.txtContrasena" class="form-control" placeholder="Contrasena" required>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="false"> Recuerdame
                </label>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="button" ng-click="iniciarSesion()">Accesar</button>
              <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
              <p><?php echo $msg; ?></p>
            </form>
        </div>
    </body>
</html>