<?php
function conn(){
    $hostname = "localhost";
    $usuariodb = "root";
    $passworddb = "";
    $dbname = "pivoot";

    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}

?>