<?php  include("conexion_db.php")?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

             <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>
            
            <div class="card card-body">
                <form action="guardar_tarea.php" method="POST">
                    <div class="form-group p-2 ">
                        <input type="text" name="title" class="form-control" placeholder="Nombre de la tarea" autofocus>
                        
                    </div>

                    <div class="form-group p-2 ">
                         <textarea name="description"  rows="2" class="form-control" placeholder="Descripción de la tarea"></textarea>
                    </div>
                    
                    

                    <div class="d-grid gap-2 p-2">

                    <input type="submit" name="save_task" class="btn btn-success btn-block px-5 " value="Registrar">   
                            
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $query = "SELECT * FROM task";
                          $result_tasks = mysqli_query($sconn, $query);    

                             while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>
                                        <a href="editar_tarea.php?id=<?php echo $row['Id']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="eliminar_tarea.php?id=<?php echo $row['Id']?>" class="btn btn-danger">
                                             <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>
        </div>


    </div>
</div>

<?php include("includes/footer.php") ?>