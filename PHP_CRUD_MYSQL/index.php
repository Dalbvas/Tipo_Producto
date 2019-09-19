<?php include("db.php")?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-4">
        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?=$_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        
        <?php session_unset();}?>

        <div class="card card-body">
           <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input type="text" name="NOMBRE_TIPO_PRODUCTO" class="form-control"placeholder="Nombre" autofocus>
                </div>
                <div class="form-group">
                <input type="text" name="DESCRIPCION_TIPO_PRODUCTO" class="form-control"placeholder="Descripcion" autofocus>
                </div>
                <input type="submit" class="btn btn-success btn-block"
                name="save_task" value="Guardar">
           </form> 
        </div>
    </div>
    <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CODIGO_TIPO_PRODUCTO</th>
                        <th>NOMBRE_TIPO_PRODUCTO</th>
                        <th>DESCRIPCION_TIPO_PRODUCTO</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query="SELECT * FROM tipo_producto";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['CODIGO_TIPO_PRODUCTO']?></td>
                            <td><?php echo $row['NOMBRE_TIPO_PRODUCTO']?></td>
                            <td><?php echo $row['DESCRIPCION_TIPO_PRODUCTO']?></td>
                            <td>
                                <a href="edit.php?CODIGO_ITPO_PRODUCTO=<?php echo $row['CODIGO_ITPO_PRODUCTO']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?CODIGO_ITPO_PRODUCTO=<?php echo $row['CODIGO_ITPO_PRODUCTO']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            
            </table>
    
    </div>

    </div>
</div>

<?php include("includes/footer.php")?>