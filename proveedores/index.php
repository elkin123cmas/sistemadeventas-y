<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
// include('../app/controllers/categorias/listado_de_categorias.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Proveedores

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Nuevo Proveedor
                        </button>
                    </h1>


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
                            <h3 class="card-title">Proveedores Registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
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
                                        <th>
                                            <center>Acciones</center>
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

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- modal para actualizar proveedores-->
                                                    <div class="modal fade" id="modal-update<?php echo $id_proveedor; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:rgb(15, 119, 55); color: white">
                                                                    <h4 class="modal-title">Actualizar Proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del Proveedor <b style="color:red;">*</b></label>
                                                                                <input type="text" class="form-control" value="<?php echo $nombre_proveedor ?>" id="nombre_proveedor<?php echo $id_proveedor; ?>">
                                                                                <small style="color:red; display:none;" id="lbl_nombre<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular <b style="color:red;">*</b></label>
                                                                                <input type="number" class="form-control" value="<?php echo $proveedores_dato['celular'] ?>" id="celular<?php echo $id_proveedor; ?>">
                                                                                <small style="color:red; display:none;" id="lbl_celular<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" class="form-control" value="<?php echo $proveedores_dato['telefono'] ?>" id="telefono<?php echo $id_proveedor; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa <b style="color:red;">*</b></label>
                                                                                <input type="text" class="form-control" value="<?php echo $proveedores_dato['empresa'] ?>" id="empresa<?php echo $id_proveedor; ?>">
                                                                                <small style="color:red; display:none;" id="lbl_empresa<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email </label>
                                                                                <input type="email" class="form-control" value="<?php echo $proveedores_dato['email'] ?>" id="email<?php echo $id_proveedor; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección <b style="color:red;">*</b></label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor; ?>" cols="30" rows="3" class="form-control"><?php echo $proveedores_dato['direccion']; ?></textarea>
                                                                                <small style="color:red; display:none;" id="lbl_direccion<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor; ?>">Actualizar Proveedor</button>
                                                                </div>

                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#btn_update<?php echo $id_proveedor; ?>').click(function() {
                                                                var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                var nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor; ?>').val();
                                                                var celular = $('#celular<?php echo $id_proveedor; ?>').val();
                                                                var telefono = $('#telefono<?php echo $id_proveedor; ?>').val();
                                                                var empresa = $('#empresa<?php echo $id_proveedor; ?>').val();
                                                                var email = $('#email<?php echo $id_proveedor; ?>').val();
                                                                var direccion = $('#direccion<?php echo $id_proveedor; ?>').val();

                                                                if (nombre_proveedor == "") {
                                                                    $('#nombre_proveedor<?php echo $id_proveedor; ?>').focus();
                                                                    $('#lbl_nombre<?php echo $id_proveedor; ?>').css('display', 'block');
                                                                } else if (celular == "") {
                                                                    $('#celular<?php echo $id_proveedor; ?>').focus();
                                                                    $('#lbl_celular<?php echo $id_proveedor; ?>').css('display', 'block');
                                                                } else if (empresa == "") {
                                                                    $('#empresa<?php echo $id_proveedor; ?>').focus();
                                                                    $('#lbl_empresa<?php echo $id_proveedor; ?>').css('display', 'block');
                                                                } else if (direccion == "") {
                                                                    $('#direccion<?php echo $id_proveedor; ?>').focus();
                                                                    $('#lbl_direccion<?php echo $id_proveedor; ?>').css('display', 'block');
                                                                } else {
                                                                    var url = "../app/controllers/proveedores/update.php";
                                                                    $.get(url, {
                                                                        id_proveedor: id_proveedor,
                                                                        nombre_proveedor: nombre_proveedor,
                                                                        celular: celular,
                                                                        telefono: telefono,
                                                                        empresa: empresa,
                                                                        email: email,
                                                                        direccion: direccion
                                                                    }, function(datos) {
                                                                        $('#respuesta_update<?php echo $id_proveedor; ?>').html(datos);
                                                                    });
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                    <div id="respuesta_update<?php echo $id_proveedor; ?>"></div>

                                                </div>


                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-trash"></i> Borrar
                                                    </button>
                                                    <!-- modal para eliminar proveedores-->
                                                    <div class="modal fade" id="modal-delete<?php echo $id_proveedor; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:rgb(186, 9, 9); color: white">
                                                                    <h4 class="modal-title">Eliminar Proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del Proveedor <b style="color:red;">*</b></label>
                                                                                <input type="text" class="form-control" value="<?php echo $nombre_proveedor ?>" id="nombre_proveedor<?php echo $id_proveedor; ?>" disabled>
                                                                                <small style="color:red; display:none;" id="lbl_nombre<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular <b style="color:red;">*</b></label>
                                                                                <input type="number" class="form-control" value="<?php echo $proveedores_dato['celular'] ?>" id="celular<?php echo $id_proveedor; ?>" disabled>
                                                                                <small style="color:red; display:none;" id="lbl_celular<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" class="form-control" value="<?php echo $proveedores_dato['telefono'] ?>" id="telefono<?php echo $id_proveedor; ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa <b style="color:red;">*</b></label>
                                                                                <input type="text" class="form-control" value="<?php echo $proveedores_dato['empresa'] ?>" id="empresa<?php echo $id_proveedor; ?>" disabled>
                                                                                <small style="color:red; display:none;" id="lbl_empresa<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email </label>
                                                                                <input type="email" class="form-control" value="<?php echo $proveedores_dato['email'] ?>" id="email<?php echo $id_proveedor; ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección <b style="color:red;">*</b></label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor; ?>" cols="30" rows="3" class="form-control" disabled><?php echo $proveedores_dato['direccion']; ?></textarea>
                                                                                <small style="color:red; display:none;" id="lbl_direccion<?php echo $id_proveedor; ?>"><b style="color:red;">*</b> Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor; ?>">Eliminar Proveedor</button>
                                                                </div>

                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#btn_delete<?php echo $id_proveedor; ?>').click(function() {
                                                                var id_proveedor = '<?php echo $id_proveedor; ?>';

                                                                var url2 = "../app/controllers/proveedores/delete.php";
                                                                $.get(url2, {
                                                                    id_proveedor: id_proveedor
                                                                }, function(datos) {
                                                                    $('#respuesta_delete<?php echo $id_proveedor; ?>').html(datos);
                                                                });

                                                            });
                                                        });
                                                    </script>
                                                    <div id="respuesta_delete<?php echo $id_proveedor; ?>"></div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
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
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy'
                    }, {
                        extend: 'pdf',
                    }, {
                        extend: 'csv',
                    }, {
                        extend: 'excel',
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas'
                }
            ],
            /*Fin de ajuste de botones*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

<!-- modal para registrar proveedores-->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1d36b6; color: white">
                <h4 class="modal-title">Crea una nuevo Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre del Proveedor <b style="color:red;">*</b></label>
                            <input type="text" class="form-control" id="nombre_proveedor">
                            <small style="color:red; display:none;" id="lbl_nombre"><b style="color:red;">*</b> Este campo es obligatorio</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Celular <b style="color:red;">*</b></label>
                            <input type="number" class="form-control" id="celular">
                            <small style="color:red; display:none;" id="lbl_celular"><b style="color:red;">*</b> Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="number" class="form-control" id="telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Empresa <b style="color:red;">*</b></label>
                            <input type="text" class="form-control" id="empresa">
                            <small style="color:red; display:none;" id="lbl_empresa"><b style="color:red;">*</b> Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Dirección <b style="color:red;">*</b></label>
                            <textarea name="" id="direccion" cols="30" rows="3" class="form-control"></textarea>
                            <small style="color:red; display:none;" id="lbl_direccion"><b style="color:red;">*</b> Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Registrar</button>
            </div>
            <div id="respuesta"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $('#btn_create').click(function() {
        // alert("Hola");
        var nombre_proveedor = $('#nombre_proveedor').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
        var empresa = $('#empresa').val();
        var email = $('#email').val();
        var direccion = $('#direccion').val();

        if (nombre_proveedor == "") {
            $('#nombre_proveedor').focus();
            $('#lbl_nombre').css('display', 'block');
        } else if (celular == "") {
            $('#celular').focus();
            $('#lbl_celular').css('display', 'block');

        } else if (empresa == "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display', 'block');
        } else if (direccion == "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display', 'block');
        } else {
            // alert(nombre_categoria);
            var url = "../app/controllers/proveedores/create.php";
            $.get(url, {
                nombre_proveedor: nombre_proveedor,
                celular: celular,
                telefono: telefono,
                empresa: empresa,
                email: email,
                direccion: direccion
            }, function(datos) {
                // alert("fue al controlador");
                $('#respuesta').html(datos);
            });
        }

    })
</script>