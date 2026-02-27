<?php   

    include("db.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query = "DELETE FROM fechas WHERE ID = $id";
        $res = mysqli_query($con,$query);

        if(!$res){
            die("algo fallo");
        }

        $_SESSION["message"] = "Fecha eliminada correctamente";
        header("Location: index.php");


    }





?>