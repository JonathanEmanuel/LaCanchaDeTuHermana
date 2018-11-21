<div class="container">
        <h4>Torneos</h4>
        <div class=" col-lg-12">
            <table id="tablaTorneos" class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                    <?php
                        // Carga Resgistros en tabla. Agregar Funcionabilidad para mostrar msj Sin registros en el caso que no se obtengan resultados
                        // EN la consulta en la db
                        foreach ($listaTorneo as $key => $torneo) {
                                echo(' <tr>');
    
                                echo('<td>'.$torneo['id']. '</td>');
                                echo('<td>'.$torneo['nombre'] . '</td>');
    
                                echo(' </tr>');
                      
                        }

                    ?>
                </tbody>
            </table>
            </div>
        
    </div>
