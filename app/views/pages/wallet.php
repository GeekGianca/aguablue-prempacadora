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
                    <a class="navbar-brand" href="<?php echo URL_ROUTE ?>/index.php"><?php echo $data['title']; ?></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Registros de pagos</h4>
                                <p class="card-category">Registro de pagos para empleados activos.</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Nombre</th>
                                        <th>Cargo</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['pays'] as $payments) { ?>
                                            <tr>
                                                <td><?php echo $payments->idpago; ?></td>
                                                <td><?php echo $payments->fehca_pago; ?></td>
                                                <td><?php echo $payments->hora_pago; ?></td>
                                                <td><?php echo $payments->nombre . ' ' . $payments->apellidos; ?></td>
                                                <td><?php echo $payments->cargo; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Pago a trabajadores</h4>
                                <p class="card-category">Entradas de pago a trabajadores.</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo URL_ROUTE ?>/wallet/addPay">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="employee" id="employee" required>
                                                    <option value="">---Seleccione empleado---</option>
                                                    <?php foreach ($data['employees'] as $employee) { ?>
                                                        <option value="<?php echo $employee->idempleado ?>"><?php echo $employee->nombre . ' ' . $employee->apellidos ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-info pull-right">Generar pago</button>
                                            <div class="clearfix"></div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-8">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Estado cartera</h4>
                                <p class="card-category">Registro de cartera para los dias facturados.</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>Fecha</th>
                                    <th>Gastos</th>
                                    <th>Ganancia</th>
                                    <th>Total</th>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php foreach ($data['wallets'] as $wall) { ?>
                                        <tr>
                                            <td><?php echo $wall->idpago ?></td>
                                            <td><?php echo $wall->fecha_cartera ?></td>
                                            <td><?php echo $wall->gasto_diario ?></td>
                                            <td><?php echo $wall->ganancia_diaria ?></td>
                                            <td><?php echo $wall->total ?></td>
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


