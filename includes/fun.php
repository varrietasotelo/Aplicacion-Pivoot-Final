<?php
include('db.php');
/* 
$id = mysqli_real_escape_string($conectar, $_POST['id']);
$nombres= mysqli_real_escape_string($conectar, $_POST['nombres']);
$apellidos= mysqli_real_escape_string($conectar, $_POST['apellidos']);
$correo= mysqli_real_escape_string($conectar, $_POST['correo']);
$celular= mysqli_real_escape_string($conectar, $_POST['celular']);
$tel= mysqli_real_escape_string($conectar, $_POST['telefono']);

    $sql = "UPDATE usuarios SET nombres = '$nombres', apellidos = '$apellidos',email = '$correo', celular = '$celular', telefono = '$tel', WHERE id='$id'";
    $resultado = $conectar-> query($sql);

    header('usuarios.php')*/

$id = mysqli_real_escape_string($conectar, $_POST['id']);

$sql = "SELECT * FROM usuarios WHERE id = '$id' AND activacion = 1";
$resultado = $conectar->query($sql);
if($resultado->num_rows > 0){
    $sql = "UPDATE usuarios SET activacion = 0 WHERE id='$id'";
    $resultado = $conectar-> query($sql);
}else{
    $sql = "UPDATE usuarios SET activacion = 1 WHERE id='$id'";
    $resultado = $conectar-> query($sql);
}

header('location: usuarios.php')








?>