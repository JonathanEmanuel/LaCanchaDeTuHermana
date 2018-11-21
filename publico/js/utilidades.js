// Limpia input, textarea, select, pre
function vaciarFormulario(formulario) {
    $(formulario).find('input').val('');
    $(formulario).find('input').removeClass('noValido');

    $(formulario).find('textarea').val('');
    $(formulario).find('textarea').removeClass('noValido');

    $(formulario).find('select').val(0);
    $(formulario).find('select').removeClass('noValido');

    $(formulario).find('pre').text('');

}

// Valida que este completos: inputs, textarea y select que no sea valor = 0
function validarFormularioGeneral(fomulario) {

    var correcto = true;

    fomulario.each(function () {
        // Recorre cada input y verifica que no este vacio
        $(this).find('input').each(function () {
            if ($(this).val() == "") {
                // Para que no valide input del tipo file, eso se hara por jquery con data- dependiendo del formulario
                if ($(this).attr('type') != 'file' && $(this).attr('type') != 'checkbox' ) {
                    $(this).addClass('noValido');
                    eliminarNoValidoFocus(this);
                    correcto = false;
                    console.log(this);

                }


            }
        });

        // Recorre cada textarea y verifica que no este vacio
        $(this).find('textarea').each(function () {
            if ($(this).val() == "") {
                $(this).addClass('noValido');
                eliminarNoValidoFocus(this);
                correcto = false;
            }
        });

        // Recorre cada select y verifica que val no sea cero
        $(this).find('select').each(function () {
            if ($(this).val() == 0) {
                $(this).addClass('noValido');
                eliminarNoValidoFocus(this);
                correcto = false;
            }
        });

    });

    return correcto;

}

// Remover clase .noValido en inputs
function eliminarNoValidoFocus(obj) {
    $(obj).focus(function () {
        $(this).removeClass('noValido');
    });
}

// Agrega Row a una tabla
function insertarRow(tabla, row){
    // Crea Row HTML

}