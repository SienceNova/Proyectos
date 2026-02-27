<?php

$con = mysqli_connect('localhost', 'root', '1234', 'mindset');

$dato  = $_GET['id'];


$query = "SELECT * FROM personas WHERE id = '$dato'";

$res = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($res);

$name  = $row['nombre'];


if ($name == null || $name == "") {

  header("Location: ./principal/index.php");

  die();
}


if (isset($_POST['akira'])) {

  header("Location: ../akira/index.php?id=" . urldecode($dato));
}

if (isset($_POST['edit'])) {

  header("Location: edit.php?id=" . urldecode($dato));
}

if (isset($_POST['delete'])) {

  header("Location: delete.php?id=" . urldecode($dato));
}


if (isset($_POST['citas'])) {

  header("Location: ../citas/index.php?id=" . urldecode($dato));
}

if (isset($_POST['verc'])) {

  header("Location: verCitas.php?id=" . urldecode($dato));
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/styles2.css">
  <title>pagina de <?php echo $name ?></title>
</head>

<body>

  <style>
    a {
      text-decoration: none;
      color: black;
    }
  </style>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MindsetMentor</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <form action="" method="post"><button type="submit" class="btn btn-succes">Principal</button></form>
          </li>
          <li class="nav-item">
            <form action="" method="post"><button type="submit" class="btn btn-succes" name="citas">Citas</button></form>
          </li>
          <li class="nav-item">
            <form action="" method="post"><button type="submit" class="btn btn-succes" name="akira">Akira</button></form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Perfil
            </a>
            <ul class="dropdown-menu">
              <li>
                <form action="" method="post"><button type="submit" class="dropdown-item btn btn-succes" name="edit">Editar cuenta</button></form>
              </li>
              <li>
                <form action="" method="post"><button type="submit" class="dropdown-item btn btn-succes" name="delete">Eliminar cuenta</button>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <form action="" method="post"><button type="submit" class="btn btn-succes" name="close"><a href="../principal/index.html">Cerrar sesion</a></button></form>
          </li>
          <li class="nav-item">
            <form action="" method="post"><button type="submit" class="btn btn-succes" name="verc">Citas agendadas</button></form>
          </li>
        </ul>
        <span class="navbar-text">
          <h2>Bienvenido <?php echo $name ?></h2>
        </span>
      </div>
    </div>
  </nav>



  <div class="content">
    <h2>Bienvenido a MindsetMentor, es un placer tenerte aqui <?php echo $name ?>, esperamos que tu experiencia sea
      agradable y que disfrutes mucho el estar aqui.</h2>
  </div>

  <div class="blob">
    <img src="../imgs/blob.png.svg" alt="" height="800" width="800">
  </div>

  <div class="img">
    <img src="../imgs/undraw_Relaxation_re_ohkx-removebg-preview.png" alt="">
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>