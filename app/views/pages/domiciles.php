<!DOCTYPE html>
<html lang="en">
<?php require APP_ROUTE . '/views/includes/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['domiciles'])) {
    $_SESSION['domiciles'] = array();
}
?>
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
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Registro de lotes</h4>
                                <p class="card-category">Lotes de mercancia para la venta.</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo URL_ROUTE ?>/domiciles/addDomicile">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="type" id="type" onchange="getValue()" required>
                                                    <option value="Tipo de lote">Tipo de lote</option>
                                                    <?php foreach ($data['lots'] as $lot) { ?>
                                                        <option value="<?php echo $lot->idlote ?>"><?php echo $lot->tipo_lote ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Direccion domicilio</label>
                                                <input name="address" id="address" type="text" class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Cantidad</label>
                                                <input type="text" id="quantity" name="quantity" class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Precio domicilio</label>
                                                <input id="price" type="text" name="price" class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info pull-right">Agregar</button>
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
                                    <th>Lote</th>
                                    <th>Tipo</th>
                                    <th>Costo</th>
                                    <th>Cantidad</th>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($_SESSION['domiciles'] as $dom) { ?>
                                        <tr>
                                            <td><?php echo $dom['type']; ?></td>
                                            <td><?php echo $dom['address']; ?></td>
                                            <td><?php echo $dom['quantity']; ?></td>
                                            <td><?php echo $dom['price']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span id="total">Total $</span>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="<?php echo URL_ROUTE ?>/domiciles/insertDomicile" method="post">
                                            <button type="submit" class="btn btn-warning pull-right">Registrar
                                                domicilio
                                            </button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
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
<script>
    getLots();
    var domiciles = [];
    $('#adddomicile').submit(function (e) {
        let select = document.getElementById("type");
        let val = select.options[select.selectedIndex].value;
        domiciles.push({
            type: val,
            address: $('#address').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val()
        });
        $.ajax({
            url: '<?php echo URL_ROUTE ?>/domiciles/addDomicile',
            type: 'POST',
            data: {
                type: val,
                address: $('#address').val(),
                quantity: $('#quantity').val(),
                price: $('#price').val()
            },
            success: function (response) {
                console.log(domiciles);
                localStorage.setItem("domiciles", JSON.stringify(domiciles));
                $('#adddomicile').trigger('reset');
                e.preventDefault();
                getLots();
            }
        });
    });

    function getLots() {
        let datos = JSON.parse(localStorage.getItem("domiciles"));
        console.log(datos);
        let template = '';
        let total = 0;
        datos.forEach(dato => {
            total += parseFloat(dato.price);
            template += `
                    <tr>
                        <td>
                            ${dato.type}
                        </td>
                        <td>${dato.address}</td>
                        <td>${dato.quantity}</td>
                        <td>${dato.price}</td>
                    </tr>`;
        });
        $('#lots').html(template);
        $('#total').html("Total $" + total);
    }
</script>
</body>
</html>

