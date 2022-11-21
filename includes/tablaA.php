<?php
include('db.php');
$sql = "SELECT * FROM usuarios WHERE id_cargo = 3";
$datos = $conectar->query($sql);
if ($datos->num_rows > 0) {
    while ($fila = $datos->fetch_assoc()) {
        if ($fila['id_cargo'] == 3) {
            $rol = "administrador";
        } 
        if($fila['activacion'] == 1){
            $activacion = "Activo";
        }else{
            $activacion = "Inactivo";
        }
        $id = $fila['id'];
        $nombre = $fila['nombres'];
        $apellidos = $fila['apellidos'];
        $email = $fila['email'];
        $celular = $fila['celular'];
        $telefono = $fila['telefono'];

?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $rol ?></td>
            <td><?= $nombre ?></td>
            <td><?= $apellidos ?></td>
            <td><?= $email ?></td>
            <td><?= $celular ?></td>
            <td><?= $telefono ?></td>
            <td><?= $activacion ?></td>

<?php
    }
}

?>