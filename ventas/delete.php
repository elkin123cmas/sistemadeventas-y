<?php
$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['id_venta'];
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/cargar_venta.php');
include('../app/controllers/ventas/cargar_cliente.php');
include('../app/controllers/clientes/listado_de_clientes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de venta nro: <?php echo $nro_venta; ?> ¿ Deseas eliminar esta venta ?</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">

                            <h3 class="card-title"><i class=" fa fa-shopping-bag"></i> Ventas Nro
                                <input type="text" style="text-align: center;" value="<?php echo $nro_venta; ?>" disabled>
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #98D2C0; text-align: center;">Nro</th>
                                            <th style="background-color: #98D2C0; text-align: center;">Producto</th>
                                            <th style="background-color: #98D2C0; text-align: center;">Descripcion</th>
                                            <th style="background-color: #98D2C0; text-align: center;">Cantidad</th>
                                            <th style="background-color: #98D2C0; text-align: center;">Precio Unitario</th>
                                            <th style="background-color: #98D2C0; text-align: center;">Precio SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $contador_de_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $sql_carrito = "SELECT *, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta, pro.stock as stock, pro.id_producto as id_producto FROM tb_carrito as carr INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito DESC";
                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $carrito_datos = $query_carrito->fetchAll(fecth_style: PDO::FETCH_ASSOC);
                                        $contador_de_carrito = 0;
                                        $precio_total  = 0;


                                        foreach ($carrito_datos as $carrito_dato) {
                                            $id_carrito = $carrito_dato['id_carrito'];
                                            $contador_de_carrito = $contador_de_carrito + 1;
                                            // Convertimos 'cantidad' a entero para evitar problemas
                                            $cantidad_total += intval($carrito_dato['cantidad']);

                                            // Convertimos 'precio_venta' a float antes de sumarlo
                                            $precio_unitario_total += floatval($carrito_dato['precio_venta']);

                                        ?>

                                            <tr>
                                                <td>
                                                    <center><?php echo $contador_de_carrito; ?></center>
                                                    <input type="text" value="<?php echo $carrito_dato['id_producto']; ?>" id="id_producto<?php echo $contador_de_carrito; ?>" hidden>
                                                </td>
                                                <td>
                                                    <?php echo $carrito_dato['nombre_producto']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $carrito_dato['descripcion']; ?>
                                                </td>
                                                <td>
                                                    <center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $carrito_dato['cantidad'];  ?></span></center>
                                                    <input type="text" value="<?php echo $carrito_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito; ?>" hidden>

                                                </td>
                                                <td>
                                                    <center>$<?php echo number_format($carrito_dato['precio_venta'], 0, ',', '.'); ?></center>
                                                </td>
                                                <td>
                                                    <center>$<?php
                                                                $cantidad = floatval($carrito_dato['cantidad']);
                                                                $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                $subtotal = $cantidad * $precio_venta;
                                                                echo number_format($subtotal, 0, ',', '.');
                                                                $precio_total = $precio_total + $subtotal;
                                                                ?></center>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <th colspan="3" style="background-color: #98D2C0; text-align: right;">Total:</th>
                                            <th>
                                                <center>
                                                    <?php
                                                    echo number_format($cantidad_total, 0, ',', '.');

                                                    ?>
                                                </center>

                                            </th>
                                            <th>
                                                <center>
                                                    $<?php echo number_format($precio_unitario_total, 0, ',', '.'); ?>
                                                </center>

                                            </th>
                                            <th style="background-color: tan;">
                                                <center>$<?php echo number_format($precio_total, 0, ',', '.'); ?></center>

                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><i class=" fa fa-user-check"></i> Datos del cliente
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->


                            <!--CLIENTES BUSCADOR-->
                            <?php
                            foreach ($clientes_datos as $clientes_dato) {
                                $nombre_cliente = $clientes_dato['nombre_cliente'];
                                $nit_ci_cliente = $clientes_dato['nit_ci_cliente'];
                                $celular_cliente = $clientes_dato['celular_cliente'];
                                $email_cliente = $clientes_dato['email_cliente'];
                            }
                            ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label for="">Nombre del cliente</label>
                                            <input type="text" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nit/CC del cliente</label>
                                            <input type="text" value="<?php echo $nit_ci_cliente; ?>" class="form-control" id="nit_ci_cliente" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular del cliente</label>
                                            <input type="text" value="<?php echo $celular_cliente; ?>" class="form-control" id="celular_cliente" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Email del cliente</label>
                                            <input type="text" value="<?php echo $email_cliente; ?>" class="form-control" id="email_cliente" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class=" fa fa-shopping-basket"></i> Registrar venta
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->


                            <!--CLIENTES BUSCADOR-->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Monto a pagar</label>
                                    <input type="text" id="total_a_cancelar" class="form-control" style="text-align: center; background-color: tan;" value="<?php echo '$' . number_format($precio_total, 0, ',', '.'); ?>" disabled>

                                </div>
                                <div class="form-group">
                                    <button id="btn_borrar_venta" class="btn btn-danger btn-block">Borrar Venta</button>
                                    <div id="btn_borrar_venta"></div>
                                </div>
                                <script>
                                    $('#btn_borrar_venta').click(function() {
                                        var id_venta = '<?php echo $id_venta_get ?>';
                                        var nro_venta = '<?php echo $nro_venta_get ?>';
                                        actualizar_stock().then(() => {
                                            borrar_venta();
                                        });

                                        function actualizar_stock() {
                                            return new Promise((resolve, reject) => {
                                                var n = '<?php echo $contador_de_carrito; ?>';
                                                var requests = []; // Para manejar múltiples peticiones AJAX

                                                for (var i = 1; i <= n; i++) {
                                                    var stock_de_inventario = $('#stock_de_inventario' + i).val();
                                                    var cantidad_carrito = $('#cantidad_carrito' + i).text(); // Asegúrate de que es correcto
                                                    var id_producto = $('#id_producto' + i).val();

                                                    var stock_calculado = parseFloat(stock_de_inventario) + parseFloat(cantidad_carrito);

                                                    var url2 = "../app/controllers/ventas/actualizar_stock.php";
                                                    var request = $.get(url2, {
                                                        id_producto: id_producto,
                                                        stock_calculado: stock_calculado
                                                    });

                                                    requests.push(request);
                                                }

                                                Promise.all(requests).then(resolve).catch(reject);
                                            });
                                        }

                                        function borrar_venta() {
                                            var url = "../app/controllers/ventas/borrar_venta.php";

                                            $.get(url, {
                                                id_venta: id_venta,
                                                nro_venta: nro_venta
                                            }, function(datos) {
                                                $('#btn_borrar_venta').html(datos);
                                            });
                                        }

                                    });
                                </script>




                                <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->





        <!--MODAL PARA AGREGAR UN NUEVO CLIENTE SINO LA HAY EN FORMULARIO -->

        <div class="modal fade" id="modal-agregar_cliente">
            <div class="modal-dialog modal-m">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #CD5C08; color: white">
                        <h4 class="modal-title" style="margin-right: 10px;">Nuevo cliente </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                            <div class="form-group">
                                <label for="">Nombre del cliente</label>
                                <input type="text" name="nombre_cliente" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nit/CC del cliente</label>
                                <input type="number" name="nit_ci_cliente" class="form-control sin-flechas">
                            </div>
                            <div class="form-group">
                                <label for="">Celular del cliente</label>
                                <input type="text" name="celular_cliente" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email del cliente</label>
                                <input type="email" name="email_cliente" class="form-control">
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning btn-block">Registrar Cliente</button>
                            </div>
                        </form>
                    </div>



                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- /.modal-dialog -->





        <?php
        include('../layout/mensajes.php');
        include('../layout/parte2.php');
        ?>
        <script>
            $(function() {
                $("#example1").DataTable({
                    /* cambio de idiomas de datatable */
                    "pageLength": 5,
                    language: {
                        "emptyTable": "No hay información",
                        "decimal": "",
                        "info": "Mostrando _START_ a _END_ del TOTAL de los Productos",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                        "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Productos",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    /* fin de idiomas */
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    /* Ajuste de botones */

                    /*Fin de ajuste de botones*/
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });

            $(function() {
                $("#example2").DataTable({
                    /* cambio de idiomas de datatable */
                    "pageLength": 5,
                    language: {
                        "emptyTable": "No hay información",
                        "decimal": "",
                        "info": "Mostrando _START_ a _END_ del TOTAL de los Clientes",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
                        "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Clientes",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    /* fin de idiomas */
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    /* Ajuste de botones */

                    /*Fin de ajuste de botones*/
                }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

            });
        </script>