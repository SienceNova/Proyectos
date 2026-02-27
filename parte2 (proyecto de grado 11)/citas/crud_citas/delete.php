<?php   

    include("db.php");

    if(isset($_GET["id"])){
        
        $id = $_GET["id"];
        
        $query = "DELETE FROM citas WHERE ID = $id";
        
        $res = mysqli_query($con,$query);

        if(!$res){

            die("algo fallo");
        
        }

        $_SESSION["message"] = "datos eliminados correctamente";
        
        header("Location: index.php");


    }

?>