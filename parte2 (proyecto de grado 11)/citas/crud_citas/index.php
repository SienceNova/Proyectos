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
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="ingrese el nombre de la persona" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="dc" class="form-control" placeholder="documento de la persona">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tel" class="form-control" placeholder="telefono de la persona">
                        </div>
                        <div class="form-group">
                            <input type="email" name="em" class="form-control" placeholder="correo de la persona">
                        </div>
                        <div class="form-group">
                            <textarea name="mot" placeholder="motivo de la cita" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="datetime-local" name="fecha" id="">
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-block" value="guardar" name="save">
                        
                        
                        
                        
                    </form>
                </div>

            </div>
        
            
            <div class="col-md-8">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nombre</th>
                            <th>documento</th>
                            <th>telefono</th>
                            <th>correo</th>
                            <th>motivo</th>
                            <th>fechas</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            $query = "SELECT * FROM citas";
                            $res = mysqli_query($con, $query);

                            while($row = mysqli_fetch_array($res)){

                                ?>

                                    <tr>
                                        <td><?php echo $row['NOMBRE']?></td>
                                        <td><?php echo $row['DC']?></td>
                                        <td><?php echo $row['TEL']?></td>
                                        <td><?php echo $row['EMAIL']?></td>
                                        <td><?php echo $row['MOT']?></td>
                                        <td><?php echo $row['fecha']?></td>
                                        <td>

                                            <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['ID']?>">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                            <br>
                                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['ID']?>">
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
