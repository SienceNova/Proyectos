<?php

    include("db.php");

    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $query = "SELECT * FROM personas WHERE ID = $id";
        $res = mysqli_query($con, $query);

        if(mysqli_num_rows($res) == 1){
            
            $row = mysqli_fetch_array($res);
            $dc = $row['dc'];
            $name = $row['nombre'];
            $apes = $row['apellidos'];
            $email = $row['email'];
            $user = $row['usuario'];
            $pas = $row['contra'];
            $tel = $row['telefono'];
            $carg = $row['cargo'];

        }

    }


    if(isset($_POST["value"])){

        $id = $_GET["id"];
        $dc = $_POST['dc'];
        $name = $_POST['nombre'];
        $apes = $_POST['apellidos'];
        $email = $_POST['email'];
        $user = $_POST['usuario'];
        $pas = $_POST['contra'];
        $tel = $_POST['telefono'];
        $carg = $_POST['cargo'];


        $query = "UPDATE personas set dc = '$dc', nombre = '$name', apellidos = '$apes', email = '$email', usuario = '$user', contra = '$pas',telefono = '$tel', cargo = '$carg' WHERE id = $id";
        mysqli_query($con, $query);

        
        $_SESSION["message"] = "datos actualizados correctamente";
        header("Location: index.php");
    }
    

?>

<?php include("includes/header.php")?>


    <div class="container p-4">

        <div class="row">

            <div class="col-md-5 mx-auto">

                <div class="card card-body">

                    <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">

                        <div class="form-group">
                            <input type="text" name="dc" value="<?php echo $dc; ?>" class="form-control" placeholder="actualiza el documento">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $name; ?>" class="form-control" placeholder="actualiza el nombre">
                        </div>

                        <div class="form-group">
                            <input type="text" name="apellidos" value="<?php echo $apes; ?>" class="form-control" placeholder="actualiza los apellidos">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="actualiza el email">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="usuario" value="<?php echo $user; ?>" class="form-control" placeholder="actualiza el usuario">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="contra" value="<?php echo $pas; ?>" class="form-control" placeholder="actualiza la contraseña">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="telefono" value="<?php echo $tel; ?>" class="form-control" placeholder="actualiza el telefono">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="cargo" value="<?php echo $carg; ?>" class="form-control" placeholder="actualiza el cargo">
                        </div>
                        

                        <button type="submit" class="btn btn-success" name="value">Actualizar</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

<?php include("includes/footer.php")?>