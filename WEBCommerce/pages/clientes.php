<?php
    session_start();
?>
<div class="container" id="divClientes" ng-controller="ClientesController" ng-init="buscarClientesInit(<?php echo $_SESSION['idusuario'] ?>)">
    <table class="table">
        <tr>
            <td style="width: 70%;">
                <input type="text" class="form-control" name="txtBsqCliente" id="txtBsqCliente" ng-model="filtro" style="width:90%;" placeholder="Buscar Cliente..." />
            </td>
            <td style="width: 30%;">
                <button type="button" class="btn btn-primary" value="Buscar" title="Buscar" href ng-click="buscarClientesInit(<?php echo $_SESSION['idusuario'] ?>)">Buscar
                </button>
            </td>
        </tr>
    </table>
    
    <table class="table table-hover" style="text-size=9">
        <tr>
            <th style="text-align: center">
                ID
            </th>
            <th style="text-align: center">
                Cliente
            </th>
            <th style="text-align: center">
                Email
            </th>
            <th style="text-align: center">
                Telefonos
            </th>
            <th style="text-align: center">
                Direccion
            </th>
            <th style="text-align: center">
                Estatus
            </th>
        </tr>
        <tr ng-repeat="cliente in listaClientes | filter: {nombre: filtro}: strict  ">
            <td  style="text-align: right">
                {{cliente.idcliente}}
            </td>
            <td   style="text-align: left">
                {{cliente.nombre}} {{cliente.apellidos}}
            </td>
            <td   style="text-align: left">
                {{cliente.email}}
            </td>
            <td   style="text-align: center">
                {{cliente.telefono1}} | {{cliente.telefono2}}
            </td>
            <td   style="text-align: left">
                {{cliente.calle}} {{cliente.numext}} {{cliente.numint}} {{cliente.delmun}} {{cliente.estado}} CP: {{cliente.codpost}}
            </td>
            <td   style="text-align: center">
                {{cliente.estatuscliente}} <br /> {{cliente.estatusprestamos}}
            </td>
        </tr>
    </table>
    
</div>
