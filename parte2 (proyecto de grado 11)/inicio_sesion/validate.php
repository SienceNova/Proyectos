<?php   

    $con = mysqli_connect('localhost','root','1234','mindset');

    if(isset($_POST['value'])){

        $user = $_POST['user'];
        $pass = $_POST['pas'];

        $query = "SELECT * FROM personas WHERE usuario = '$user' AND contra = '$pass'";


        $res = mysqli_query($con, $query);

        $filas = mysqli_num_rows($res);

        $resultado  = $con->query($query);


        if($resultado->num_rows > 0){
            
            $quer = "SELECT * FROM personas WHERE usuario = '$user' AND contra = '$pass'";
            $resul = mysqli_query($con, $quer);

            $raw = mysqli_fetch_assoc($resul);


            // se le toman los datos al usuario a partir de los datos ingresados

            $name = $raw['nombre'];
            $apes = $raw['apellidos'];
            $mail = $raw['email'];
            $user = $raw['usuario'];
            $cont= $raw['contra'];
            $telf = $raw['telefono'];
            $id = $raw['id'];
            $cargo = $raw['cargo'];
            
            header("Location: user.php?id=".urldecode($id));
            

            // validacion de si el que entra es el psicologo (fecha: 22/06/2023)

            if($resultado->num_rows > 0 && $cargo == "psicologo"){

                $query3 = "SELECT * FROM personas WHERE usuario = '$user' AND contra = '$pass'";

                $res2 = mysqli_query($con, $query3);

                $riw = mysqli_fetch_assoc($res2);

                $id = $riw['id'];
                $name = $riw['nombre'];

                header("Location: psicology.php?id=".urldecode($id));

            }

            
            
        }    
        
        
         // mensaje de error si no se encuentra al usuario

        else{

            ?>
                
                <?php 

                    include('login.php');

                ?>

                <style>

                    #error{
                        color:red;
                        margin-top: 450px;
                        z-index: 10;
                    }

                </style>

                <h1 id="error">Error en la autenticación!</h1>
                
            <?php

            
        }
    }

  


?>