<?php
include('db.php');
include('token.php');
$email = $_GET['email'];
$token = $_GET['token'];
$password = $_GET['password'];



$sqlu = "UPDATE usuarios SET contrasena = '$token' WHERE email = '$email'";
$resultadou = $conectar->query($sqlu);
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/recuperarcontraseña.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light bg-opacity-50">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="Index.html">
                <img class="varr" src="../Imagenes/favicon.png" alt="Logo" width="300" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <li class="navbar-brand me-5">
                        <a class="nav-link active" aria-current="page" href="Modulos.html">Modulos</a>
                    </li>
                    <li class="navbar-brand me-5">
                        <a class="nav-link active" href="ventajas.html">Ventajas</a>
                    </li>
                    <li class="navbar-brand me-5">
                        <a class="nav-link active" href="contacto.html">Contacto</a>
                </ul>

                <form class="d-flex">
                    <a class="btn btn-dark me-2 btn-lg border rounded-pill" href="Inicio.html" role="button">Iniciar
                        sesion</a>
                    <a class="btn btn-dark me-2 btn-lg border rounded-pill" href="registrar.html" role="button">Registrarse</a>

                </form>
            </div>
        </div>
    </nav>


    <div class="container m-5 ">
        <div class="container ms-5 p-5 d-flex">
            <div class="row mx-auto">
                <div class="varr mx-auto">
                    <h1>Contraseña actualizada</h1>
                    <form class="mt-4" action="../html/Inicio.html">
                        <div class="col-12 mb-3">
                            <label  class="form-label">Su nueva contraseña es:</label>
                            <input class="form-control" type="text" value=<?php echo $password ?> aria-label="readonly input example" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary col-12">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/sweetAlert.js"></script>
</body>

</html>