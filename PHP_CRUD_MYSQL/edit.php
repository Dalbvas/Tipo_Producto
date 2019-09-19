<?php
include("db.php");


if  (isset($_GET['CODIGO_TIPO_PRODUCTO'])) 
{
  $id = $_GET['CODIGO_TIPO_PRODUCTO'];
  $query = "SELECT * FROM tipo_movimientos WHERE CODIGO_TIPO_PRODUCTO = $id";
  $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['NOMBRE_TIPO_PRODUCTO'];
        $descripcion = $row['DESCRIPCION_TIPO_PRODUCTO'];
    }
}
if (isset($_POST['update'])) {
  $id = $_GET['CODIGO_TIPO_PRODUCTO'];
  $nombre=$_POST['NOMBRE_TIPO_PRODUCTO'];
  $descripcion=$_POST['DESCRIPCION_TIPO_PRODUCTO'];
  $query = "UPDATE tipo_producto set  NOMBRE_MOVIMIENTO = '$nombre', DESCRIPCION_TIPO_PRODUCTO='$despcion' WHERE CODIGO_TIPO_PRODUCTO=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Registo Actualizado';
  $_SESSION['message_type'] = 'info';
  header('Location: index.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?CODIGO_TIPO_PRODUCTO=<?php echo $_GET['CODIGO_TIPO_PRODUCTO']; ?>" method="POST">
        <div class="form-group">
          <input name="CODIGO_TIPO_PRODUCTO" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="NOMBRE_TIPO_PRODUCTO" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>