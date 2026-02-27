<!--header y conexion-->
<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>


<div class="container p-4">
    <div class="row">

        <div class="col-md-5">

            <?php

            if (isset($_SESSION["message"])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION["message"] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php

                session_unset();
            }

            ?>

            <div class="card card-body">
                <form action="insert.php" method="POST">

                    <div class="form-group">
                        <h2>ingrese las fechas disponibles</h2>
                    </div>

                    <br>

                    <div class="form-group">
                        <input name="fecha" type="datetime-local">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-success" name="send">Insertar</button>

                </form>
            </div>

        </div>


        <div class="col-md-8">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>fechas</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM fechas";
                    $res = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($res)) {

                    ?>

                        <tr>
                            <td><?php echo $row['fecha'] ?></td>
                            <td>

                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <br>

                            </td>
                        </tr>

                    <?php

                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</div>



<!--footer-->
<?php include("includes/footer.php"); ?>