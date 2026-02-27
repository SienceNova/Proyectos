<?php

    // conexion base de datos

    $conn = mysqli_connect("localhost", "root", "1234", "mindset") or die("Database Error");
    
    // obtener el texto de enviado por la persona
    
    $getMesg = mysqli_real_escape_string($conn, $_POST['text']);
    
    // filtro de las preguntas, para seleccionar la mas parecida a lo preguntado

    $check_data = "SELECT response FROM akira WHERE ask LIKE '%$getMesg%'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");

    $mesglow = strtolower($getMesg);

    // si la pregunta existe envia la respuesta 

    if (mysqli_num_rows($run_query) > 0) {
        $fetch_data = mysqli_fetch_assoc($run_query);
        $reply = $fetch_data['response'];
        echo $reply;
    
    }

    // sino existe envia mensaje de error permitiedole enviar mensajes a el director del proyecto

    else {
        echo "Lo siento, no tengo respuesta a tu pregunta en este momento. Por favor, espera mientras actualizamos nuestras respuestas o ponte en contacto con el administrador del proyecto. </br><a href='https://wa.me/+573126877562?text=hola+me+gustaria+hacerte+una+pregunta'>Juan Gonzalez</a>";
        $query = "INSERT INTO preg_nores(preg) VALUES ('$getMesg')";
        mysqli_query($conn, $query);

    }
?>
