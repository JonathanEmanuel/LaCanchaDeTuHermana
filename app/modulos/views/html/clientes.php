<div class="container">
        <h4>Clientes</h4>
        <div class=" col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Perfil Usuario</th>
                </thead>
                <tbody>
                    <?php
                        // Carga Resgistros en tabla. Agregar Funcionabilidad para mostrar msj Sin registros en el caso que no se obtengan resultados
                        // EN la consulta en la db
                        foreach ($listaClientes as $cliente) {
                                echo(' <tr>');
    
                                echo('<td>'.$cliente['Nombres'] . '</td>');
                                echo('<td>'.$cliente['Apellido'] . '</td>');
                                echo('<td>'.$cliente['Email'] . '</td>');
                                echo('<td>'.$cliente['Descripcion'] . '</td>');
    
                                echo(' </tr>');
                      
                        }

                    ?>
                </tbody>
            </table>
            </div>
        
    </div>
