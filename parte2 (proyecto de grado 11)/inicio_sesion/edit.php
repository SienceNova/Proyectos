<?php  

    $con = mysqli_connect('localhost','root','1234','mindset');


    $id = $_GET['id'];

    $query = "SELECT * FROM personas WHERE id = '$id'";

    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);

    $user = $row['usuario'];
    $pass = $row['contra'];
    

    if(isset($_POST['act'])){

        $usern = $_POST['usera'];
        $passn = $_POST['passa'];



        $sql = "SELECT * FROM personas WHERE usuario = '$usern'";
        $resultado = $con->query($sql);

        if($user == $usern){

            ?>
            
                <style>

                    .error{
                        color:red;
                        transform: translateY(520px);
                        margin-left: 50px;
                    }

                </style>

                <h2 class="error">ese usuario ya es tuyo, escoje otro</h2>

            <?php

        }else if($resultado->num_rows > 0){

            ?>

                <style>
                
                .error{
                    color:red;
                    transform: translateY(520px);
                    margin-left: 50px;
                }

                </style>

                <h2 class="error">ese usuario ya es de otra persona</h2>

            
            
            <?php

        }else{
        
            $actualizar = "UPDATE personas set usuario = '$usern' WHERE id = '$id'";

            $res = mysqli_query($con, $actualizar);

            header("Location: user.php?id=".urldecode($id));

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    
        <style>

            body{
                background: #f6f6f6;
                overflow-y: hidden;
            }

            .blob{
                margin-left: 550px;
                margin-top: -40px;
            }

            .img{
                margin-top: -600px;
                margin-left: 650px;
            }

            form{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin-top: -550px;
                transform: translateX(-300px);
                
            }

            input{
                background: transparent;
                border-width: 0 0 0.1rem;
                border-color: #3ab4f3;
                border-style: solid;
                color: #18171c;
                margin-left: 20px;
                
                font-size: 35px;
                outline: none;
            }

            .msg{
                font-size: 80px;
            }

            .btn{
                width: 250px;
                height: 80px;
            }

            @media screen and (max-width: 768px) {

                body{
                    overflow-x: hidden;
                }

                form{
                    transform: translateX(-10px) translateY(80px);    
                }

            }


        </style>


        <div class="blob">
            <img src="../imgs/blob3.svg" alt="   height="700" width="700">
        </div>

        <div class="img">
            <img src="../imgs/undraw_learning_sketching_nd4f-removebg-preview.png" alt=""width="500" height="500">
        </div>

        
        <form action="" method="post">

            <h2 class="msg">Editar perfil</h2>
            <br>
            <br>
            <input type="text" placeholder="usuario" value="<?php echo $user ?>" name="usera" autofocus required>
            <br>
            <br>
            <input type="text" placeholder="contraseña" value="<?php echo $pass ?>" name="passa" required>
            <br>
            <br>            
            <button type="submit" class="btn btn-outline-success" name="act"><h2>Actualizar<h2></button>

        </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>