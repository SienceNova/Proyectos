<?php 

    $con = mysqli_connect('localhost','root','1234','mindset');

    $id = $_GET['id'];

    $query = "SELECT * FROM personas WHERE id = '$id'";

    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);

    $name = $row['nombre'];


    if(isset($_POST['value'])){
        header("Location: ./user.php?id=".urldecode($id));
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
        body{
            overflow-y: hidden;
        }
        .btn{
            font-size: 70px;
            margin-left: 650px;
        }
        form{
            margin-top: 120px;
        }
        .msg{
            margin-top: 110px;
            margin-left: 700px;
            width: 500px;
            border-bottom: 2px solid #3ab4f3;
        }
        .img{
            margin-top: -670px;
        }
        .cont{
            margin-top: -520px;
        }
    </style>
    
    <div class="msg">
        <center><h1><?php echo $name ?>, tu cita se agendo de manera correcta</h1></center>
    </div>
    <center><form action="" method="post">
        <button type="submit" class="btn btn-outline-success" name="value">Entendido</button>
    </form></center>


    <div class="cont">
        <img src="/imgs/blob2.svg" alt="" width="700" height="700">
        <img class="img" src="/imgs/undraw_Agree_re_hor9-removebg-preview (2).png" alt="">
    </div>

</body>
</html>