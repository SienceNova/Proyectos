<?php 

  error_reporting(0);


  // obtencion de datos

  $id = $_GET['id'];
  $con = mysqli_connect('localhost','root','1234','mindset');
  $query = "SELECT * FROM personas WHERE id = '$id'";
  $res = mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($res);
  $dc = $row['dc'];
  $name = $row['nombre'];
  $apes = $row['apellidos'];
  $email = $row['email'];
  $tel = $row['telefono'];
  $query2  = "SELECT fecha FROM fechas";
  $resultado = mysqli_query($con , $query2);
  $fechasDisponibles = array();
  
  while($raw = mysqli_fetch_assoc($resultado)){
    $fechasDisponibles[]= $raw['fecha'];
  }

  if(isset($_POST['value'])){
  
    $dcCita = $_POST['dc'];
    $nameCita = $_POST['name'];
    $telCita = $_POST['tel'];
    $emailCita = $_POST['email'];
    $motCita = $_POST['mot'];
    $fechaCita = $_POST['fecha'];
    $quer = "SELECT * FROM citas WHERE fecha = '$fechaCita'";
    $validate = mysqli_query($con, $quer);
    if(mysqli_num_rows($validate) > 0){ 
      ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <title>Citas</title>
        </head>
        <body>
          <script>
            Swal.fire({
              icon:'error',
              title:'Oops...',
              text: 'esa cita ya esta agendada =/',
              footer: 'intenta con otra'
            });
          </script>
        </body>
        </html>
      <?php
    }else if($fechaCita == null || $fechaCita == " "){
      ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <title>Citas</title>
        </head>
        <body>
          <script>
            Swal.fire({
            
              icon:'error',
              title:'Oops...',
              text: 'esa fecha no es valida',
            
            });
          </script>
        </body>
        </html>
      <?php
    }else{
        $insert = "INSERT INTO citas(NOMBRE, DC, TEL, EMAIL, MOT, fecha) VALUES ('$nameCita','$dcCita','$telCita','$emailCita','$motCita','$fechaCita')";
        $f = mysqli_query($con, $insert);
        echo "<h1>la cita fue ajendada correctamente";
        header("Location: ../inicio_sesion/user.php?id=".urldecode($id));
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="style.css">
  <title>Citas</title>
</head>
<body>

  <!-- formato para pedir la cita -->

  <div class="blob">
    <img src="../imgs/blob4.svg" alt="" width="700" height="700">
  </div>
  <div class="img">
    <img src="../imgs/undraw_medicine_b1ol-removebg-preview (1).png" alt="">
  </div>
  
  <form class="row g-3" action="" method="post">
    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Documento</label>
      <input name="dc" type="text" class="form-control" value="<?php echo $dc; ?>">
    </div>
    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Nombre</label>
      <input name="name" type="text" class="form-control" value="<?php echo $name." ".$apes; ?>" >
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Telefono</label>
      <input name="tel" type="text" class="form-control" id="inputAddress" value="<?php echo $tel; ?>">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" value="<?php echo $email; ?>">
    </div>
    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Motivo</label>
      <input name="mot" type="text" class="form-control" id="inputCity" placeholder="brinda más información =)">
    </div>
    <div class="col-md-4">
      <label for="inputAddress" class="form-label">Fecha</label>
      <select id="inputAddress" class="form-select" name="fecha">
        <?php foreach($fechasDisponibles as $fecha): ?>
          <option value="<?php echo $fecha ?>"><?php echo $fecha;?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-outline-success" name="value">Enviar</button>
    </div>
  </form>

</body>
</html>