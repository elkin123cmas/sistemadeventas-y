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
                    <h1 class="m-0">Compra número <?php echo $nro_compra; ?></h1>
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
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">¿Confirma que desea eliminar esta compra?</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div class="row" style="font-size: 14px;">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" value="<?php echo $id_producto_tabla ?>" id="id_producto" hidden>
                                                        <label for="">Código:</label>

                                                        <input type="text" value="<?php echo $codigo; ?>" class="form-control"
                                                            id="codigo" disabled>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Categoría:</label>
                                                    <div style="display:flex; gap:5px;">
                                                        <input type="text" value="<?php echo $nombre_categoria; ?>" class="form-control" id="categoria" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Nombre del producto:</label>
                                                    <input type="text" value="<?php echo $nombre_producto; ?>" name="nombre" id="nombre_producto" class="form-control" disabled>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario:</label>
                                                        <input type="text" value="<?php echo $nombres_usuario; ?>" class="form-control" id="usuario_producto" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="">Descripción del producto:</label>
                                                    <textarea name="descripcion" id="descripcion_producto" cols="30" rows="2" class="form-control" disabled><?php echo $descripcion; ?></textarea>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" value="<?php echo $stock; ?>" name="stock" id="stock" class="form-control" style="background-color:tan" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Stock mínimo:</label>
                                                    <input type="number" value="<?php echo $stock_minimo; ?>" name="stock_minimo" id="stock_minimo" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Stock máximo:</label>
                                                    <input type="number" value="<?php echo $stock_maximo; ?>" name="stock_maximo" id="stock_maximo" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Precio compra:</label>
                                                    <input type="number" value="<?php echo $precio_compra_producto; ?>" name="precio_compra" id="precio_compra" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Precio venta:</label>
                                                    <input type="number" value="<?php echo $precio_venta_producto; ?>" name="precio_venta" id="precio_venta" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Fecha de ingreso:</label>
                                                    <input type="date" value="<?php echo $fecha_ingreso; ?>" name="fecha_ingreso" id="fecha_ingreso" class="form-control" disabled>
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
                                    </div>

                                    <hr>

                                    <div class="container-fluid" style="font-size: 14px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="id_proveedor" hidden>
                                                    <label for="">Nombre del Proveedor </label>
                                                    <input type="text" value="<?php echo $nombre_proveedor_tabla; ?>" class="form-control" id="nombre_proveedor" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Celular</label>
                                                    <input type="number" value="<?php echo $celular_proveedor; ?>" class="form-control" id="celular" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Teléfono</label>
                                                    <input type="number" value="<?php echo $telefono_proveedor; ?>" class="form-control" id="telefono" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Empresa</label>
                                                    <input type="text" value="<?php echo $empresa; ?>" class="form-control" id="empresa" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email </label>
                                                    <input type="email" value="<?php echo $email_proveedor; ?>" class="form-control" id="email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Dirección </label>
                                                    <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled><?php echo $direccion_proveedor; ?></textarea>
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
                        <div class="card card-outline card-danger">
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
                                            <input type="text" value="<?php echo $id_compra_get; ?>" style="text-align: center;" class="form-control" disabled>
                                            <input type="text" value="<?php echo $id_compra_get; ?>" id="numero_compra" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fecha de compra</label>
                                            <input type="date" value="<?php echo $fecha_compra; ?>" class="form-control" id="fecha_compra" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <input type="text" id="comprobante" hidden> -->
                                            <label for="">Comprobante de compra</label>
                                            <input type="text" value="<?php echo $comprobante; ?>" class="form-control" id="comprobante" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="">Precio de compra</label>
                                            <input type="text" value="<?php echo $precio_compra; ?>" class="form-control" id="precio_compra_controlador" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Cantidad de la compra</label>
                                            <input type="number" value="<?php echo $cantidad; ?>" id="cantidad_compra" style="text-align:center;" class="form-control" disabled>
                                        </div>


                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Usuario</label>
                                            <input type="text" value="<?php echo $nombres_usuario; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-danger btn-block" id="btn_eliminar"><i class="fa fa-trash"> Eliminar Compra</i></button>
                                        </div>
                                    </div>
                                    <div id="respuesta_delete"></div>
                                    <script>
                                        $('#btn_eliminar').click(function() {
                                            var id_compra = '<?php echo $id_compra_get; ?>';
                                            var id_producto = $('#id_producto').val();
                                            var cantidad_compra = '<?php echo $cantidad; ?>';
                                            var stock_actual = '<?php echo $stock; ?>';

                                            Swal.fire({
                                                title: "¿Confirma que desea eliminar esta compra?",
                                                icon: "question", // Reemplazar con un valor fijo para probar
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Confirmar",
                                                cancelButtonText: "Cancelar"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    eliminar(); // Llamar la función antes de mostrar la segunda alerta
                                                }
                                            });

                                            function eliminar() {
                                                var url = "../app/controllers/compras/delete.php";
                                                $.get(url, {
                                                    id_compra: id_compra,
                                                    id_producto: id_producto,
                                                    cantidad_compra: cantidad_compra,
                                                    stock_actual: stock_actual
                                                }, function(datos) {
                                                    $('#respuesta_delete').html(datos);

                                                    // Mostrar la alerta de éxito después de eliminar
                                                    Swal.fire({
                                                        title: "Compra eliminada",
                                                        text: "Se ha eliminado correctamente.",
                                                        icon: "success"
                                                    });
                                                }).fail(function() {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: "No se pudo eliminar la compra.",
                                                        icon: "error"
                                                    });
                                                });
                                            }
                                        });
                                    </script>
                                    <hr>



                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div id="respuesta_create"></div>

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