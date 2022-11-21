<?php
include('db.php');
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
$email = $_GET['email'];
$hash = $_GET['hash'];

$sql = "SELECT id FROM usuarios WHERE email ='$email' and hash_ = '$hash' AND activacion = 0";
$resultado = $conectar->query($sql);
$rows = $resultado->num_rows;


if($rows > 0){
    $sql = "UPDATE usuarios SET activacion = 1 WHERE email='$email'";
    $resultado = $conectar-> query($sql);
    $var = "Su usuario se valido con exito";
}else{
    $var = "El usuario ya se encuentra validado";
}
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
    <link rel="stylesheet" href="../css/recuperarcontraseña.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</head>

<body>
    
    <div class="container m-5 ">
        <div class="container ms-5 p-5 d-flex">
            <div class="row mx-auto">
                <div class="varr mx-auto">
                    <h1><?php echo $var?></h1>
                    <form class="mt-4" action="../html/Inicio.html">
                        <button type="submit" class="btn btn-primary col-12">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


