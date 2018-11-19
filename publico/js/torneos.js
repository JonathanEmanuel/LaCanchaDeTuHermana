$(document).ready(function(){

    // Abre modal Crear Torneo
    $('#btn-nuevo-Torneos').click(function () {
        console.info('open modal');
        $('#modalTorneo').modal('show');
    });

    // Configura DataTime
    $('#torneoFechaInicio, #torneoFechaFin').datepicker({
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
})
