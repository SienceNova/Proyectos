<?php 
    include("db.php");

    if(isset($_POST["save"])){

        $name = $_POST["name"];
        $dc =  $_POST["dc"];
        $tel = $_POST["tel"];
        $em = $_POST["em"];
        $mot = $_POST["mot"];

        $query = "INSERT INTO citas(NOMBRE, DC, TEL, EMAIL, MOT) VALUES ('$name','$dc','$tel','$em','$mot')";
        $res = mysqli_query($con,$query);


        $_SESSION["message"] = "Guardado correctamente";
        $_SESSION["message_type"] = "success";

        header("Location: index.php");

    }

?>