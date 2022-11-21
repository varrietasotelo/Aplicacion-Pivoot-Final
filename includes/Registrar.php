<?php
error_reporting(0);
include('db.php');
include "class.phpmailer.php";
include "class.smtp.php";
$nombres= mysqli_real_escape_string($conectar, $_POST['Nombres']);
$apellidos=mysqli_real_escape_string($conectar, $_POST['Apellidos']);
$email=mysqli_real_escape_string($conectar, $_POST['Email']);
$tel= mysqli_real_escape_string($conectar, $_POST['Tel']);
$telf=mysqli_real_escape_string($conectar, $_POST['Telf']);
$rol=mysqli_real_escape_string($conectar, $_POST['Rol']);
$password=mysqli_real_escape_string($conectar, $_POST['Contraseña']);
$encriptada = sha1($password);
$hash = md5(rand(0,1000));
$sqluser = "SELECT id FROM usuarios WHERE email = '$email'";
$resultado = $conectar->query($sqluser);
$filas=$resultado->num_rows;
if($filas > 0){
    $res = "El correo ingresado ya existe";
    $res1 = "Intente nuevamente con otro correo ";
    $class = "danger";

}else{
    $sqlu = "INSERT INTO  usuarios (nombres, apellidos, email, contrasena, celular, telefono, id_cargo, hash_) VALUES ('$nombres', '$apellidos', '$email', '$encriptada', '$tel', '$telf', '$rol', '$hash')";
    $resultadou = $conectar->query($sqlu);
    if($resultadou > 0){
    $asunto = "Verificacion de correo electronico ";
    $mensaje .= "¡Hola " .$nombres . " Para poder acceder a la cuenta verifica tu correo aqui http://localhost/Pivoot/includes/validacion.php?email=".$email."&hash=".$hash."";
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
    $phpmailer->AddAddress($email);
    $phpmailer->FromName = 'Pivoot';
    $phpmailer->Subject = $asunto;
    $phpmailer->Body .= $mensaje;
    $phpmailer->IsHTML(true);
    $phpmailer->Send();
    $res = "Registro Exitoso";
    $res1 = "Debe validar su correo y contraseña para poder ingresar al sistema";
    $class = "success";
    }else{
    $res = "Error al registrarse";
    $res1 = "Hubo un error en el registro intente nuevamente";
    $class = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="Es-es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="../css/registrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>


</head>


<body>
    <nav class="navbar navbar-expand-lg bg-light bg-opacity-50">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="../html/Index.html">
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
                        <a class="nav-link active" aria-current="page" href="../html/Modulos.html">Modulos</a>
                    </li>
                    <li class="navbar-brand me-5">
                        <a class="nav-link active" href="../html/ventajas.html">Ventajas</a>
                    </li>
                    <li class="navbar-brand me-5">
                        <a class="nav-link active" href="../html/ventajas.html">Contacto</a>
                </ul>

                <form class="d-flex">
                    <a class="btn btn-dark me-2 btn-lg border rounded-pill" href="../html/Inicio.html" role="button">Iniciar
                        sesion</a>
                    <a class="btn btn-dark me-2 btn-lg border rounded-pill" href="registrar.html"
                        role="button">Registrarse</a>

                </form>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
    <div class="alert alert-<?php echo "$class"?> alert-dismissible fade show" role="alert">
        <strong> <?php echo "$res" ?> </strong> <?php echo "$res1"?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    
   
        <div class="content">
            <div class="container m-5 ">
                <div class="row">
                    <div class="col-6 p-0 d-flex">
                        <img class="ms-auto" src="../Imagenes/registro.jpeg" alt="Cancha Basquet" height="590vh"
                            width="532vh">
                    </div>
                    <div class="background col-5 px-3 py-3">
                        <h1>Registrar Usuario</h1>
                        <div class="container">
                            <form id="form" class="row g-3" action="../includes/Registrar.php" method="post">
                                <div class="col-6">
                                    <label for="NombreInput" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" name="Nombres" id="NombreInput"
                                        placeholder="Escribe tu Nombre" maxlength="36" required>
                                </div>

                                <div class="col-6">
                                    <label for="ApellidosInput" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="Apellidos" id="ApellidosInput"
                                        placeholder="Escribe tu Apellido" required>
                                </div>

                                <div class="col-12">
                                    <label for="emailInput" class="form-label">Correo Electronico</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="emailInput">@</span>
                                        <input type="email" class="form-control" name="Email" id="emailInput"
                                            placeholder="Por favor digita tu correo" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="inputPass" class="form-label">contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="Contraseña" id="inputPass"
                                            placeholder="Por favor digita tu contraseña" required>
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="addon"><img id="img" src="../Imagenes/visibilidad.png" alt="Ojo" width="20vh"></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="telInput" class="form-label">Telefono Celular</label>
                                    <input type="text" class="form-control" name="Tel" id="telInput"
                                        placeholder="Digita tu telefono celular" required>
                                </div>

                                <div class="col-6">
                                    <label for="codigoInput" class="form-label">Telefono fijo</label>
                                    <input type="text" class="form-control" name="Telf" id="codigoInput"
                                        placeholder="Telefono fijo (Opcional)">
                                </div>

                                <div class="col-12">
                                    <label for="select">Seleccione el rol al que pertenece</label>
                                    <select class="form-select" id="select" name="Rol" required>
                                        <option value="">Seleccione una opcion</option>
                                        <option value="1">Docente</option>
                                        <option value="2">Estudiante</option>
                                        <option value="3">Administrador</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Acepto terminos y condiciones
                                    </label>
                                </div>

                                <div class="d-grid gap-2 col-12">
                                    <button id="liveAlertBtn" type="submit" class="btn btn-primary"> registrate</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function validacion() {
            document.getElementById("form").classList.add("was-validated");
        }
        document.getElementById("boton").onclick = function () {
            validacion();
        }

        var eye = document.getElementById('addon');
        var img = document.getElementById('img')
        var input = document.getElementById('inputPass');
        eye.addEventListener("click", function(){
            if(input.type =="password"){
                input.type = "text";
                img.src = "../Imagenes/visible.png";
            }else{
                input.type ="password";
                img.src = "../Imagenes/visibilidad.png";
            }
            })
    </script>

</body>

</html>

