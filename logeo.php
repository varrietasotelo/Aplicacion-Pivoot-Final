<?php
include_once('db.php');
$usuario=$_POST['Usuario'];


$conectar=conn();
$consulta="SELECT*FROM usuarios where email = '$usuario'";
$resultado=mysqli_query($conectar,$consulta);



$filas=mysqli_num_rows($resultado);

if ($filas) {
    while($fila = mysqli_fetch_array( $resultado )){
        echo $fila['nombres'];
        echo $fila['apellidos'];
    }
}


mysqli_free_result($resultado);
mysqli_close($conectar);

?>