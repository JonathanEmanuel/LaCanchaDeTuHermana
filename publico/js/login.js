$(document).ready(function(){

    
    $('input').focus(function(){
        $(this).removeClass('error');
        $('#msgCompleteCampos').hide();
        $('#msgCamposInvalidos').hide();

    })

    $('#frmLogin').submit(function(evento){
        evento.preventDefault();
        console.log('iniciar');
        if( validarForm(this) ) {
            var usuario = $('#txtEmail').val();
            var clave = $('#txtPassword').val();

            $.ajax({
                data: 'email='+usuario+'&clave='+clave,
                type: "POST",
                url: "app/cuenta/ingresar"
            }).done(function( data, textStatus, jqXHR ) {
                if ( console && console.log ) {
                    console.log( "La solicitud se ha completado correctamente." );
                        
                    console.log(data);
                    if(data.success) {    
                        $(location).attr('href','app/index');
    
                    }else {
                        $('#msgCamposInvalidos').show();
                        
                    }
    
    
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                $('#msgCamposInvalidos').show();
                
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
            });
        } else {
            $('#msgCompleteCampos').show();
        }
    });

    function validarForm(formulario){
        $.each( $(formulario).find('input'), function(index, input){
            if( $(input).val().trim() == '' ){
                $(input).addClass('error');
            }
        });
    
        if( $(formulario).find('input').hasClass('error') ){
            return false;
        } else {
            return true;
        }
    }

    function validarCamposLogin() {
        var emailLogin = $("#txtEmail").val();
        var passwordLogin = $("#txtPassword").val();
    
        if( emailLogin != "" && passwordLogin != ""){
            var datos = new Array(emailLogin, passwordLogin);
            
        }else {
            var datos = new Array();
        }
    
        return datos;
    }

});