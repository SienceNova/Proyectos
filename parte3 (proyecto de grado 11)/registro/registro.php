<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    </script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="gallego.css">
    <title>registro</title>
</head>

<body>


    <div id="cont">


        <form action="script.php" method="post">
            <br>
            <center>
                <h2>Registro</h2>
            </center>
            <br>
            <center>
                <input type="text" name="dc" placeholder="Documento" id="c1" minlength="8" maxlength="10" pattern="{0,9}" required autofocus>
                <br>
                <br>
                <input type="text" name="name" placeholder="Nombre" id="c2" minlength="3" maxlength="60" required>
                <br>
                <br>
                <input type="text" name="apes" placeholder="Apellidos" id="c3" minlength="5" maxlength="100" required>
                <br>
                <br>
                <input type="email" name="email" placeholder="Email" id="c3" minlength="5" maxlength="60" required>
                <br>
                <br>
                <input type="text" name="user" placeholder="Nombre de usuario" id="c3" minlength="3" maxlength="60" required>
                <br>
                <br>
                <input type="text" name="pass" placeholder="Contraseña" id="pass" minlength="5" maxlength="60" required>
                <br>
                <br>
                <input type="text" name="tel" placeholder="Telefono" id="c3" minlength="3" maxlength="60" required>
                <br>
                <br>
            </center>
            <center><label>acepto los <a id="terms" href="terminos_condiciones.html">Terminos y condiciones</a></label></center>

            <input type="checkbox" name="key" id="key" required><br>
            <button type="submit" name="value" id="btn">Enviar</button>
            <br>
            <a id="msgf" href="../inicio_sesion/login.php">Ya tienes cuenta? inicia sesion</a>


        </form>

    </div>


    <divc class="sun">
        </div>

</body>

</html>