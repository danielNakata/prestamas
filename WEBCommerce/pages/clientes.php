<?php
    session_start();
?>
<div class="container" id="divClientes" ng-controller="ClientesController" ng-init="buscarClientesInit(<?php echo $_SESSION['idusuario'] ?>)">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-item nav-link" data-toggle="tab" role="tab" href="#listaClientes">Lista</a></li>
            <li class="nav-item"><a class="nav-item nav-link" data-toggle="tab" role="tab" href="#edicionClientes">Edicion</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div id="listaClientes" class="tab-pane fade in active">
                <table class="table">
                    <tr>
                        <td style="width: 70%;">
                            <input type="text" class="form-control" name="txtBsqCliente" id="txtBsqCliente" ng-model="filtro" style="width:90%;" placeholder="Buscar Cliente..." />
                        </td>
                        <td style="width: 30%;">
                            <button type="button" class="btn btn-primary" value="Buscar" title="Buscar" href ng-click="buscarClientesInit()">Buscar
                            </button>
                        </td>
                    </tr>
                </table>

                <table class="table table-hover">
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
                        <th style="text-align: center">
                            Acciones
                        </th>
                    </tr>
                    <tr ng-repeat="cliente in listaClientes | filter: {nombre: filtro}: strict  ">
                        <td  style="text-align: right; font-size: 13px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                {{cliente.idcliente}}
                            </a>
                        </td>
                        <td   style="text-align: left; font-size: 13px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                {{cliente.nombre}} {{cliente.apellidos}}
                            </a>
                        </td>
                        <td   style="text-align: left; font-size: 13px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                {{cliente.email}}
                            </a>
                        </td>
                        <td   style="text-align: left; font-size: 13px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                Casa: {{cliente.telefono1}}<br /> Celular: {{cliente.telefono2}}
                            </a>
                        </td>
                        <td   style="text-align: left; font-size: 13px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                {{cliente.calle}} {{cliente.numext}} {{cliente.numint}} {{cliente.delmun}}<br/>{{cliente.estado}} CP: {{cliente.codpost}}
                            </a>
                        </td>
                        <td   style="text-align: center; font-size: 12px;">
                            <a href ng-click="seleccionaCliente(cliente)">
                                {{cliente.estatuscliente}} <br /> {{cliente.estatusprestamos}}
                            </a>
                        </td>
                        <td   style="text-align: center; font-size: 12px;">
                            <button type="button" class="btn btn-success" style="width: 100%" value="Prestamo" title="Realizar Prestamo" href ng-click="buscarClientesInit()">Prestamo
                            </button>
                            <br />
                            <button type="button" class="btn btn-warning" style="width: 100%" value="Pagos" title="Realizar Pago" href ng-click="buscarClientesInit()">Pagos
                            </button>
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
                                <input id="txtIdCliente" class="form-control input-sm" name="txtIdCliente" ng-model="nuevoCliente.idcliente" disabled="disable" value="{{nuevoCliente.idcliente}}" placeholder="Id Cliente..." />
                            </td>
                            <td>
                                <button type="button" value="Guardar" title="Guardar Cliente" href ng-click="guardarCliente()" class="btn btn-primary">
                                    Guardar
                                </button>
                                <button type="button" value="Limpiar" title="Limpiar Campos" href ng-click="limpiarCampos()" class="btn btn-secundary">
                                    Limpiar
                                </button>
                                <button type="button" value="Eliminar" title="Eliminar Cliente" href ng-click="eliminarCliente()" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre(s):
                            </td>
                            <td>
                                <input id="txtNombreCliente" name="txtNombreCliente" class="form-control input-sm" ng-model="nuevoCliente.nombre" value="{{nuevoCliente.nombre}}" type="text" placeholder="Nombre(s)..." />
                            </td>
                            <td>
                                Apellidos:
                            </td>
                            <td>
                                <input id="txtApellidosCliente" name="txtApellidosCliente" class="form-control input-sm" ng-model="nuevoCliente.apellidos" value="{{nuevoCliente.apellidos}}" type="text" placeholder="Apellido(s)..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Telefono de Casa:
                            </td>
                            <td>
                                <input id="txtTelefono1" name="txtTelefono1" class="form-control input-sm" ng-model="nuevoCliente.telefono1" value="{{nuevoCliente.telefono1}}" placeholder="55 5555 5555" type="tel" />
                            </td>
                            <td>
                                Telefono Celular:
                            </td>
                            <td>
                                <input id="txtTelefono2" name="txtTelefono2" class="form-control input-sm" ng-model="nuevoCliente.telefono2" value="{{nuevoCliente.telefono2}}" placeholder="55 5555 5555" type="tel" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Correo Electronico:
                            </td>
                            <td>
                                <input id="txtEmail" name="txtEmail" class="form-control input-sm" ng-model="nuevoCliente.email" value="{{nuevoCliente.email}}" placeholder="correo electronico" type="email" />
                            </td>
                            <td>
                                Fecha de Nacimiento:
                            </td>
                            <td>
                                <input id="txtFechaNac" name="txtFechaNac" class="form-control input-sm" ng-model="nuevoCliente.fechanac" value="{{nuevoCliente.fechanac}}" placeholder="01/01/1990" type="date" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Calle:
                            </td>
                            <td>
                                <input id="txtCalle" name="txtCalle" class="form-control input-sm" ng-model="nuevoCliente.calle" value="{{nuevoCliente.calle}}" type="text" placeholder="Calle..." />
                            </td>
                            <td>
                                Numero Exterior:
                            </td>
                            <td>
                                <input id="txtNumeroExt" name="txtNumeroExt" class="form-control input-sm" ng-model="nuevoCliente.numext" value="{{nuevoCliente.numext}}" type="text" placeholder="Exterior..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Colonia:
                            </td>
                            <td>
                                <input id="txtColonia" name="txtColonia" class="form-control input-sm" ng-model="nuevoCliente.colonia" value="{{nuevoCliente.colonia}}" type="text" placeholder="Colonia..." />
                            </td>
                            <td>
                                Numero Interior:
                            </td>
                            <td>
                                <input id="txtNumeroInt" name="txtNumeroInt" class="form-control input-sm"  ng-model="nuevoCliente.numint" value="{{nuevoCliente.numint}}" type="text" placeholder="Interior..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Municipio / Delegacion:
                            </td>
                            <td>
                                <input id="txtDelmun" name="txtDelmun" class="form-control input-sm" ng-model="nuevoCliente.delmun" value="{{nuevoCliente.delmun}}" type="text" placeholder="Municipio / Delegacion..." />
                            </td>
                            <td>
                                Estado:
                            </td>
                            <td>
                                <input id="txtEstado" name="txtEstado" class="form-control input-sm" ng-model="nuevoCliente.estado" value="{{nuevoCliente.estado}}" type="text" placeholder="Estado..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Codigo Postal:
                            </td>
                            <td>
                                <input id="txtCodpost" name="txtCodpost" class="form-control input-sm" ng-model="nuevoCliente.codpost" value="{{nuevoCliente.codpost}}" type="text" placeholder="00000" />
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
</div>
