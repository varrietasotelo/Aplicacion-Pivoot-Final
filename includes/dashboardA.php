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
  <link rel="stylesheet" href="../css/dashboard.css">

  <!--Bootstrap-->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categoria Junior</title>
</head>

<body>
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
      <div class="cards">
        <div class="card">
          <div class="box">
            <a href="usuarios.php">
              <?php
              include('db.php');
              $sql = "SELECT * FROM usuarios WHERE activacion = 1";
              $datos = $conectar->query($sql);
              $contador = $datos->num_rows;
              ?>
              <h1><?php echo $contador ?> </h1>
              <?php
              ?>
              <h3>usuarios</h3>
            </a>
          </div>
          <div class="icon-case">
            <img src="../Imagenes/director.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="card">
          <div class="box">
            <a href="docente.php">
              <?php
              include('db.php');
              $sql = "SELECT * FROM usuarios WHERE id_cargo = 1 AND activacion = 1";
              $datos = $conectar->query($sql);
              $contador = $datos->num_rows;
              ?>
              <h1><?php echo $contador ?> </h1>
              <?php
              ?>


              <h3>Docentes</h3>
            </a>
          </div>
          <div class="icon-case">
            <img src="../Imagenes/baloncesto.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="card">
          <div class="box">
            <a href="estudiante.php">
              <?php
              include('db.php');
              $sql = "SELECT * FROM usuarios WHERE id_cargo = 2 AND activacion = 1";
              $datos = $conectar->query($sql);
              $contador = $datos->num_rows;
              ?>
              <h1><?php echo $contador ?> </h1>
              <?php
              ?>
              <h3>Estudiantes</h3>
            </a>
          </div>
          <div class="icon-case">
            <img src="../Imagenes/nadar.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="card">
          <div class="box">
            <a href="administrador.php">
              <?php
              include('db.php');
              $sql = "SELECT * FROM usuarios WHERE id_cargo = 3 AND activacion = 1";
              $datos = $conectar->query($sql);
              $contador = $datos->num_rows;
              ?>
              <h1><?php echo $contador ?> </h1>
              <?php
              ?>


              <h3>Administradores</h3>
            </a>
          </div>
          <div class="icon-case">
            <img src="../Imagenes/trofeo.png" alt="" class="img-fluid">
          </div>
        </div>

      </div>
      <div class="content-2">
        <div class="recent-payments">
          <div class="titulo">
            <h2>Usuarios registrados</h2>
            <a href="usuarios.php" class="boton">Todos los Usuarios</a>
          </div>
          <div class="big-table">
            <div class="table-wrapper-scroll-y-grande my-custom-scrollbar-grande ">
              <table class="table table-striped table-warning">
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
                  </tr>
                </thead>
                <tbody>
                  <?php require_once('obtenerO.php') ?>
                </tbody>
              </table>
            </div>
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