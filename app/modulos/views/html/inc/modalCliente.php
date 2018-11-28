<div class="modal fade modal modal-info" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalCliente" aria-hidden="true" data-backdrop="static" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4 class="modal-title"><i class="fa fa-pencil fa-fw fa-lg" aria-hidden="true"></i>Agregar nuevo usuario</h4>
            </div>
        <form id="frmCliente">

            <div class="modal-body row">
                    <div class="col-lg-10 col-md-9 col-sm-8">
                        <div class="col-lg-12 col-md-12">
                            <label>Nombres</label>
                            <input class="form-control nombres" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Apellido</label>
                            <input class="form-control apellido" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Email</label>
                            <input class="form-control email" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Telefono</label>
                            <input class="form-control telefono" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Nombre de usuario</label>
                            <input class="form-control usuario" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Password</label>
                            <input class="form-control password-1" type="text"/>  
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label>Repetir Password</label>
                            <input class="form-control password-2" type="text"/>  
                        </div>
                    </div>
            </div>

            <div class="modal-footer row">
                <button id="btnClienteGuardar" type="submit" class="btn btn-primary">Guardar</button>
                <button id="btnModalClienteCerrar" type="button" class="btn btn-primary">Cerrar</button>
            </div>
        </form>

        </div>

    </div>

</div>