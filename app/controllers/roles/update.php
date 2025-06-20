<?php
include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];



$sentencia = $pdo->prepare("UPDATE tb_roles
         SET rol=:rol,
         fyh_actualizacion=:fyh_actualizacion
          WHERE id_rol =:id_rol");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_rol', $id_rol);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El rol fue actualizado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/roles/');
} else {
    // echo "Error, las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "Error, rol no actualizado";
    $_SESSION['icono'] = "error";

    header('Location:' . $URL . '/roles/update.php?id=' . $id_rol);
}
