<?php
include('db.php');
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location: ../html/Inicio.html");
}
$iduser = $_SESSION['id_usuario'];

?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/usuarios.css">

    <!--Bootstrap-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria Junior</title>
</head>

<body>
    <!-- Modal modificar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form-->
                    <form action="fun.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Digite el id del usuario que desea modificar</label>
                            <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="text" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Celular</label>
                            <input type="text" name="celular" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Telefono</label>
                            <input type="text" name="telefono" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Desactivacion de usuarios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="fun.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Digite el id del usuario que desea eliminar</label>
                            <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar close">
        <div class="logo-details">
            <i><img src="../Imagenes/LOGUITO.PNG" alt="" class="logo"></i>
            <span class="logo_name">Pivoot</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboardA.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Inicio</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="usuarios.php">Inicio</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="estudiante.php">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Estudiantes</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="estudiante.php">Estudiantes</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="docente.php">
                    <i class='bx bx-history'></i>
                    <span class="link_name">Docentes</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="docente.php">Docentes</a></li>
                </ul>
            </li>
            <li>
                <a href="usuarios.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">usuarios</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="usuarios.php">Usuarios</a></li>
                </ul>
            </li>



            <li>
                <div class="profile-details">
                    <div class="profile-content">

                    </div>
                    <div class="name-job">
                        <div class="profile_name">Nombre Usuarios</div>
                        <div class="job">Estado Usuario</div>
                    </div>
                    <a href="salida.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Aplicacion Pivoot</span>
        </div>

        <div class="content">
            <div class="card" style="width: 185vh;">
                <h5 class="card-header">Lista usuarios</h5>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-dark table-hover table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php require_once('tablaD.php') ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>



    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>

</html>