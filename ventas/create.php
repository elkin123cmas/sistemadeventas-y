<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');
// include('../app/controllers/compras/listado_de_compras.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de Ventas</h1>
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php
                            $contador_de_ventas = 0;
                            foreach ($ventas_datos as $ventas_dato) {
                                $contador_de_ventas = $contador_de_ventas + 1;
                            }
                            ?>
                            <h3 class="card-title"><i class=" fa fa-shopping-bag"></i> Ventas Nro
                                <input type="text" style="text-align: center;" value="<?php echo $contador_de_ventas + 1; ?>" disabled>
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
                            <b>Carrito</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto">
                                <i class="fa fa-search"></i>
                                Buscar producto
                            </button>
                            <div class="modal fade" id="modal-buscar_producto">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:rgb(40, 83, 223); color: white">
                                            <h4 class="modal-title">Datos del Producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Seleccionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Codigo</center>
                                                            </th>
                                                            <th>
                                                                <center>Categoria</center>
                                                            </th>
                                                            <th>
                                                                <center>Imagen</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>Descripcion</center>
                                                            </th>
                                                            <th>
                                                                <center>Stock</center>
                                                            </th>
                                                            <th>
                                                                <center>Precio Compra</center>
                                                            </th>
                                                            <th>
                                                                <center>Precio Venta</center>
                                                            </th>
                                                            <th>
                                                                <center>Fecha Ingreso</center>
                                                            </th>
                                                            <th>
                                                                <center>Usuario</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $id_producto = $productos_dato['id_producto']
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?></td>
                                                                <td>
                                                                    <button href="" class="btn btn-info" id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto; ?>').click(function() {
                                                                            var id_producto = "<?php echo $id_producto; ?>";
                                                                            $('#id_producto').val(id_producto);

                                                                            var producto = "<?php echo $productos_dato['nombre']; ?>";
                                                                            $('#producto').val(producto);

                                                                            var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                            $('#descripcion').val(descripcion);

                                                                            var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                            $('#precio_venta').val(precio_venta);

                                                                            $('#cantidad').focus();

                                                                            // $('#modal-buscar_producto').modal('toggle');
                                                                        })
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['codigo']; ?></td>
                                                                <td><?php echo $productos_dato['categoria']; ?></td>
                                                                <td>
                                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $productos_dato['imagen']; ?>" alt="Imagen" width="100px">
                                                                </td>
                                                                <td><?php echo $productos_dato['nombre']; ?></td>
                                                                <td><?php echo $productos_dato['descripcion']; ?></td>
                                                                <td><?php echo $productos_dato['stock']; ?></td>

                                                                <td><?php echo $productos_dato['precio_compra']; ?></td>
                                                                <td><?php echo $productos_dato['precio_venta']; ?></td>
                                                                <td><?php echo $productos_dato['fecha_ingreso']; ?></td>
                                                                <td><?php echo $productos_dato['email']; ?></td>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>


                                                </table>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" id="id_producto" hidden>
                                                            <label for="">Producto</label>
                                                            <input type="text" id="producto" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Descripcion</label>
                                                            <input type="text" id="descripcion" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Cantidad</label>
                                                            <input type="text" id="cantidad" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio Unitario</label>
                                                            <input type="text" id="precio_venta" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" style="float:right;" id="btn_registrar_carrito">Registrar</button>
                                                <div id="respuesta_carrito"></div>
                                                <script>
                                                    $('#btn_registrar_carrito').click(function() {
                                                        var nro_venta = '<?php echo $contador_de_ventas + 1; ?>'
                                                        var id_producto = $('#id_producto').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_producto == "") {
                                                            alert('Los campos no pueden estar vacíos');
                                                        } else if (cantidad == '') {
                                                            alert('Los campos cantidad no pueden estar vacíos');

                                                        } else {
                                                            var url = "../app/controllers/ventas/registrar_carrito.php";
                                                            $.get(url, {
                                                                nro_venta: nro_venta,
                                                                id_producto: id_producto,
                                                                cantidad: cantidad

                                                            }, function(datos) {
                                                                // alert("fue al controlador");
                                                                $('#respuesta_carrito').html(datos);
                                                            });
                                                        }
                                                    })
                                                </script>
                                                <br><br>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <br><br>
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
                                        <th style="background-color: #98D2C0; text-align: center;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $contador_de_carrito = 0;
                                    $cantidad_total = 0;
                                    $precio_unitario_total = 0;
                                    $nro_venta = $contador_de_ventas + 1;
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
                                            <td>
                                                <center>
                                                    <form action="../app/controllers/ventas/borrar_carrito.php" method="POST">

                                                        <input type="text" name="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Borrar</i></button>
                                                    </form>
                                                </center>
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
                    <div class="card card-outline card-primary">
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
                        <div class="card-body">
                            <b>Clientes</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_cliente">
                                <i class="fa fa-search"></i>
                                Buscar cliente
                            </button>
                            <div class="modal fade" id="modal-buscar_cliente">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:rgb(40, 83, 223); color: white">
                                            <h4 class="modal-title" style="margin-right: 10px;">Busqueda del cliente </h4>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-agregar_cliente">
                                                <i class="fa fa-users"></i>
                                                Registrar cliente
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example2" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Seleccionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre del cliente</center>
                                                            </th>
                                                            <th>
                                                                <center>Nit/CC</center>
                                                            </th>
                                                            <th>
                                                                <center>Celular</center>
                                                            </th>
                                                            <th>
                                                                <center>Email</center>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador_de_clientes = 0;
                                                        foreach ($clientes_datos as $clientes_dato) {
                                                            $id_cliente = $clientes_dato['id_cliente'];
                                                            $contador_de_clientes = $contador_de_clientes + 1; ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $contador_de_clientes; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><button id="btn_pasar_cliente<?php echo $id_cliente; ?>" class="btn btn-info">Seleccionar</button>
                                                                        <script>
                                                                            $('#btn_pasar_cliente<?php echo $id_cliente; ?>').click(function() {
                                                                                var id_cliente = '<?php echo  $clientes_dato['id_cliente']; ?>';
                                                                                $('#id_cliente').val(id_cliente);
                                                                                var nombre_cliente = '<?php echo  $clientes_dato['nombre_cliente']; ?>';
                                                                                $('#nombre_cliente').val(nombre_cliente);
                                                                                var nit_ci_cliente = '<?php echo  $clientes_dato['nit_ci_cliente']; ?>';
                                                                                $('#nit_ci_cliente').val(nit_ci_cliente);

                                                                                var celular_cliente = '<?php echo  $clientes_dato['celular_cliente']; ?>';
                                                                                $('#celular_cliente').val(celular_cliente);

                                                                                var email_cliente = '<?php echo  $clientes_dato['email_cliente']; ?>';
                                                                                $('#email_cliente').val(email_cliente);

                                                                                $('#modal-buscar_cliente').modal('toggle');
                                                                            })
                                                                        </script>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $clientes_dato['nombre_cliente'] ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $clientes_dato['nit_ci_cliente'] ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $clientes_dato['celular_cliente'] ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $clientes_dato['email_cliente'] ?></center>
                                                                </td>
                                                            </tr>


                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>


                                                </table>

                                                <!-- <br><br> -->
                                            </div>
                                        </div>



                                    </div>
                                    <!-- /.modal-content -->
                                </div>

                                <!-- /.modal-dialog -->
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre del cliente</label>
                                        <input type="text" class="form-control" id="nombre_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nit/CC del cliente</label>
                                        <input type="text" class="form-control" id="nit_ci_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular del cliente</label>
                                        <input type="text" class="form-control" id="celular_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email del cliente</label>
                                        <input type="text" class="form-control" id="email_cliente">
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
                                <input type="text" id="total_a_cancelar" class="form-control" style="text-align: center; background-color: tan;" value="<?php echo number_format($precio_total, 0, ',', '.'); ?>" disabled>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total pagado</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" id="total_pagado" class="form-control">
                                        </div>

                                        <script>
                                            $('#total_pagado').keyup(function() {
                                                var total_a_cancelar = $('#total_a_cancelar').val().replace(/\./g, '').replace(',', '').replace('$', '').trim();
                                                var total_pagado = $('#total_pagado').val().replace(/\./g, '').replace(',', '').replace('$', '').trim();

                                                var cambio = parseFloat(total_pagado) - parseFloat(total_a_cancelar);

                                                if (!isNaN(cambio)) {
                                                    $('#cambio').val(cambio.toFixed(2)); // Asegura 2 decimales
                                                } else {
                                                    $('#cambio').val('');
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cambio</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" id="cambio" class="form-control" disabled>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group">
                                <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar Venta</button>
                                <div id="respuesta_registro_venta"></div>
                                <script>
                                    $('#btn_guardar_venta').click(function() {
                                        var nro_venta = '<?php echo $contador_de_ventas + 1; ?>';
                                        var id_cliente = $('#id_cliente').val();

                                        // Limpiar formato del total antes de enviarlo
                                        var total_a_cancelar = $('#total_a_cancelar').val().replace(/\./g, '').replace(',', '').replace('$', '').trim();
                                        var total_pagado = $('#total_pagado').val().replace(/\./g, '').replace(',', '').replace('$', '').trim();

                                        if (id_cliente == '') {
                                            alert('El campo cliente no debe estar vacío');
                                        } else {
                                            // guardar_venta();
                                            actualizar_stock();
                                            guardar_venta();
                                        }


                                        // alert(n);

                                        function actualizar_stock() {
                                            var i = 1;
                                            var n = '<?php echo $contador_de_carrito; ?>';
                                            // var stock = '';
                                            for (i = 1; i <= n; i++) {
                                                var a = '#stock_de_inventario' + i;
                                                var stock_de_inventario = $(a).val();
                                                var b = '#cantidad_carrito' + i;
                                                var cantidad_carrito = $(b).html();
                                                var c = '#id_producto' + i;
                                                var id_producto = $(c).val();

                                                var stock_calculado = parseFloat(stock_de_inventario - cantidad_carrito);
                                                // alert(id_producto + '-' + stock_de_inventario + '-' + cantidad_carrito + '-' + stock_calculado)
                                                var url2 = "../app/controllers/ventas/actualizar_stock.php";
                                                $.get(url2, {
                                                    id_producto: id_producto,
                                                    stock_calculado: stock_calculado

                                                }, function(datos) {
                                                    // guardar_venta();
                                                });
                                            }
                                        }

                                        function guardar_venta() {
                                            var url = "../app/controllers/ventas/resgistro_de_ventas.php";
                                            $.get(url, {
                                                nro_venta: nro_venta,
                                                id_cliente: id_cliente,
                                                total_a_cancelar: total_a_cancelar,
                                                total_pagado: total_pagado
                                            }, function(datos) {
                                                $('#respuesta_registro_venta').html(datos);

                                                // ✅ Limpiar los campos después de enviar
                                                $('#id_cliente').val('');
                                                $('#total_pagado').val('');
                                                $('#cambio').val('');

                                                // Si total_a_cancelar no es editable, recargarlo con el nuevo valor
                                                $('#total_a_cancelar').val('$0');

                                                // location.reload();
                                            });
                                        }
                                    });
                                </script>
                            </div>

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