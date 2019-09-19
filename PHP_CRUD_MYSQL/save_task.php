<?php

include("db.php");

if (isset($_POST['save_task'])){
    $nombre=$_POST['NOMBRE_TIPO_PRODUCTO'];
    $descripcion=$_POST['DESCRIPCION_TIPO_PRODUCTO'];
    $query="INSERT INTO tipo_producto(NOMBRE_TIPO_PRODUCTO, DESCRIPCION_TIPO_PRODUCTO) VALUES ('$nombre','$descripcion')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message']='Guardado exitoso';
    $_SESSION['message_type']='success';


    header("Location: index.php");
}
?> 