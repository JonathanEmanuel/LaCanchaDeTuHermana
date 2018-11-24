<div class="modal fade modal modal-info" id="modalTorneo" tabindex="-1" role="dialog" aria-labelledby="modalTorneo" aria-hidden="true" data-backdrop="static" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4 class="modal-title"><i class="fa fa-trophy fa-fw fa-lg" aria-hidden="true"></i>Toreo</h4>
            </div>
        <form id="frmTorneo" data-codigo="0">

            <div class="modal-body">
                    <div class="col-lg-10 col-md-9 col-sm-8">
                        <div class="col-lg-12 col-md-12">
                            <label>Nombre</label>
                            <input class="form-control nombre" type="text"/>  
                        </div>

                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                            <label>Fecha de Finalización</label>
                            <input id="torneoFechaFin" class="form-control fin" type="text" />
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                            <label>Fecha de Inicio</label>
                            <input id="torneoFechaInicio" class="form-control inicio" type="text" />
                        </div>


                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <label>Logo</label>
                        <img  src="..." alt="..." class="thumbnail logo" data-url="images/logo.jpg">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>Logo</label>
                            <div id="torneoLogoSubir" >
                            </div>
                        </div>
            </div>

            <div class="modal-footer">
                <button id="btnTorneoGuardar" type="button" class="btn btn-primary">Guardar</button>
                <button id="btnModalTorneoCerrar" type="button" class="btn btn-primary">Cerrar</button>
            </div>
        </form>

        </div>

    </div>

</div>