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
        <script src="js/webcommerce.js"></script>
    </head>
    <body>    
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Prest-ta-mas</a>
          <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar">
          <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                  <a class="nav-link" href="#"><?php echo $_SESSION["nickname"] ?></a>
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
                        <a class="nav-link" href="#">
                          <span data-feather="file"></span>
                          Clientes
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span data-feather="shopping-cart"></span>
                          Prestamos
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span data-feather="users"></span>
                          Pagos
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span data-feather="bar-chart-2"></span>
                          Estadisticos
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span data-feather="layers"></span>
                          Usuarios
                        </a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
            <main id="contenido" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" role="main">
                
            </main>
        </div>        
    </body>
</html>