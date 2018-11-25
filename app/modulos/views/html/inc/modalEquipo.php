
<div class="modal fade modal modal-info" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="modalNuevoEquipo" aria-hidden="true" data-backdrop="static" style="display: none;">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
            <h4 class="modal-title"><i class="fa fa-users fa-fw fa-lg" aria-hidden="true"></i>Equipo</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                  <label>Toreo</label>
                  <select class="form-control text-uppercase">
                    <option value="0">Selecionar Torneo</option>
                      <?php
                          foreach ($listaTorneo as $key => $torneo) {
                              echo('<option value="'.$torneo['TorneoId'].'"> '.$torneo['Nombre'].'</option>');
                          }
                      ?>
                  </select>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <label>Tipo Equipo</label>
                  <pre class="form-control">Futbol 5</pre>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                    <label>Nombre</label>
                    <input id="equipoNombre" class="form-control" type="text" />
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <label>Escudo</label>
                    <input type="file">
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <label>Jugadores</label>
                <table class="table table-bordered table-responsive col-lg-12">
                  <thead>
                    <th class="col-md-1">#</th>
                    <th class="col-md-3">Apellido</th>
                    <th class="col-md-3">Nombre</th>
                    <th class="col-md-1">Edad</th>
                    <th class="col-md-2">DNI</th>
                    <th class="col-md-1"><button class="btn btn-default btn-sm" type="button" ><i class="fa fa-plus" ></i></button></th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" /></td>
                      <td><input type="text" /></td>
                      <td><input type="text" /></td>
                      <td><input type="text" /></td>
                      <td><input type="text" /></td>


                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</div>

</div>
