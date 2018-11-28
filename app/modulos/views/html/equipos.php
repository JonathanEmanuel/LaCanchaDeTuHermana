<div id="appEquipos" class="container">
    <div class="row">
        <form id="frm-EquiposBuscar">
            <div class="col-md-6">
                <input id="txt-buscar" class="form-control" type="text" placeholder="Buscar...">
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
            <div class="col-md-4 col-sm-offset-1">
                <select  id="" class="form-control text-uppercase">
                    <option value="0">Selecionar Torneo</option>
                    <?php
                        foreach ($listaTorneo as $key => $torneo) {
                            echo('<option value="'.$torneo['TorneoId'].'"> '.$torneo['Nombre'].'</option>');
                        }
                    ?>
                </select>
            </div>
        </form> 
    </div>

    <div class="col-m-12">
    </div>

    <!-- Modal Equipo -->
    <div class="modal fullscreen-modal fade modal modal-info" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="modalNuevoEquipo" aria-hidden="true" data-backdrop="static" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4 class="modal-title"><i class="fa fa-futbol-o fa-fw fa-lg" aria-hidden="true"></i>Equipo</h4>
            </div>
            <form id="frm-equipo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
                            <label>Toreo</label>
                            <select v-model="equipo.TorneoId" class="form-control text-uppercase">
                                <option value="0">Selecionar Torneo</option>
                                <?php
                                    foreach ($listaTorneo as $key => $torneo) {
                                        echo('<option value="'.$torneo['TorneoId'].'"> '.$torneo['Nombre'].'</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
                            <label>Nombre</label>
                            <input v-model="equipo.Nombre" id="equipoNombre" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label>Escudo</label>
                            <img v-if="equipo.ImagenURL"  v-bind:src="equipo.ImagenURL" class="img-thumbnail"  />
                            <button v-on:click="torneoImagenRemover" v-if="equipo.ImagenURL" id="btn-removerImagen" type="button" class="btn btn-success btn-sm"><i class="fa fa-times"></i></button>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <div id="equipoLogoSubir"></div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12 table tablaEditable">
                        <label>Jugadores</label>
                        <table class=" table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="col-md-3">Apellido</th>
                                    <th class="col-md-3">Nombres</th>
                                    <th class="col-md-1">Nacimiento</th>
                                    <th class="col-md-2">Dni</th>
                                    <th class="col-md-2">Teléfono</th>
                                    <th class="col-md-1 text-center">
                                        <button v-on:click="jugadorAgregarNuevo" class="btn btn-default btn-sm" type="button" ><i class="fa fa-plus" ></i></button >
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(jugador, indexJugador) in jugadores"  v-bind:data-codigo="jugador.JugadorId">
                                    <td><input v-model="jugador.Apellido" type="text" class="form-control text-uppercase"/></td>
                                    <td><input v-model="jugador.Nombre" type="text" class="form-control text-uppercase"/></td>
                                    <td><input v-model="jugador.Nacimiento" type="date" class="form-control text-uppercase"/></td>
                                    <td><input v-model="jugador.Dni" type="text" class="form-control"/></td>
                                    <td><input v-model="jugador.Telefono" type="text" class="form-control "/></td>
                                    <td class="text-center"><button v-on:click="jugadorEliminar(jugador, indexJugador)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-times" ></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button v-on:click="equipoCrear" type="button" class="btn btn-info">Guardar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>

    </div>

    </div>
    <!-- Modal Equipo -->
</div>