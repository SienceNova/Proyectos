<?php  


    $con = mysqli_connect("localhost","root","1234","mindset");

    if(isset($_POST["value"]))

        $dc = $_POST['dc'];
        $name = $_POST['name'];
        $apes = $_POST['apes'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $tel = $_POST['tel'];


        // consultas a las bases de datos

        $sql = "SELECT * FROM personas WHERE usuario = '$user'";
        $sql2 = "SELECT * FROM personas WHERE email = '$email'";
        $sql3 = "SELECT * FROM personas WHERE dc = '$dc'";
        $sql4 = "SELECT * FROM personas WHERE telefono = '$tel'";  

        $resultado = $con->query($sql);
        $resultado2 = $con->query($sql2);
        $resultado3 = $con->query($sql3);
        $resultado4 = $con->query($sql4);
        
        /*estos condicionales se encuentran aqui para evitar datos repetidos en la base
        de datos y asi  no generar conflictos y/o problemas*/

        if($resultado->num_rows > 0){
            
            ?>

                <!--

                    error en el usuario

                -->

                <?php include("registro.php") ?>
            

                <script>

                    Swal.fire({

                        icon:'error',
                        title:'Oops...',
                        text: 'ese usuario ya existe',
                        footer: 'porfavor escoje otro'


                    });

                </script>
            <?php


        }else if($resultado2->num_rows > 0){

            ?>

                <!--

                    correo ya existente

                -->

                <?php include("registro.php") ?>
            

                <script>

                    Swal.fire({

                        icon:'error',
                        title:'Oops...',
                        text: 'ese correo ya existe',
                        footer: 'porfavor utiliza otro'


                    });

                </script>
            <?php
            

        }else if($resultado3->num_rows > 0){

            
            ?>

                <!--

                    documento ya existente

                -->


                <?php include("registro.php") ?>
            

                <script>

                    Swal.fire({

                        icon:'error',
                        title:'Oops...',
                        text: 'este numero de documento ya existe',
                        footer: 'porfavor utiliza otro'


                    });

                </script>
            <?php


        }else if($resultado4->num_rows > 0){

            
            ?>

                <!--

                    numero de telefono ya existente

                -->


                <?php include("registro.php") ?>
            

                <script>

                    Swal.fire({

                        icon:'error',
                        title:'Oops...',
                        text: 'ese numero de telefono ya existe',
                        footer: 'porfavor selecciona otro'


                    });

                </script>
            <?php

        }
        

        //despues de los condiconales si todo es correcto hara la insercion
        
        else{

            $query = "INSERT INTO personas(dc, nombre, apellidos, email, usuario, contra, telefono,cargo) VALUES ('$dc','$name','$apes','$email','$user','$pass','$tel', 'estudiante')";
            $res = mysqli_query($con, $query);

            header("Location: ../inicio_sesion/login.php");

        }

?>