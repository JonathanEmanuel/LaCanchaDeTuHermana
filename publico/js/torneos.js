$(document).ready(function(){

    // Abre modal Crear Torneo
    $('#btn-nuevo-Torneos').click(function () {
        console.info('open modal');
        $('#modalTorneo').modal('show');
    });

    // Configura DataTime
    $('#torneoFechaInicio, #torneoFechaFin').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es',
    });


    // Configura UploadFile
    $("#torneoLogoSubir").uploadFile({
        url:"../upload.php",
        fileName:"myfile",
        multiple:false,
        acceptFiles:"image/*",
        dragDropStr: "<span><b>Arrastre aqui</b></span>",
        cancelStr:"Cancelar",

        multiDragErrorStr: "No esta permitido subir más de una imagén.",
        uploadStr:"Subir imagen"

    })

    // GUARDAR TORNEO: Valida formulario con campos completos, Envia al Server y Agrega en Tabla
    $('#btnTorneoGuardar').click(function(){
        var formularioTorneo = $('#frmTorneo');
        if(validarFormularioGeneral(formularioTorneo)) {
            var parametros = {
                nombre: formularioTorneo.find('.nombre').val(),
                inicio: formularioTorneo.find('.inicio').val(),
                fin: formularioTorneo.find('.fin').val(),
                logoUrl: formularioTorneo.find('.logo').attr('data-url')
            };

            console.log(parametros);

            $.ajax({
                url: 'torneos/guardar',
                method: 'POST',
                dataType: 'json',
                // contentType: "application/json",
                data: parametros,
                success: function(datos) {
                    console.info('respuesta', datos);
                    insertarRow($('#tablaTorneos'), parametros, 0); // En utilidades.js
                    // Insrta Botonos
                    $('#tablaTorneos').find('tbody').find('tr:last').append(
                        $('<td>').append( $('<button>', {'class': 'btn btn-primary btn-sm', 'type': 'button', 'onclick':'abrirTorneo(this);'}  )
                            .append ( $('<i>', {'class':'fa fa-pencil fa-fw', 'aria-hidden': 'true'}))
                        
                        )
                    );
                    $('#tablaTorneos').find('tbody').find('tr:last').append(
                        $('<td>').append( $('<button>', {'class': 'btn btn-warning btn-sm', 'type': 'button', 'onclick':'bajaTorneo(this);'}  )
                            .append ( $('<i>', {'class':'fa fa-times fa-fw', 'aria-hidden': 'true'}))
                        
                        )
                    );
                    vaciarFormulario($('#frmTorneo'));  // En utilidades.js

                    $('#modalTorneo').modal('hide');

                },
                error: function(obj, error, objErorr){
                    console.error('Error: ', error);
                }
              });


        } else {
            alert('Completar todos los campos por favor');
        }
    });

    // MODAL TORNEO CERRAR
    $('#btnModalTorneoCerrar').click(function(){
        vaciarFormulario($('#frmTorneo'));  // En utilidades.js
        $('#modalTorneo').modal('hide');
    });
})

// Abre Modal Torneo
function abrirTorneo(btn){
    var torneoId = $(btn).parent().parent().attr('data-codigo');
    var formularioTorneo = $('#frmTorneo');

    console.log(torneoId, btn);

    $('#modalTorneo').modal('show');
    vaciarFormulario(formularioTorneo);  // En utilidades.js

    
    $.ajax({
        url: 'torneos/cargar/' + torneoId,
        method: 'POST',
        dataType: 'json',
        // contentType: "application/json",
        data: {},
        success: function(datos) {
            console.info('respuesta', datos);
            // Carga Datos del Torneo en el modalTorneo
            formularioTorneo.find('.nombre').val(datos.Nombre);
            formularioTorneo.find('.inicio').val(datos.Inicio);
            formularioTorneo.find('.fin').val(datos.Fin),
            formularioTorneo.find('.logo').attr('data-url', '');


        },
        error: function(obj, error, objErorr){
            console.error('Error: ', error);
        }
      });

}

// Abre modal de confirmacion para dar Baja a Torneo
function bajaTorneo(btn){
    var row = $(btn).parent().parent();
    var torneoId = $(row).attr('data-codigo');

    // Si Codigo Torneo es cero, no esta guardado en DB, por lo tanto elimina solo del DOM
    if ( torneoId != 0){
        $.ajax({
            url: 'torneos/baja/' + torneoId,
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