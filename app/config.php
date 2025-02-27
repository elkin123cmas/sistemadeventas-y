<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemadeventas');

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    //code...
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "La conexión con la base de datos se estableció correctamente";
} catch (PDOException $e) {
    //throw $th;
    echo "Erro al conectar con la base de datos";
}
$URL = "http://localhost:3000/sistemaVentas/";

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d h:i:s');
