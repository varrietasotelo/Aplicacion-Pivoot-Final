<?php
include('db.php');
$nombres= mysqli_real_escape_string($conectar, $_POST['Nombres']);
$apellidos=mysqli_real_escape_string($conectar, $_POST['Apellidos']);
$email=mysqli_real_escape_string($conectar, $_POST['Email']);
$password=mysqli_real_escape_string($conectar, $_POST['Contraseña']);
$password_encriptada = sha1($password);
$tel= mysqli_real_escape_string($conectar, $_POST['Tel']);
$telf=mysqli_real_escape_string($conectar, $_POST['Telf']);
$rol=mysqli_real_escape_string($conectar, $_POST['Rol']);
$sqluser = "SELECT id FROM usuarios WHERE email = '$email'";
$resultado = $conectar->query($sqluser);
$filas=$resultado->num_rows;
if($filas > 0){
    echo "<script>
    alert('El usuario ya existe');
    widown.location = 'registrar.php';
    </script>";

}else{
    $sqlu = "INSERT INTO  usuarios (nombres, apellidos, email, contrasena, celular, telefono, rol) VALUES ('$nombres', '$apellidos', '$email', '$password', '$tel', '$telf', '$rol')";
    $resultadou = $conectar->query($sqlu);
    if($resultadou > 0){
        echo "<script>
        alert('Registro exitoso');
        window.location = '../html/dashboard.html';
        </script>";
    }else{
        echo "<script>
        alert('Error al registrarse');
        window.location = 'registrar.php';
        </script>";
    }

}



?>