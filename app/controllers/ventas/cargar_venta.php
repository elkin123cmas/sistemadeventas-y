<?php

$sql_ventas = "SELECT *, cli.nombre_cliente as nombre_cliente 
FROM tb_ventas as ve INNER JOIN tb_clientes as cli ON cli.id_cliente = ve.id_cliente WHERE ve.id_venta = '$id_venta_get'";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(fecth_style: PDO::FETCH_ASSOC);

foreach ($ventas_datos as $ventas_dato) {
    $nro_venta = $ventas_dato['nro_venta'];
    $id_cliente = $ventas_dato['id_cliente'];
}
