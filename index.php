<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="../../bootstrap/jquery/jquery.min.js"></script>
    <script src="../../bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-export.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-mobile.js"></script>
    <script src="../../bootstrap/tablabootstrap/tableExport.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-flat-json.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-multiple-sort.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-es-ES.js"></script>
    <script src="../../bootstrap/tablabootstrap/bootstrap-table-toolbar.js"></script>    
    <script src="ahorro/tasa_seguridad/javascript/script.js"></script>        
    <script src="../../jquery/bootstrap-notify.min.js"></script>
    <title>Reporte de Cuentas TS</title>

    <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/tablabootstrap/bootstrap-table.css">    
</head>

<body>
<div class="container-fluid">
    <div class="row-fluid">
    <br>
    <ol class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Cuentas</a></li>
        <li class="active">Reporte de Cuentas TS</li>
    </ol>
    <div class="panel panel-success">
        <div class="panel-heading">
        <h3 class="panel-title">Reporte de Cuenta que Aplica Tasa de Seguridad</h3>
        </div><!--panel heading-->
    <div class="panel-body">

    <div class="col-md-12">   
        <div class="col-md-3"> 
            <div class="form-group">               
                <label for="inputnum_identidad"># Cuenta</label>
                <div class="input-prepend">
                    <div class="input-group"><span class="input-group-addon">
                        <span class="glyphicon glyphicon-check"></span></span>
                        <span class="add-on"><i class="icon-check"></i></span>
                        <input name="c_ahorro" id="c_ahorro" type="number" size="20" class="form-control" placeholder="Ingrese Cuenta de Ahorro">
                    </div>
                </div>
            </div>  
        </div><!--col-md-3-->   
                
        <div class="col-md-3">
        <br>
            <button name="busca_cliente" id="busca_cliente" class="btn btn-success" type="button">Buscar Cliente</button>            
        </div><!--col-md-3-->
    </div><!--col-md-12-->


    <div class="col-sm-12">
        <table id="tabla2" data-check-on-init="true" data-click-to-select="true" data-flat="true" data-toggle="table" data-show-columns="true" data-show-multi-sort="false" data-show-export="true" data-search="true" data-mobile-responsive="true" data-pagination="false"
            data-height="400" data-advanced-search="false" data-id-table="advancedTable" class="table table-striped table-condensed">
            <thead>
                <tr>
                    <!--<th data-field="state" data-radio="true"></th>-->
                    <th data-field="d_agencia" data-sortable="true">AGENCIA</th>
                    <th data-field="f_mov" data-sortable="true">FECHA</th>
                    <th data-field="d_asoc_negocio" data-sortable="true">NOMBRE CLIENTE</th>
                    <th data-field="c_ahorro" data-sortable="true">No. CUENTA</th>
                    <th data-field="monto" data-sortable="true">MONTO RETIRO</th>
                    <th data-field="v_monto_mov" data-sortable="true">MONTO TS</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <!--<div class="col-md-3">
         <br>
         <p align="center">
         <button name="bn_guardar" id="bn_guardar" class="btn btn-success" >Guardar</button>
    <div id="dvLoading"></div>
    </div><!--md1-->

    </div><!--panel-body-->
    </div><!--panel panel-success-->
    </div><!--row-fluid-->

    <!--<div id="modal1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Clientes Ahorros</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tabla2" data-check-on-init="true" data-click-to-select="true" data-flat="true" data-toggle="table" data-show-columns="true" data-show-multi-sort="false" data-show-export="true" data-search="true" data-mobile-responsive="true" data-pagination="false"
                                data-height="400" data-advanced-search="false" data-id-table="advancedTable" class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-radio="true"></th>
                                        <th data-field="cuenta" data-sortable="true">CUENTA</th>
                                        <th data-field="nombre" data-sortable="true">NOMBRE</th>
                                        <th data-field="producto" data-sortable="true">PRODUCTOS</th>
                                        <th data-field="APELLIDOS" data-sortable="true">Apellidos</th>
                                        <th data-field="TELEFONO" data-sortable="true">Telefono</th>
                                        <th data-field="MOVIL" data-sortable="true">Movil</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button id="getId" type="button" class="btn btn-success">Seleccionar</button>
                </div>
            </div>
        </div>
    </div><!--modal1-->
</div><!--container-fluid-->
</body>
</html>