$(document).ready(function() {
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });
    //direccion de los php para procesar informacion 
    var url_reporte2 = "ahorro/tasa_seguridad/cuentas.php";
    //var url_reporte3 = "ahorro/retencio_tasa/guardar.php";
    //var url_reporte4 = "ahorro/retencio_tasa/productos.php";

    /*var url_ = "ahorro/reportes/estadocuenta/ireport/";
    var url_reporte = "ahorro/reportes/estadocuenta/reporte.php";    
    var url_reporte3 = "ahorro/reportes/estadocuenta/imprimir.php";    */
    var cuentas = true;
    
    //$tabla1 = $('#tabla1');
    //$mensaje = $('#sms');
    //$mensaje.hide();
/*--------------------------------------------------------*/
    $('#busca_cliente').click(function() {
        if(cuentas){
            getCuentas();
        }else{
            getCuentas();
        }
    });

    //carga de datos en modal apartir del numero de identidad digitado
    function getCuentas() {
        var c = $('#c_ahorro').val(); //agregado 
        try {
            $.ajax({
                url: url_reporte2,
                type: 'POST',
                dataType: 'JSON',
                //data: null,
                data: { x1: c }, //agregado
                timeout: 5000,
            }).done(function(json) {
                $('#tabla2').bootstrapTable('load', json.cuentas);
            }).fail(function(jqXHR, estado, error) {
                console.log(jqXHR);
            }).always(function() {
                console.log("modal completo...");
                cuentas = false;
                //$('#modal1').modal('show');
            })
            //console.log('x1 ' + estado) //agregado
        } catch (err) {
            alert('Ha ocurrido un problema!');
            console.log(err.message);
        }
    }

    /*$('#getId').click(function(e) {
        var object = $('#tabla2').bootstrapTable('getSelections');
        var cuenta = $.trim(object[0].cuenta);
        var nombre = $.trim(object[0].nombre);
        var p_codigo = $.trim(object[0].p_codigo);
        var codigo = $.trim(object[0].codigo);
        var activo = $.trim(object[0].activo);   
        var asociado = $.trim(object[0].asociado); 
        $('#c_ahorro').val(cuenta);
        $('#n_cliente').val(nombre);
        $('#n_identidad').val(codigo.replace('-', '').replace('-', ''));
        $('#b_activo').val(activo);
        $('#c_aho_prod').val(p_codigo);       
        $('#c_asoc_negocio').val(asociado);
        $('#modal1').modal('hide');
    });*/

    //carga de productos en combobox
    /*function loadProductos() {
        try {
            $.ajax({
                url: url_reporte4,
                type: 'POST',
                dataType: 'JSON',
                data: null,
                timeout: 5000,
            }).done(function(json) {
                $.each(json.productos, function(key, value) {
                    $('#c_aho_prod').append($("<option/>", {
                        value: value.c_aho_prod,
                        text: value.d_aho_prod
                    }));
                });
            }).fail(function(jqXHR, estado, error) {
                console.log(jqXHR);
            }).always(function() {
                console.log("productos completos...");
            })
        } catch (err) {
            alert('Ha ocurrido un problema!');
            console.log(err.message);
        }
    }*/

    /*$('#bn_guardar').click(function(){
        if($('#c_ahorro').val()==""){
            $.notify({
            title: '<strong>Alerta !!</strong>',
            message: 'Llene campos obligatorios. # Cuenta'
            },{
            type: 'success'
            });
            return;
        }
        if($('#c_asoc_negocio').val()==""){
            $.notify({
            title: '<strong>Alerta !!</strong>',
            message: 'Llene campos obligatorios. # Asociado'
            },{
            type: 'success'
            });
            return;
        }
        if($('#n_cliente').val()==""){
            $.notify({
            title: '<strong>Alerta !!</strong>',
            message: 'Llene campos obligatorios. Nombre Cliente'
            },{
            type: 'success'
            });
            return;
        }
        if($('#n_identidad').val()==""){
            $.notify({
            title: '<strong>Alerta !!</strong>',
            message: 'Llene campos obligatorios. # Identidad'
            },{
            type: 'success'
            });
            return;
        }
        if($('#c_excento').val().trim()==""){
            $.notify({
            title: '<strong>Alerta !!</strong>',
            message: 'Llene campos obligatorios. Excento'
            },{
            type: 'success'
            });
            return;
        }
        setCuentas();
    });*/

    /*function setCuentas() {
        var c_ahorro = $('#c_ahorro').val(); //agregado 
        var c_aho_prod = $('#c_aho_prod').val(); //agregado
        var descripcion = $('#descripcion').val(); //agregado        
        var c_excento = $('#c_excento').val(); //agregado
        var c_asoc_negocio = $('#c_asoc_negocio').val(); //agregado  
        try {
            $.ajax({
                url: url_reporte3,
                type: 'POST',
                dataType: 'JSON',
                //data: null,
                data: { c_ahorro: c_ahorro, c_aho_prod:c_aho_prod, descripcion:descripcion, c_excento:c_excento, 
                        c_asoc_negocio:c_asoc_negocio }, //agregado
                //timeout: 5000,
            }).done(function(json) {
                $.notify({
                    title: '<strong>Listo !!</strong>',
                    message: 'Guardo Correctamente.'
                },{
                    type: 'success'
                });
            }).fail(function(jqXHR, estado, error) {
                console.log(jqXHR);
                if(estado=='timeout'){
                    $.notify({
                    title: '<strong>Listo !!</strong>',
                    message: 'Listo.'
                    },{
                    type: 'success'
                    });                 
                    } if(estado=='parsererror'){
                        
                        }else{
                            $.notify({
                                title: '<strong>Error !!</strong>',
                                message: 'Verifica tus datos'
                            },{
                                type: 'danger'
                            });
                        }
            }).always(function() {
                $.notify({
                        title: '<strong>Listo !!</strong>',
                        message: 'Guardo Correctamente.'
                        },{
                        type: 'Success'
                });
                $('#c_ahorro').val("");
                $('#c_asoc_negocio').val("");
                $('#n_cliente').val("");
                $('#n_identidad').val("");
                $('#b_activo').val("");
                $('#c_aho_prod').val("");                       
                $('#c_excento').val("");                       
                $('#descripcion').val("");
            })
        } catch (err) {
            alert('Ha ocurrido un problema!');
            console.log(err.message);
        }
    }*/
/*--------------------------------------------------------*/    
  
    $(function() {
        //loadProductos();
        $("#c_ahorro").valida('1234567890');
    });
});