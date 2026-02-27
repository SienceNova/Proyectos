<?php 

    include("db.php");

    if(isset($_POST["send"])){

        
        $id = $_GET["id"];
        $dc = $_POST['dc'];
        $name = $_POST['nombre'];
        $apes = $_POST['apellidos'];
        $email = $_POST['email'];
        $user = $_POST['usuario'];
        $pas = $_POST['contra'];
        $tel = $_POST['telefono'];
        $carg = $_POST['cargo'];

        $query = "INSERT INTO personas(dc,nombre,apellidos,email,usuario,contra,telefono,cargo) VALUES ('$dc','$name','$apes','$email','$user','$pas','$tel','$carg' )";

        $res = mysqli_query($con, $query);



        
        
        $_SESSION["message"] = "datos ingresados correctamente";
        header("Location: index.php");
        

    }



?>