<?php
session_start();
if (isset($_SESSION['session_email'])) {
    // echo "Si existe sesión";
    $email_session = $_SESSION['session_email'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE email = '$email_session'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(fecth_style: PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_session = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }
} else {
    echo "No existe sesión";
    header('Location: ' . $URL . '/login');
}
