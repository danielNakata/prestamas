/*archivo angular para estas chunches*/
var webcommerce;

(function () {
    webcommerce = angular.module('webcommerce', ['chieffancypants.loadingBar', 'ui.bootstrap.datetimepicker']);
    
    var idusuariogbl = "";
    var nicknamegbl  = "";
    var emailgbl = "";
    
    /*Controlador de Inicio de Sesion*/
    webcommerce.controller('InicioSesionController', function($scope, $http, $window, $rootScope){
        $scope.consulta = {
            txtEmail:''
            ,txtContrasena:''
        };    
        $scope.usuario = {};
        $scope.salida = "";
        
        $scope.iniciarSesion = function(){
            try{
                emailgbl = $scope.consulta.txtEmail;
                window.location.href = "actions/iniciarSesion.php?txtUsuario="+$scope.consulta.txtEmail+"&txtContrasena="+$scope.consulta.txtContrasena;
            }catch(ex){
                alert(ex.message);
            } 
        }
    });
    
    /*Controlador para sesion*/
    webcommerce.controller('SesionController', function($scope, $http, $window, $rootScope){
        $scope.sesion = {
            idusuario : 0 
            ,email:''
            ,contrasena:''
            ,nickname:''
            ,nombre:''
            ,apellidos:''
            ,fechanac:''
            ,movil:''
            ,idestatus:0
            ,fechaultimoacc:''
            ,lugarultimoacc:''
            ,fechareg:''
            ,fechamod:''
            ,comentarios:''
            ,idestatususr:0
            ,estatususr:0
        };
        
        $scope.setVarGbl = function(idusuario, nickname, email){
            emailgbl = email;
            idusuariogbl = idusuario;
            nicknamegbl = nickname;
        }
    });
    
    /*Controlador para clientes*/
    webcommerce.controller('ClientesController', function($scope, $http, $window, $rootScope){
        $scope.clienteBsq = {
            idcliente:0
            ,nombre:''
            ,apellidos:''
            ,fechanac:''
            ,email:''
            ,telefono1:''
            ,telefono2:''
            ,calle:''
            ,numext:''
            ,numint:''
            ,delmun:''
            ,estado:''
            ,pais:''
            ,codpost:''
            ,idestatus:0
            ,montototal:0
            ,montoplazo:0
            ,numplazo:0
            ,idtipoprestamo:0
            ,interesprestamo:0
            ,fechaultimoprestamo:''
            ,numprestamos:0
            ,idestatusprestamo:0
            ,idusuario:0
            ,fechareg:''
            ,fechamod:''
            ,estatuscliente:''
            ,estatusprestamos:''
        };
        
        $scope.nuevoCliente = {
            idcliente:0
            ,nombre:''
            ,apellidos:''
            ,fechanac:''
            ,email:''
            ,telefono1:''
            ,telefono2:''
            ,calle:''
            ,numext:''
            ,numint:''
            ,delmun:''
            ,estado:''
            ,pais:''
            ,codpost:''
            ,idestatus:0
            ,montototal:0
            ,montoplazo:0
            ,numplazo:0
            ,idtipoprestamo:0
            ,interesprestamo:0
            ,fechaultimoprestamo:''
            ,numprestamos:0
            ,idestatusprestamo:0
            ,idusuario:0
            ,fechareg:''
            ,fechamod:''
            ,estatuscliente:''
            ,estatusprestamos:''
        };
        
        $scope.listaClientes = [];
        
        $scope.bsqCliente = {
            tipoBsq: 2
            ,filtro: ''
        };
        
        $scope.filtro = '';
        
        /*consulta inicial de clientes*/
        $scope.buscarClientesInit = function(){
            try{
                $http({
                    method:'GET'
                    ,url:'actions/consultaClientes.php?tipoBsq=1&filtro='+idusuariogbl
                }).success(function(data, status, headers, config){
                    try{
                        var salida = JSON.stringify(data);
                        var resp = "";
                        try{
                            resp = eval('('+salida+')');
                        }catch(ex){
                            alert("Excepcion del eval: " + ex);
                        }
                        if((resp.res===1)||(resp.res==="1")){
                            $scope.listaClientes = resp.clientes;
                        }
                    }catch(ex){
                        alert("Excepcion Clientes Controller Success: " + ex.message);
                    }
                }).error(function(data, status, headers, config){
                    try{
                        $scope.error = reason;
                    }catch(ex){
                        alert("Excepcion Clientes Controller Error: " + ex.message);
                    }
                });
            }catch(ex){
                alert("Excepcion Clientes Controller Error General: " + ex.message);
            }
        };
        
        /*consulta por parametros*/
        $scope.buscarClientes = function(){
            try{
                $http({
                    method:'GET'
                ,url:'actions/consultaClientes.php?tipoBsq='+$scope.bsqCliente.tipoBsq+'&filtro='+$scope.bsqCliente.filtro
                }).success(function(data, status, headers, config){
                    try{
                        var salida = JSON.stringify(data);
                        alert(salida);
                        var resp = "";
                        try{
                            resp = eval('('+salida+')');
                        }catch(ex){
                            alert("Excepcion del eval: " + ex);
                        }
                        
                        if((resp.res===1)||(resp.res==="1")){
                            $scope.listaClientes = resp.clientes;
                            console.log(JSON.stringify($scope.listaClientes));
                        }
                    }catch(ex){
                        alert("Excepcion Clientes Controller Success: " + ex.message);
                    }
                }).error(function(data, status, headers, config){
                    try{
                        $scope.error = reason;
                    }catch(ex){
                        alert("Excepcion Clientes Controller Error: " + ex.message);
                    }
                });
            }catch(ex){
                alert("Excepcion Clientes Controller Error General: " + ex.message);
            }
        };
        
        
    });
    
     webcommerce.controller('PrestamosController', function($scope, $http, $window, $rootScope){
         
     });
    
    webcommerce.controller('PagosController', function($scope, $http, $window, $rootScope){
         
     });
    
    webcommerce.controller('EstadisticosController', function($scope, $http, $window, $rootScope){
         
     });
})();