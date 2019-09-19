<?php
    include("db.php");
    if(isset($_GET['CODIGO_TIPO_PRODUCTO'])){
        $id = $_GET['CODIGO_TIPO_PRODUCTO'];
        $query="DELETE FROM tipo_producto WHERE CODIGO_TIPO_PRODUCTO = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }
        $_SESSION['message']='Dato Eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>