<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La cancha de tu hermana</title>
    <link rel="stylesheet" href="publico/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="publico/lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="publico/css/login.css">
    <link rel="stylesheet" href="main.css">

    <script src="publico/lib/jquery-3.3.1.min.js"></script>
    <script src="publico/js/login.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row green_background">
            <div class="col-lg-10 col-md-10 col-sm-6">
                <label>Bienvenidos a <i class="fa fa-futbol-o" aria-hidden="true"></i> La Cancha de tu Hermana</label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <a href="index.php">Login</a>
            </div>
        </div>
        <div class="row">
            <p>En este momento se están realizando 
                <?php  
                require_once('app/modulos/models/torneosModel.php');
                $torneos = New Torneos;
                echo $torneos->cantidad();
                ?> torneos.</p>
        </div>

    </div>
</body>
</html>
