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
                alert('Los password no coinciden');

            }



        } else {
            alert('Completar todos los campos por favor');
        }
    });

    // MODAL TORNEO CERRAR
    $('#btnModalTorneoCerrar').click(function(){
        vaciarFormulario($('#frmTorneo'));  // En utilidades.js
        $('#modalTorneo').modal('hide');
    });

});