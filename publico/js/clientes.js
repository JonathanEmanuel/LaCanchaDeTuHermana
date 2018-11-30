$(document).ready(function(){

    // Abre modal Crear un Cliente
    $('#btn-nuevo-Clientes').click(function () {
        //var formularioTorneo = $('#frmTorneo');
        // Asinga codio cero, que sera usado para enviar al servidor y sabra si es un Crear o Actualizar
        $('#frmCliente').attr('data-codigo','0');
        $('#modalCliente').modal('show');
    });


        // GUARDA CLIENTE: Valida formulario con campos completos, Envia al Server y Agrega en Tabla (Si ClienteId == 0)
    // En el caso que sea actualizar Cliente (ClienteId != 0) recarga la pagina luego de enviar al Servidor
    $('#frmCliente').submit(function(evento){
        evento.preventDefault();
        
        var frmCliente = $('#frmCliente');
        if(validarFormularioGeneral(frmCliente)) {

            if( frmCliente.find('.password-1').val() == frmCliente.find('.password-2').val()){

                var parametros = {
                    clienteId: frmCliente.attr('data-codigo'),
                    nombres: frmCliente.find('.nombres').val(),
                    apellido: frmCliente.find('.apellido').val(),
                    usuario: frmCliente.find('.usuario').val(),
                    email: frmCliente.find('.email').val(),
                    telefono: frmCliente.find('.telefono').val(),
                    password: frmCliente.find('.password-1').val()
                };
    
                console.log(parametros);
    
                $.ajax({
                    url: 'clientes/guardar',
                    method: 'POST',
                    dataType: 'json',
                    // contentType: "application/json",
                    data: parametros,
                    success: function(datos) {
                        console.info('respuesta', datos);

    
                        $('#modalCliente').modal('hide');
    
                    },
                    error: function(obj, error, objErorr){
                        console.error('Error: ', error);
                    }
                });
    
            } else {
                frmCliente.find('.password-1, .password-2').addClass('noValido');
                eliminarNoValidoFocus(frmCliente.find('.password-1, .password-2'));
               // alert('Los password no coinciden');
                msgBox('Los password no coinciden', 'info');
            }



        } else {
            msgBox('Debe completar todos los campos', 'info');
            
        }
    });

    // MODAL TORNEO CERRAR
    $('#btnModalTorneoCerrar').click(function(){
        vaciarFormulario($('#frmTorneo'));  // En utilidades.js
        $('#modalTorneo').modal('hide');
    });

});

// Baja logica a Cliente
function clienteBaja(btn){
    var clienteId = $(btn).parent().parent().attr('data-codigo');
    var row = $(btn).parent().parent();
    
    // Si Codigo Torneo es cero, no esta guardado en DB, por lo tanto elimina solo del DOM
    if ( clienteId != 0){
        $.ajax({
            url: 'clientes/baja/' + clienteId,
            method: 'POST',
            dataType: 'json',
            // contentType: "application/json",
            data: {},
            success: function(datos) {
                console.info('respuesta', datos);
                // Eliminar Row o recargar pagina
                $(row).remove();
            },
            error: function(obj, error, objErorr){
                console.error('Error: ', error);
            }
          });
    } else {
        $(row).remove();

    }
}

// Edicion Cliente
function clienteAbrir(btn){
    var clienteId = $(btn).parent().parent().attr('data-codigo');
    var formularioCliente = $('#frmCliente');

    console.log(clienteId, btn);

    $('#modalCliente').modal('show');
    vaciarFormulario(formularioCliente);  // En utilidades.js

    
 /*    $.ajax({
        url: 'torneos/cargar/' + clienteId,
        method: 'POST',
        dataType: 'json',
        // contentType: "application/json",
        data: {},
        success: function(datos) {
            console.info('respuesta', datos);
            // Carga Datos del Torneo en el modalTorneo
            formularioTorneo.attr('data-codigo', datos.clienteId);
            formularioTorneo.find('.nombre').val(datos.Nombre);
            formularioTorneo.find('.inicio').val(datos.Inicio);
            formularioTorneo.find('.fin').val(datos.Fin),
            formularioTorneo.find('.logo').attr('data-url', '');


        },
        error: function(obj, error, objErorr){
            console.error('Error: ', error);
        }
      });
 */

}