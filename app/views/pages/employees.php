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
                    <a class="navbar-brand" href="<?php echo URL_ROUTE ?>index.php"><?php echo $data['title']; ?></a>
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
                                <h4 class="card-title">Perfil de trabajador</h4>
                                <p class="card-category">Registra el perfil del trabajador</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo URL_ROUTE ?>/employees/insertEmployee">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Identificación</label>
                                                <input type="text" name="idemployee" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Apellidos</label>
                                                <input type="text" name="lastnames" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Direccion</label>
                                                <input type="text" name="address" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Telefono</label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Cargo</label>
                                                <input type="text" name="position" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Registrar empleado</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Registros de empleados</h4>
                                <p class="card-category">Registro para empleados activos.</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Cargo</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['employees'] as $employee) { ?>
                                            <tr>
                                                <td><?php echo $employee->idempleado ?></td>
                                                <td><?php echo $employee->nombre.' '.$employee->apellidos ?></td>
                                                <td><?php echo $employee->direccion ?></td>
                                                <td><?php echo $employee->telefono ?></td>
                                                <td><?php echo $employee->cargo ?></td>
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
        </div>
        <?php require APP_ROUTE . '/views/includes/footer.php' ?>
    </div>
</div>
<?php require APP_ROUTE . '/views/includes/scripts.php' ?>
</body>
</html>
