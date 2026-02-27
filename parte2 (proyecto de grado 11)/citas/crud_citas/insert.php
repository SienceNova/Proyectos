<?php 

    include("db.php");

    if(isset($_POST["save"])){

        $id = $_GET['id'];
        $name = $_POST['name'];
        $dc = $_POST['dc'];
        $tel = $_POST['tel'];
        $email = $_POST['em'];
        $mot = $_POST['mot'];
        $fecha = $_POST['fecha'];

        $query = "INSERT INTO cita(NOMBRE, DC , TEL, EMAIL, MOT, FECHA) VALUES ('$name','$dc','$tel','$email','$mot','$fecha')";

        $res = mysqli_query($con, $query);



        
        
        $_SESSION["message"] = "cita agendada correctamente";
        header("Location: index.php");
        

    }



?>