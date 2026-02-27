<?php 

    include("db.php");

    if(isset($_POST["send"])){

        
        $id = $_GET["id"];
        $fecha = $_POST['fecha'];


        $query = "INSERT INTO fechas(fecha) VALUES ('$fecha')";

        $res = mysqli_query($con, $query);



        
        
        $_SESSION["message"] = "Fecha ingresada correctamente";
        header("Location: index.php");
        

    }



?>