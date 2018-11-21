<div class="container">
        <h4>Torneos</h4>

        
        <div class=" col-lg-12">
            <table id="tablaTorneos" class="table table-bordered table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Imagen</th>

                </thead>
                <tbody>
                    <?php
                        // Carga Resgistros en tabla. Agregar Funcionabilidad para mostrar msj Sin registros en el caso que no se obtengan resultados
                        // EN la consulta en la db
                        foreach ($listaTorneo as $key => $torneo) {
                                echo(' <tr>');

                                //echo('<td>'.$torneo['TorneoId']. '</td>');
                                echo('<td>'.$torneo['Nombre'] . '</td>');
                                echo('<td>'.$torneo['Inicio'] . '</td>');
                                echo('<td>'.$torneo['Fin'] . '</td>');
                                echo('<td>'.$torneo['FotoURL'] . '</td>');


    
                                echo(' </tr>');
                      
                        }

                    ?>
                </tbody>
            </table>
            </div>
        
    </div>
