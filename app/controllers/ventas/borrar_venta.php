<?php
include('../../config.php');


$id_venta = $_GET['id_venta'];

$pdo->beginTransaction();


$sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_venta=:id_venta");
$sentencia->bindParam('id_venta', $id_venta);

if ($sentencia->execute()) {

    $sentencia2 = $pdo->prepare("DELETE FROM tb_carrito WHERE nro_venta=:nro_venta");
    $sentencia2->bindParam('nro_venta', $id_venta);
    $sentencia2->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Venta eliminada correctamente";
    $_SESSION['icono'] = "success";

?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/";
    </script>
<?php
} else {
    echo "Error";
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar la venta";
    $_SESSION['icono'] = "error";
    $pdo->rollBack();

?>

<?php
}
