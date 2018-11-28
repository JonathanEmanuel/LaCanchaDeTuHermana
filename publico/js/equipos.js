const appEquipos = new Vue({
    el: '#appEquipos',
    data: {
        equipo: {Nombre: '', TorneoId: 0, ImagenURL: '', Jugadores:[]},
        equipos: [],
        jugadores: []
    },
    methods: {
        // Crea un equipo al iniciar y recupera el EquipoId para poder asignarlo a los Jugadores
        equipoCrear: function(){
            console.info('creando equipos....');
            console.log($('#frm-equipo'));
            if(validarFormularioGeneral( $('#frm-equipo') ) ){
                var parametros = {
                    TorneoId: this.equipo.TorneoId,
                    Nombre: this.equipo.Nombre,
                    ImagenURL: this.equipo.ImagenURL,
                };
                this.equipo.Jugadores = this.jugadores;
                this.$http.post('equipos/guardar', this.equipo).then(response => {
                    
                    console.log(response);
                    this.equipos.push({
                        JugadorId: 0,
                        Apellido: '',
                        Nombres: '',
                        Nacimiento: '',
                        Dni: '',
                        Telefono: ''
                    });
                }, response => {
                    console.error("Error");
                    this.ocultarLoading();
    
                });
            } else {
                alert('Complete los campos');
            }

        },
      
        equipoAgregarNuevo: function(){

        },

        // Crear Nuevo jugador y Row en Tabla Equipo
        jugadorAgregarNuevo: function(){
            this.jugadores.push({
                JugadorId: 0,
                Apellido: '',
                Nombre: '',
                Nacimiento: '',
                Dni: '',
                Telefono: ''
            });
        },
        // Elimina un Jugador y de la Tabla Equipo
        jugadorEliminar: function(jugador, indexJugador){
            // Verifica si JugadorId = 0, no esta guardado en la db, por lo tanto solo eliman del modelo y el DOM
            console.info(jugador, indexJugador);
            if(jugador.JugadorId == 0) {
                this.jugadores.splice(indexJugador,1);

            } else {
                this.$http.post('url', parametros).then(response => {
                    console.log(response);
                }, response => {
                    console.error("Error");
                    this.mensajeEstado = 'No se encontraron resultados para la busqueda de ' + this.palabraBuscar ;
                    this.articulos = [];
                    this.ocultarLoading();
    
                });
            }
        },
        // 
        torneoImagenRemover: function(){
            this.equipo.ImagenURL = '';
            $('#equipoLogoSubir').parent().show();

        },
    }
});



$(document).ready(function(){
    // Abre modal Equipo
    $('#btn-nuevo-Equipos').click(function(){
       // appEquipos.equipoCrear();
        $('#modalEquipo').modal('show');
    });

    // Configura UploadFile
    $("#equipoLogoSubir").uploadFile({
        url:"upload",
        fileName:"myfile",
        multiple:false,
        maxFileSize: 2000000,
        acceptFiles:"image/*",
        dragDropStr: "<span><b>Arrastre aqui</b></span>",
        sizeErrorStr: "<span><b class='text-danger'>Supera el maxímo tamaño de Archivos</b></span>",
        cancelStr:"Cancelar",

        multiDragErrorStr: "No esta permitido subir más de una imagén.",
        uploadStr:"Subir imagen",
        onSuccess:function(files,data,xhr,pd){
            var respuesta = JSON.parse( data );
           // console.log( JSON.parse( data ), files);
            appEquipos.equipo.ImagenURL = 'uploads/'+ respuesta[0];
            $('#equipoLogoSubir').parent().hide();
            //$('#btn-removerImagen').show(); 
        },
    })
});
