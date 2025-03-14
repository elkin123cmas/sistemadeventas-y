<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/categorias/listado_de_categorias.php');
include('app/controllers/almacen/listado_de_productos.php');
include('app/controllers/proveedores/listado_de_proveedores.php');
include('app/controllers/compras/listado_de_compras.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido a Gestión360 - <?php echo $rol_sesion; ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            Contenido del Sistema
            <hr>
            <hr>
            <div class="row">

                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $contador_de_usuarios = 0;
                                foreach ($usuarios_datos as $usuarios_dato) {
                                    $contador_de_usuarios = $contador_de_usuarios + 1;
                                }
                                ?><?php echo $contador_de_usuarios; ?></h3>

                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                                $contador_de_roles = 0;
                                foreach ($roles_datos as $roles_dato) {
                                    $contador_de_roles = $contador_de_roles + 1;
                                }
                                ?><?php echo $contador_de_roles; ?></h3>

                            <p>Roles Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>


                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                $contador_de_categorias = 0;
                                foreach ($categorias_datos as $categorias_dato) {
                                    $contador_de_categorias = $contador_de_categorias + 1;
                                }
                                ?><?php echo $contador_de_categorias; ?></h3>

                            <p>Categorías Registradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/categorias" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>


                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php
                                $contador_de_productos = 0;
                                foreach ($productos_datos as $productos_dato) {
                                    $contador_de_productos = $contador_de_productos + 1;
                                }
                                ?><?php echo $contador_de_productos; ?></h3>

                            <p>Productos Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/almacen" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>


                </div>


                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?php
                                $contador_de_proveedores = 0;
                                foreach ($proveedores_datos as $proveedores_dato) {
                                    $contador_de_proveedores = $contador_de_proveedores + 1;
                                }
                                ?><?php echo $contador_de_proveedores; ?></h3>

                            <p>Proveedores Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/proveedores" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>


                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                $contador_de_compras = 0;
                                foreach ($compras_datos as $compras_dato) {
                                    $contador_de_compras = $contador_de_compras + 1;
                                }
                                ?><?php echo $contador_de_compras; ?></h3>

                            <p>Compras Registradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <a href="<?php echo $URL; ?>/compras" class="small-box-footer">
                            Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>


                </div>


                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('layout/parte2.php');
?>