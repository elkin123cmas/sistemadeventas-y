<?php
include('../../config.php');


$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_actual = $_GET['stock_actual'];

// echo $id_compra . "-" . $id_producto . "-" . $cantidad_compra . "-" . $stock_actual;
$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_compras WHERE id_compra=:id_compra");

$sentencia->bindParam('id_compra', $id_compra);

if ($sentencia->execute()) {
    //actualizar el stock desde la compra
    $stock = $stock_actual - $cantidad_compra;

    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto =:id_producto");

    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "La Compra fue eliminada exitosamente";
    $_SESSION['icono'] = "success";
    // header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
<?php
} else {
    $pdo->rollBack();
    // echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/compras/"
    </script>
<?php
}
