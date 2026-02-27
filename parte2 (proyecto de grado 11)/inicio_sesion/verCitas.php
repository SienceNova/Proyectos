<?php  

    error_reporting(0);

    $con = mysqli_connect('localhost','root','1234','mindset');

    $id = $_GET['id'];

    $query = "SELECT * FROM personas WHERE id = '$id'";

    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);

    $name  = $row['nombre'];

    $dc = $row['dc'];

    $query2 = "SELECT * FROM citas WHERE DC = '$dc'";

    $res2 = mysqli_query($con, $query2);

    $raw = mysqli_fetch_assoc($res2);

    $nameCita = $raw['NOMBRE'];
    
    $fechaCita = $raw['fecha'];


    if($fechaCita == null || $fechaCita == " "){


        ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
                <title>Document</title>
            </head>
            <body>

                <style>

                    body{
                        overflow-y: hidden;
                    }

                    .form{
                        margin-top: -30px;
                        margin-left: -200px;
                    }

                    .img{
                        margin-left: -600px;
                    }

                    .blob{
                        margin-left: -500px
                    }

                    .msg{
                        width:340px;
                        margin-top: -620px;
                        margin-left: 750px;
                        border-bottom: 2px solid #00B0FF;
                        font-size: 55px
                    }

                    .img2{
                        margin-top: 40px;
                        margin-left: 800px;
                    }

                    @media screen and (max-width: 768px) {

                        body{
                            overflow-x: hidden;
                        }

                        .blob{
                            visibility: hidden;
                        }

                        .msg{
                            transform: translateX(-650px);
                        }

                        .img2{
                            transform: translateX(-650px);
                        }

                    }

                    

                </style>
              
                <center><div class="blob">

                    <img class="form" src="../imgs/blob3.svg" alt="" width="700" height="700">
                    <img class="img" src="../imgs/undraw_Location_search_re_ttoj-removebg-preview.png" alt="">

                </div></center>

                <h2 class="msg"><?php echo $name ?>, no tienes ninguna cita pendiente</h2>

                <img class="img2" src="../imgs/x.svg" alt="" width="200" height="200">

            </body>
            </html>
        
        <?php

        die();

    }


    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>




    <style>


        .card{
            margin-left: 500px;
            margin-top: 100px;
        }

        p{
            font-size: 40px;
        }


        @media screen and (max-width: 768px) {

            .card{
                transform: translateX(-380px);
            }

        }


    </style>    

    <br>
    <br>
    <br>

    <center><h1><?php echo $name ?>, tienes una cita agendada para la fecha: </h1></center>        

   <div class="card" style="width: 18rem;">
      <div class="card-body">
            <br>
            <center><p class="card-text"><?php echo $fechaCita ?></p></center>
            <br>
        </div>
    </div>





</body>
</html>