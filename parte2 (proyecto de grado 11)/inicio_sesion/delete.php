<?php 

    $con = mysqli_connect('localhost','root','1234','mindset');

    $id = $_GET['id'];


    $query = "SELECT * FROM personas WHERE id = '$id'";

    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);

    $id = $row['id'];
    $name = $row['nombre'];


    if(isset($_POST['delete'])){

        $elim = "DELETE FROM personas WHERE id = '$id'";

        $resul = mysqli_query($con, $elim);

        $name = null;
    }

    

    if($name == null || $name == " "){
        
        
        header("Location: /principal/index.php");
    
        die();
    
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Eliminar cuenta de <?php echo $name ?></title>
</head>

<body>

    <style>

        body{
            background: #f6f6f6;
            overflow-y: hidden;
        }

        .btn{
            width: 400px;
            height: 90px;
            margin-left: 450px;
            margin-top: 200px;
        }

        .msg{
            margin-top: -630px;
        }

        .blob{
            margin-left: -600px;
            margin-top: -30px;
        }

        .img{
            margin-top: -600px;
            position: absolute;
            margin-left: 20px;
        }


        @media screen and (max-width: 768px) {
            body{
                overflow-x: hidden;
            }

            .blob{
                visibility: hidden;
            }

            .img{
                visibility: hidden;
            }

            form{
                transform: translateX(-400px);
            }
            .msg{
                transform: translateY(150px);
            }
        
        }

    </style>


    <script>

        Swal.fire({
            icon:'info',
            title:'Estas seguro',
            text: 'esta es la ultima advertencia',
            footer: 'piensa bien si quieres eliminar tu perfil'
        })

    </script>


    <div class="blob">
        <center><img src="../imgs/blob2.svg" alt="" height="700" ></center>
    </div>

    <div class="img">
        <img src="../imgs/undraw_Emails_re_cqen-removebg-preview.png" alt="">
    </div>

    <center><h2 class="msg">Recuerda que todavia puedes arrepentirte</h2></center>


    <center><form action="" method="post">
        <button type="submit" class="btn btn-outline-danger" name="delete"><h2>Eliminar cuenta de <?php echo $name ?><h2></button>
    </form></center>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>