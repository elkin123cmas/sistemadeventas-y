<?php

$sql_proveedores = "SELECT * FROM tb_proveedores";
$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$proveedores_datos = $query_proveedores->fetchAll(fecth_style: PDO::FETCH_ASSOC);
