<?php
include('../../config.php');

try {
    $pdo->beginTransaction();

    // Obtener datos del formulario
    $nro_venta = $_GET['nro_venta'];
    $id_cliente = $_GET['id_cliente'];
    $total_a_cancelar = $_GET['total_a_cancelar'];

    // Eliminar formato de moneda y convertir a número decimal
    $total_a_cancelar = str_replace(['$', '.', ','], '', $total_a_cancelar);
    $total_a_cancelar = trim($total_a_cancelar);
    $total_a_cancelar = (float)$total_a_cancelar; // Convertir a decimal





    // Insertar datos en la base de datos
    $sentencia = $pdo->prepare("INSERT INTO tb_ventas (nro_venta, id_cliente, total_pagado, fyh_creacion) 
                                VALUES (:nro_venta, :id_cliente, :total_pagado, :fyh_creacion)");

    $sentencia->bindParam(':nro_venta', $nro_venta);
    $sentencia->bindParam(':id_cliente', $id_cliente);
    $sentencia->bindParam(':total_pagado', $total_a_cancelar);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);

    if ($sentencia->execute()) {
        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "La Venta fue registrada exitosamente";
        $_SESSION['icono'] = "success";
?>
        <script>
            location.href = "<?php echo $URL; ?>/ventas";
        </script>
    <?php
    } else {
        throw new Exception("Error al ejecutar la consulta.");
    }
} catch (Exception $e) {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
<?php
}
?>