<?php 

  $con = mysqli_connect('localhost','root','1234','mindset');
  $id = $_GET['id'];
  $query = "SELECT * FROM personas WHERE id = '$id'";
  $res = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($res);
  $name = $row['nombre'];


  if($id == null || $id == ""){
    header("Location: ../principal/index.php");
  }
  
  if(isset($_POST['citas'])){

    header("Location: ../citas/crud_citas/index.php?id=".urldecode($id));
  
  }
  
  if(isset($_POST['regi'])){
  
    header("Location: ../inicio_sesion/crud_registros/index.php?id=".urldecode($id));
  
  }
  
  if(isset($_POST['fechas'])){
  
    header("Location: ./crud_fechas/index.php?id=".urldecode($id));
  
  }
  
  if(isset($_POST['informe'])){
  
    header("Location: ../inicio_sesion/informes.php?id=".urldecode($id));
  
  }

  if(isset($_POST['calendario'])){
    header("Location: ../calendario/Como_Crear_evento_con_Fullcalendar_usando_jQuery_Ajax_Javascript_PHP_Mysql-master/index.php");
  }

?>


<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu de <?php echo $name ?></title>
  <link rel="stylesheet" href="./styles/styles3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
</head>

<body>
  <ul>
    <li><a href="#" ><form action="" method="post"><button name="calendario">Agenda</button></form></a></li>
    <li><a href="#"><form action="" method="post"><button name="citas">Citas</button></form></a></li>
    <li><a href="#"><form action="" method="post"><button name="regi">Registros</button></form></a></li>
    <li><a href="#"><form action="" method="post"><button name="fechas">Fechas</button></form></a></li>
    <li><a href="#"><form action="" method="post"><button name="informe">Informes</button></form></a></li>
  </ul>
</body>

</html>