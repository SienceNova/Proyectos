<?php  

    $con = mysqli_connect("localhost", "root", "1234", "mindset");

    if(isset($_POST["value"])){

        $name = $_POST["name"];
        $dc  = $_POST["dc"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $mot = $_POST["mot"];

        $query  = "INSERT INTO citas(NOMBRE, DC, TEL, EMAIL, MOT) VALUES ('$name', '$dc', '$tel', '$email', '$mot')";

        mysqli_query($con, $query);

    }


    echo "<h1>datos enviados correctamente";
    echo "<h2>enviaremos los datos de la cita lo antes posible al correo: {$email} o al numero +57{$tel}";

?>