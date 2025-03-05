<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualización de la compra</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Complete los campos correctamente</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div style="display:flex;">
                                        <h5 style="margin-right: 20px;;">Datos del producto</h5>

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
                                                                                        var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                                        $('#id_producto').val(id_producto);
                                                                                        var codigo = "<?php echo $productos_dato['codigo']; ?>";
                                                                                        $('#codigo').val(codigo);
                                                                                        var categoria = "<?php echo $productos_dato['categoria']; ?>";
                                                                                        $('#categoria').val(categoria);
                                                                                        var nombre = "<?php echo $productos_dato['nombre']; ?>";
                                                                                        $('#nombre_producto').val(nombre);
                                                                                        var email = "<?php echo $productos_dato['email']; ?>";
                                                                                        $('#usuario_producto').val(email);
                                                                                        var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                                        $('#descripcion_producto').val(descripcion);
                                                                                        var stock = "<?php echo $productos_dato['stock']; ?>";
                                                                                        $('#stock').val(stock);
                                                                                        $('#stock_actual').val(stock);
                                                                                        var stock_minimo = "<?php echo $productos_dato['stock_minimo']; ?>";
                                                                                        $('#stock_minimo').val(stock_minimo);
                                                                                        var stock_maximo = "<?php echo $productos_dato['stock_maximo']; ?>";
                                                                                        $('#stock_maximo').val(stock_maximo);
                                                                                        var precio_compra = "<?php echo $productos_dato['precio_compra']; ?>";
                                                                                        $('#precio_compra').val(precio_compra);
                                                                                        var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                                        $('#precio_venta').val(precio_venta);
                                                                                        var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso']; ?>";
                                                                                        $('#fecha_ingreso').val(fecha_ingreso);
                                                                                        var ruta_img = "<?php echo $URL . '/almacen/img_productos/' . $productos_dato['imagen']; ?>"
                                                                                        $('#img_producto').attr({
                                                                                            src: ruta_img
                                                                                        });

                                                                                        $('#modal-buscar_producto').modal('toggle');
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



                                                            </table>

                                                        </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>







                                    </div>

                                    <hr>
                                    <div class="row" style="font-size: 14px;">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" value="<?php echo $id_producto_tabla ?>" id="id_producto">
                                                        <label for="">Código:</label>

                                                        <input type="text" value="<?php echo $codigo ?>" class="form-control"
                                                            id="codigo" disabled>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Categoría:</label>
                                                    <div style="display:flex; gap:5px;">
                                                        <input type="text" value="<?php echo $nombre_categoria ?>" class="form-control" id="categoria" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Nombre del producto:</label>
                                                    <input type="text" value="<?php echo $nombre_producto ?>" name="nombre" id="nombre_producto" class="form-control" disabled>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario:</label>
                                                        <input type="text" value="<?php echo $nombres_usuario ?>" class="form-control" id="usuario_producto" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="">Descripción del producto:</label>
                                                    <textarea name="descripcion" id="descripcion_producto" cols="30" rows="2" class="form-control" disabled><?php echo $descripcion ?></textarea>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" value="<?php echo $stock ?>" name="stock" id="stock" class="form-control" style="background-color:tan" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Stock mínimo:</label>
                                                    <input type="number" value="<?php echo $stock_minimo ?>" name="stock_minimo" id="stock_minimo" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Stock máximo:</label>
                                                    <input type="number" value="<?php echo $stock_maximo ?>" name="stock_maximo" id="stock_maximo" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Precio compra:</label>
                                                    <input type="number" value="<?php echo $precio_compra_producto ?>" name="precio_compra" id="precio_compra" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Precio venta:</label>
                                                    <input type="number" value="<?php echo $precio_venta_producto ?>" name="precio_venta" id="precio_venta" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Fecha de ingreso:</label>
                                                    <input type="date" value="<?php echo $fecha_ingreso ?>" name="fecha_ingreso" id="fecha_ingreso" class="form-control" disabled>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen del producto:</label>
                                                <center>
                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" width="100%" id="img_producto" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="display:flex;">
                                        <h5 style="margin-right: 20px;;">Datos del proveedor</h5>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_proveedor">
                                            <i class="fa fa-search"></i>
                                            Buscar proveedor
                                        </button>
                                        <div class="modal fade" id="modal-buscar_proveedor">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:rgb(40, 83, 223); color: white">
                                                        <h4 class="modal-title">Buscar Proveedor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table id="example2" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <center>Nro</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Seleccionar</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre Proveedor</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Celular</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Teléfono</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Empresa</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Email</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Dirección</center>
                                                                        </th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($proveedores_datos as $proveedores_dato) {
                                                                        $id_proveedor = $proveedores_dato['id_proveedor'];
                                                                        $nombre_proveedor = $proveedores_dato['nombre_proveedor'];
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <center><?php echo $contador = $contador + 1; ?></center>
                                                                            </td>
                                                                            <td>
                                                                                <button href="" class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>">
                                                                                    Seleccionar
                                                                                </button>
                                                                                <script>
                                                                                    $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click(function() {
                                                                                        var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                                        $('#id_proveedor').val(id_proveedor);

                                                                                        var nombre_proveedor = '<?php echo $nombre_proveedor; ?>';
                                                                                        $('#nombre_proveedor').val(nombre_proveedor);

                                                                                        var celular_proveedor = '<?php echo $proveedores_dato['celular']; ?>';
                                                                                        $('#celular').val(celular_proveedor);

                                                                                        var telefono_proveedor = '<?php echo $proveedores_dato['telefono']; ?>';
                                                                                        $('#telefono').val(telefono_proveedor);

                                                                                        var empresa_proveedor = '<?php echo $proveedores_dato['empresa']; ?>';
                                                                                        $('#empresa').val(empresa_proveedor);

                                                                                        var email_proveedor = '<?php echo $proveedores_dato['email']; ?>';
                                                                                        $('#email').val(email_proveedor);

                                                                                        var direccion_proveedor = '<?php echo $proveedores_dato['direccion']; ?>';
                                                                                        $('#direccion').val(direccion_proveedor);

                                                                                        $('#modal-buscar_proveedor').modal('toggle');
                                                                                    })
                                                                                </script>
                                                                            </td>
                                                                            <td><?php echo $nombre_proveedor; ?></td>
                                                                            <td>
                                                                                <a href="https://wa.me/57<?php echo $proveedores_dato['celular']; ?>" target="_blank" class="btn btn-success">
                                                                                    <i class="fa fa-phone"></i>
                                                                                    <?php echo $proveedores_dato['celular']; ?></a>
                                                                            </td>
                                                                            <td><?php echo $proveedores_dato['telefono']; ?></td>
                                                                            <td><?php echo $proveedores_dato['empresa']; ?></td>
                                                                            <td><?php echo $proveedores_dato['email']; ?></td>
                                                                            <td><?php echo $proveedores_dato['direccion']; ?></td>


                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>

                                                            </table>
                                                        </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="container-fluid" style="font-size: 14px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $id_proveedor_tabla ?>" id="id_proveedor" hidden>
                                                    <label for="">Nombre del Proveedor </label>
                                                    <input type="text" value="<?php echo $nombre_proveedor_tabla ?>" class="form-control" id="nombre_proveedor" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Celular</label>
                                                    <input type="number" value="<?php echo $celular_proveedor ?>" class="form-control" id="celular" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Teléfono</label>
                                                    <input type="number" value="<?php echo $telefono_proveedor ?>" class="form-control" id="telefono" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Empresa</label>
                                                    <input type="text" value="<?php echo $empresa ?>" class="form-control" id="empresa" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email </label>
                                                    <input type="email" value="<?php echo $email_proveedor ?>" class="form-control" id="email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Dirección </label>
                                                    <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled><?php echo $direccion_proveedor ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detalles de la compra</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="">Número de compra</label>
                                            <input type="text" value="<?php echo $nro_compra; ?>" style="text-align: center;" class="form-control" disabled>
                                            <input type="text" value="<?php echo $nro_compra; ?>" id="numero_compra" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fecha de compra</label>
                                            <input type="date" value="<?php echo $fecha_compra ?>" class="form-control" id="fecha_compra">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <input type="text" id="comprobante" hidden> -->
                                            <label for="">Comprobante de compra</label>
                                            <input type="text" value="<?php echo $comprobante ?>" class="form-control" id="comprobante">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="">Precio de compra</label>
                                            <input type="text" value="<?php echo $precio_compra ?>" class="form-control" id="precio_compra_controlador">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Stock actual</label>
                                            <input type="text" value="<?php echo $stock = $stock - $cantidad ?>" class="form-control" id="stock_actual" style="background-color: tan; text-align:center;" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Stock total</label>
                                            <input type="text" class="form-control" id="stock_total" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Cantidad de la compra</label>
                                            <input type="number" value="<?php echo $cantidad ?>" id="cantidad_compra" style="text-align:center;" class="form-control">
                                        </div>
                                        <script>
                                            $('#cantidad_compra').keyup(function() {
                                                sumacantidades();
                                            });
                                            sumacantidades();

                                            function sumacantidades() {
                                                var stock_actual = parseInt($('#stock_actual').val()) || 0;
                                                var stock_compra = parseInt($('#cantidad_compra').val()) || 0;

                                                var total = stock_actual + stock_compra;
                                                $('#stock_total').val(total);
                                            }
                                        </script>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Usuario</label>
                                            <input type="text" value="<?php echo $nombres_usuario; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" id="btn_actualizar_compra">Actualizar Compra</button>
                                        </div>
                                    </div>
                                    <script>
                                        $('#btn_actualizar_compra').click(function() {
                                            var id_compra = '<?php echo $id_compra ?>';
                                            var id_producto = $('#id_producto').val().trim();
                                            var numero_compra = $('#numero_compra').val().trim();
                                            var fecha_compra = $('#fecha_compra').val().trim();
                                            var id_proveedor = $('#id_proveedor').val().trim();
                                            var comprobante = $('#comprobante').val().trim();
                                            var id_usuario = <?php echo json_encode($id_usuario_session); ?>;
                                            var precio_compra_controlador = parseFloat($('#precio_compra_controlador').val()) || 0;
                                            var cantidad_compra = parseInt($('#cantidad_compra').val()) || 0;
                                            var stock_total = parseInt($('#stock_total').val()) || 0;

                                            // Validación de campos vacíos con focus en el campo incorrecto
                                            if (!id_producto) {
                                                alert('El campo Producto no debe estar vacío');
                                                $('#id_producto').focus();
                                                return;
                                            }
                                            if (!fecha_compra) {
                                                alert('El campo Fecha de compra no debe estar vacío');
                                                $('#fecha_compra').focus();
                                                return;
                                            }
                                            if (!comprobante) {
                                                alert('El campo Comprobante no debe estar vacío');
                                                $('#comprobante').focus();
                                                return;
                                            }
                                            if (precio_compra_controlador <= 0) {
                                                alert('El campo Precio de compra debe ser un número válido');
                                                $('#precio_compra_controlador').focus();
                                                return;
                                            }
                                            if (cantidad_compra <= 0) {
                                                alert('El campo Cantidad de compra debe ser un número válido');
                                                $('#cantidad_compra').focus();
                                                return;
                                            }

                                            var url = "../app/controllers/compras/update.php";
                                            $.get(url, {
                                                id_compra: id_compra,
                                                id_producto: id_producto,
                                                numero_compra: numero_compra,
                                                fecha_compra: fecha_compra,
                                                id_proveedor: id_proveedor,
                                                comprobante: comprobante,
                                                id_usuario: id_usuario,
                                                precio_compra_controlador: precio_compra_controlador,
                                                cantidad_compra: cantidad_compra,
                                                stock_total: stock_total
                                            }, function(datos) {
                                                // alert("fue al controlador");
                                                $('#respuesta_update').html(datos);
                                            });
                                        });
                                    </script>


                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div id="respuesta_update"></div>

                        <!-- /.card -->
                    </div>


                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
                "info": "Mostrando _START_ a _END_ del TOTAL de los Proveedores",
                "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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