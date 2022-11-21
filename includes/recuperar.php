<?php
error_reporting(0);
include('db.php');
include('token.php');
include "class.phpmailer.php";
include "class.smtp.php";

$email = mysqli_real_escape_string($conectar, $_POST['email']);
$sql = "SELECT id FROM usuarios WHERE email = '$email'";
$resultado = $conectar->query($sql);
$filas = $resultado->num_rows;

if ($filas > 0) {
    $password = tokenG();
    $token = sha1($password);
    $sql = "SELECT id, nombres, email FROM usuarios WHERE email = '$email'";
    $resultado = $conectar->query($sql);
    $row = $resultado->fetch_assoc();
    $destinatario = utf8_decode($row['email']);
    $asunto = "Recuperacion de contraseña Pivoot";
    $mensaje.= "¡Hola " . utf8_decode($row['nombres']) . "! ¿Mala memoria?  Has solicitado restabecer tu contraseña. no te preocupes nos pasa. Genera un nuevo token y no olvides asignar una nueva contraseña aqui:  http://localhost/Pivoot/includes/actualizar.php?email=".$email."&token=".$token."&password=".$password;
    $email_user = 'pivoot.school@gmail.com';
    $email_pass = 'hnrnnljxmerptgry';
    $from_name = 'Escuela de baloncesto pivoot';
    $phpmailer = new PHPMailer();
    $phpmailer->Username =  $email_user;
    $phpmailer->Password = $email_pass;
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->Port = 465;
    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->setFrom($phpmailer->Username, $from_name);
    $phpmailer->AddAddress($destinatario);
    $phpmailer->FromName = 'Pivoot';
    $phpmailer->Subject = $asunto;
    $phpmailer->Body .= $mensaje;
    $phpmailer->IsHTML(true);
    if (!$phpmailer->Send()) {
        $var = "No se ha podido enviar la verificacion intente nuevamente"; 
    } else {
        $var = "Se ha enviado una verificacion a su correo por favor revise su bandeja"; 
    }
} else {
    if ($filas == 0) {
        $var = "Su correo no se encuentra en la bases de datos por favor rectifiquelo y vuelva a escribirlo";
    } else {
        $var = "Error en el sistema por favor vuelvalo a intentar";
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/recuperarcontraseña.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light bg-opacity-50">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="Index.html">
                <img class="varr" src="../Imagenes/favicon.png" alt="Logo" width="300" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                    <a class="btn btn-dark me-2 btn-lg border rounded-pill" href="registrar.html"
                        role="button">Registrars</a>

                </form>
            </div>
        </div>
    </nav>


    <div class="container m-5 ">
        <div class="container ms-5 p-5 d-flex">
            <div class="row mx-auto">
                <div class="varr mx-auto">
                    <h3><?php echo $var ?></h3>
                    <form class="mt-4" action="../html/Index">
                        <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary col-12">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>




</body>

</html>