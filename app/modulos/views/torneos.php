<div class="container">
        <h4>Torneos</h4>
        <div class=" col-lg-12">

            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                    <?php

                        foreach ($listaTorneo as $torneo) {
                            print_r($torneo);
                        }
    /*                     foreach ($arrEstudiantes as $key => $valor) {
                            $i = $key + 1;
                            echo(' <tr>');

                            echo('<td>'.$i. '</td>');
                            echo('<td>'.$valor . '</td>');

                            echo(' </tr>');

                        } */
                    ?>
                </tbody>
            </table>
            </div>
        
    </div>