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
