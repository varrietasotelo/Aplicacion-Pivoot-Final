<?php 
include('config.php');

$conectar = new mysqli($hostname,$usuario,$password,$db);
if (mysqli_connect_errno()){

    echo "No conectado", mysqli_connect_error();
    exit();
}
?>