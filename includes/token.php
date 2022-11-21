<?php 
function tokenG($leng=5){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = "";

    for ($i=0; $i < $leng; $i++){
        $token .= $cadena[rand(0,35)];
    }
    return $token;
}

?>