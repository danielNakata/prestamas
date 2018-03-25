/*archivo angular para estas chunches*/
var webcommerce;

(function(){
    webcommerce = angular.module('webcommerce', ['chieffancypants.loadingBar', 'ui.bootstrap.datetimepicker']);
    
    webcommerce.controller('InicioSesionController', function($scope, $http, $window, $rootScope){
        $scope.consulta = {
            txtEmail:''
            ,txtContrasena:''
        };    
        $scope.usuario = {};
        $scope.salida = "";
        
        $scope.iniciarSesion = function(){
            try{
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
    });
    
    /*Controlador para clientes*/
    webcommerce.controller('ClientesController', function(){
        
    });
    
})();