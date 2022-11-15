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
    header("location:Modulos.html");
}else{
    ?>
    <?php
    include("registrar.html");
    ?>
    <h1>Error<h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>