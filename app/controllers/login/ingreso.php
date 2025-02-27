<?php
include('../../config.php');

$email = $_POST['email'];
$password_user = $_POST['password_user'];



$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(fecth_style: PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_tabla = $usuario['email'];
    $nombres = $usuario['nombres'];
    echo $password_user_tabla = $usuario['password_user'];
}


// if (password_verify('rasmuslerdorf', $hash)) {
//     echo 'La contraseña es válida!';
// } else {
//     echo 'La contraseña no es válida.';
// }

if (($contador > 0) && (password_verify($password_user, $password_user_tabla))) {
    echo "Datos correctos";
    session_start();
    $_SESSION['session_email'] = $email;
    header('location:' . $URL . 'index.php');
} else {
    echo "Alguno de los datos son incorrectos, intenta nuevamente";
    session_start();
    $_SESSION['mensaje'] = "Alguno de los datos son incorrectos, intenta nuevamente";
    header('Location:' . $URL . '/login');
}
