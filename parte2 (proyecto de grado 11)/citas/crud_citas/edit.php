<?php

    include("db.php");

    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $query = "SELECT * FROM citas WHERE ID = $id";
        $res = mysqli_query($con, $query);

        if(mysqli_num_rows($res) == 1){
            
            $row = mysqli_fetch_array($res);
            $name = $row['NOMBRE'];
            $dc = $row['DC'];
            $tel = $row['TEL'];
            $email = $row['EMAIL'];
            $mot = $row['MOT'];
            $fecha = $row['fecha'];

        }

    }


    if(isset($_POST["value"])){

        $id = $_GET["id"];
        $name = $_POST["name"];
        $dc = $_POST["dc"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $mot = $_POST["mot"];
        $fecha = $_POST['fechan'];


        $query = "UPDATE citas set NOMBRE = '$name', DC = '$dc',  TEL = '$tel', EMAIL = '$email', MOT = '$mot', fecha = '$fecha' WHERE ID = $id";
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
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="actualiza el nombre">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="dc" value="<?php echo $dc; ?>" class="form-control" placeholder="actualiza el documento">
                        </div>

                        <div class="form-group">
                            <input type="text" name="tel" value="<?php echo $tel; ?>" class="form-control" placeholder="actualiza el telefono">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="actualiza el email">
                        </div>

                        <div class="form-group">
                            <textarea name="mot" class="form-control" placeholder="actualiza el motivo"><?php echo $mot;?></textarea>
                        </div>

                        <div class="form-group">
                            <input type="datetime-local" name="fechan" id="" value="<?php echo $fecha ?>">
                        </div>

                        <button type="submit" class="btn btn-success" name="value">Actualizar</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

<?php include("includes/footer.php")?>