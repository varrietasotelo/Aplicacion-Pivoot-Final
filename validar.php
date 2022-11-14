<?php

$usuario=$_POST['Usuario'];
$contraseña=$_POST['password'];

function conn(){
    $hostname = "localhost";
    $usuariodb = "root";
    $passworddb = "";
    $dbname = "pivoot";

    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}


$_SESSION['Usuario']=$usuario;


$consulta="SELECT*FROM usuarios where email = '$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conectar,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas) {
    header("location:dashboard.html");
}else{
    ?>
    <?php
    include("inicio.html");
    ?>
    <h1>Error<h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);





?>