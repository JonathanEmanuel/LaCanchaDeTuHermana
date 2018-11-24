<div class="container">
            <form id="frm-TorneosBuscar">
                <div class="col-md-6">
                    <input id="txt-buscar" class="form-control" type="text" placeholder="Buscar...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>      
        <div class=" col-lg-12">
            <table id="tablaTorneos" class="table table-bordered table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Inicia</th>
                    <th>Finaliza</th>
                    <th>Imagen</th>
                    <th class="col-md-1">Editar</th>
                    <th class="col-md-1">Eliminar</th>

                </thead>
                <tbody>
                    <?php
                        // Carga Resgistros en tabla. Agregar Funcionabilidad para mostrar msj Sin registros en el caso que no se obtengan resultados
                        // EN la consulta en la db
                        foreach ($listaTorneo as $key => $torneo) {
                                echo(' <tr data-codigo=' . $torneo['TorneoId'] . ' >');

                                //echo('<td>'.$torneo['TorneoId']. '</td>');
                                echo('<td>'.$torneo['Nombre'] . '</td>');
                                echo('<td>'.$torneo['Inicio'] . '</td>');
                                echo('<td>'.$torneo['Fin'] . '</td>');
                                echo('<td>'.$torneo['FotoURL'] . '</td>');
                                echo('<td>
                                        <button class="btn btn-primary btn-sm" type="button" onclick="abrirTorneo(this);">
                                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </td>');
                                echo('<td>
                                        <button class="btn btn-warning btn-sm" type="button" onclick="bajaTorneo(this);">
                                            <i class="fa fa-times fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </td>');


    
                                echo(' </tr>');
                      
                        }

                    ?>
                </tbody>
            </table>
            </div>
        
    </div>
