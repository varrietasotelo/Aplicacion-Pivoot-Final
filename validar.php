<?php
include_once('db.php');
$usuario=$_POST['Usuario'];
$contraseña=$_POST['password'];


$_SESSION['Usuario']=$usuario;

$conectar=conn();
$consulta="SELECT*FROM usuarios where email = '$usuario' and contrasena='$contraseña'";
$resultado=mysqli_query($conectar,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas) {
    header("location:html/dashboard.html");
}else{
    header("location:html/Inicio.html");

}

mysqli_free_result($resultado);
mysqli_close($conectar);

?>