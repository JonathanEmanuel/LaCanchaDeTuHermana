<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (NOMBRE_APP) ?></title>
    <link rel="stylesheet" href="publico/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="publico/lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="publico/css/login.css">

    <script src="publico/lib/jquery-3.3.1.min.js"></script>
    <script src="publico/js/login.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-6">
            <div class="imagenSlide">
                <img class="img-responsive" src="publico/images/alex-sajan-402957-unsplash.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <form id="frmLogin">
                <h4>Iniciar Sesión</h4>
                <input id="txtEmail" class="form-control" type="email">
                <input id="txtPassword" class="form-control" type="password">
                <div id="msgCompleteCampos" class="alert alert-dismissible alert-warning">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <strong>Por favor, complete todos los campos</strong>.
                </div>
                <div id="msgCamposInvalidos" class="alert alert-dismissible alert-danger">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    <strong>Usuario con contraseña invalidos</strong>.
                </div>
                <button id="btnIngresar" class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12" type="submit">Ingresar</button>
                <a href="#"><p>¿Olvidastes tu contraseña?</p></a>
            </form>
        </div>

    </div>
</body>
</html>