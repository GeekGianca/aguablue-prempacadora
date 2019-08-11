<!DOCTYPE html>
<html lang="en">
<?php require APP_ROUTE . '/views/includes/header.php' ?>
<body class="">
<div class="wrapper ">
    <?php require APP_ROUTE . '/views/includes/sidebar.php' ?>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="<?php echo URL_ROUTE ?>/index.php">Inicio</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL_ROUTE ?>/pages/openWallet">
                                Abrir cartera
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-success">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Ventas Diarias</h4>
                                <p class="card-category">
                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 0 </span> Ventas
                                    realizadas.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> Actualizado
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-warning">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Lotes despachados</h4>
                                <p class="card-category"><?php echo count($data['lots'])?> Ultimos lotes registrados</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> Actualizado
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-danger">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Domicilios entregados</h4>
                                <p class="card-category">0 Domicilios entregados.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> Actualizado.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Registro de lotes</h4>
                                <p class="card-category">Lotes de mercancia para la venta.</p>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo URL_ROUTE ?>/pages/insertLot" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="type" required>
                                                    <option value="Tipo de lote">Tipo de lote</option>
                                                    <option value="Agua x250ml(Paca)">Agua x250ml(Paca)</option>
                                                    <option value="Agua x250ml(Botellones)">Agua x250ml(Botellones)
                                                    </option>
                                                    <option value="Jugos Saborizados">Jugos Saborizados</option>
                                                    <option value="Galón de agua">Galón de agua</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Cantidad unitaria</label>
                                                <input name="unit" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Cantidad total</label>
                                                <input type="text" name="total" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Precio unitario</label>
                                                <input type="text" name="price" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info pull-right">Registrar lote</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Estado de lotes</h4>
                                <p class="card-category">Lotes disponibles para venta</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>Fecha</th>
                                    <th>Tipo Lote</th>
                                    <th>Cantidad To.</th>
                                    <th>P.Unitario</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data['lots'] as $lot) { ?>
                                        <tr>
                                            <td><?php echo $lot->fecha_salida ?></td>
                                            <td><?php echo $lot->tipo_lote ?></td>
                                            <td><?php echo $lot->cantidad_total ?></td>
                                            <td><?php echo $lot->precio_unitario ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require APP_ROUTE . '/views/includes/footer.php' ?>
    </div>
</div>
<?php require APP_ROUTE . '/views/includes/scripts.php' ?>
</body>
</html>
