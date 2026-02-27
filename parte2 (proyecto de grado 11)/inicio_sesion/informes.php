<?php  

    $con = mysqli_connect('localhost','root','1234','mindset');

    $id = $_GET['id'];

    if($id == null || $id == ""){
        header("Location: /principal/index.php");
    }

    $query = "SELECT * FROM personas WHERE id = $id";

    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);

    $name = $row['nombre'];





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Informes</title>
</head>
<body>

    <div class="img">

        <img src="../imgs/notes.png" alt="">

    </div>

    <div class="menu">

        <img src="../imgs/waves yellow.svg" alt="">

    </div>

    <div class="inform">


        <input type="text" id="title" placeholder="titulo del informe" autofocus>

        <br>

        <textarea name="" id="txt" cols="30" rows="10" placeholder="informe" ></textarea>

        <br>

        <button id="btn" type="button" class="btn btn-outline-warning">Descargar</button>

    </div>


    <script>

        document.getElementById('btn').addEventListener('click' , function(){

            var texto = document.getElementById('txt').value;

            var title = document.getElementById('title').value;

            var blob = new Blob ([texto] , {type: 'text/plain'});

            var download = document.createElement('a');
            download.href = URL.createObjectURL(blob);
            download.download = title +'.doc';

            download.click();


        });

    </script>

</body>
</html>