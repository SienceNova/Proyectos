<!--header y conexion-->
<?php include("db.php"); ?>
<?php include("includes/header.php");?>


    <div class="container p-4">
        <div class="row">
            
            <div class="col-md-5">

                <?php 
                
                    if(isset($_SESSION["message"])){
                        
                        ?>  
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?=$_SESSION["message"]?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    
                        session_unset();
                    }

                ?>

                <div class="card card-body">
                    <form action="insert.php" method="POST">
                       
                        <div class="form-group">
                                <input type="text" name="dc"  class="form-control" placeholder="documento">
                            </div>

                            <div class="form-group">
                                <input type="text" name="nombre"  class="form-control" placeholder="nombre">
                            </div>

                            <div class="form-group">
                                <input type="text" name="apellidos" class="form-control" placeholder="apellidos">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email"  class="form-control" placeholder="email">
                            </div>

                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control" placeholder="usuario">
                            </div>

                            <div class="form-group">
                                <input type="text" name="contra"  class="form-control" placeholder="contraseña">
                            </div>

                            <div class="form-group">
                                <input type="text" name="telefono"class="form-control" placeholder="telefono">
                            </div>

                            <div class="form-group">
                                <select name="cargo" id="">
                                    <option value="psicologo">Psicologo</option>
                                    <option value="estudiante">Estudiante</option>
                                    <option value="docente">Docente</option>
                                </select>
                            </div>


                        <button type="submit" class="btn btn-success" name="send">insertar</button>

                        
                        
                    </form>
                </div>

            </div>
        
            
            <div class="col-md-8">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>documento</th>
                            <th>nombre</th>
                            <th>apellidos</th>
                            <th>correo</th>
                            <th>usuario</th>
                            <th>contraseña</th>
                            <th>telefono</th>
                            <th>cargo</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            $query = "SELECT * FROM personas";
                            $res = mysqli_query($con, $query);

                            while($row = mysqli_fetch_array($res)){

                                ?>

                                    <tr>
                                        <td><?php echo $row['dc']?></td>
                                        <td><?php echo $row['nombre']?></td>
                                        <td><?php echo $row['apellidos']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['usuario']?></td>
                                        <td><?php echo $row['contra']?></td>
                                        <td><?php echo $row['telefono']?></td>
                                        <td><?php echo $row['cargo']?></td>
                                        <td>

                                            <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']?>">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                            <br>
                                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>">
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
