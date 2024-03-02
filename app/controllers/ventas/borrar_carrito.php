<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 5/3/2023
 * Time: 19:59
 */

include ('../../config.php');

$id_carrito = $_POST['id_carrito'];


//echo $id_compra." - ".$id_producto." - ".$cantidad_compra." - ".$stock_actual;



$sentencia = $pdo->prepare("DELETE FROM tb_carrito WHERE id_carrito=:id_carrito");

$sentencia->bindParam('id_carrito',$id_carrito);

if($sentencia->execute()){

  
  
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}


