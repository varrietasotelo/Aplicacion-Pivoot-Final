<?php
include_once('db.php');
$nombres=$_POST['Nombres'];
$apellidos=$_POST['Apellidos'];
$email=$_POST['Email'];
$password=$_POST['Contraseña'];
$tel=$_POST['Tel'];
$telf=$_POST['Telf'];
$rol=$_POST['Rol'];

echo "$nombres, $apellidos, $email, $password, $tel, $telf, $rol";

$conectar=conn();
$sql="INSERT INTO  usuarios (nombres, apellidos, email, contrasena, celular, telefono, rol) VALUES ('$nombres', '$apellidos', '$email', '$password', '$tel', '$telf', '$rol')";
$result = mysqli_query($conectar, $sql) or trigger_error("Query Failed! SQL - Error:" .mysqli_error($conectar), E_USER_ERROR);

echo "$sql";




?>