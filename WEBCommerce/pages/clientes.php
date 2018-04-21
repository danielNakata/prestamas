<?php
    session_start();
?>
<div class="container" id="divClientes" ng-controller="ClientesController" ng-init="buscarClientesInit(<?php echo $_SESSION['idusuario'] ?>)">
    
    <ul class="nav nav-tabs">
        <li><a data-toggle="tab" href="#listaClientes">Lista</a></li>
        <li><a data-toggle="tab" href="#edicionClientes">Edicion</a></li>
    </ul>
    <div class="tab-content">
        <div id="listaClientes" class="tab-pane fade in active">
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
        <div id="edicionClientes" class="tab-pane fade">
            <form id="formEditaCliente">
                <table class="table">
                    <tr>
                        <td>
                            ID Cliente:
                        </td>
                        <td>
                            <input id="txtIdCliente" name="txtIdCliente" ng-model="nuevoCliente.idcliente" disabled="disable" value="{{nuevoCliente.idcliente}}" placeholder="Id Cliente..." />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
    
</div>
