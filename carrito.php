<?php

require('./dependencias.php');

// $data['producto'] = json_decode(file_get_contents('./detalles.json'))->product;

// search_results

$titulo = "Carrito";

array_push(
    $styles,
    "<link rel='stylesheet' type='text/css' href='./public/css/styles.css'>",
    "<link rel='stylesheet' href='./public/css/carrito.css'>"
);

array_push(
    $scripts,
    "<script src='./public/js/jquery.min.js'></script>",
    "<script src='./public/js/carrito.js'></script>"
);


$data['simbolo'] = '€';
$data['envio'] = rand(1, 10);
$data['total'] = 0;

?>

<?php function mainContent($data) { ?>
    <main class='container'>
        <h2>Mi Carrito de Compras</h2>
        <div class='row'>
            <div class='col-md-8' id='producto'>
                <?php for ($i = 1; $i <= 20; $i++) { ?>
                    <?php $random = rand(1, 100); ?>
                    <?php $data['total'] += $random; ?>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='row centre'>
                                <div class='col-md-2'>
                                    <img src='./public/img/zapatos.jpg' class='img-fluid'>
                                </div>
                                <div class='col-md-4'>
                                    <h5 class='card-title'>Producto <?= $i ?></h5>
                                    <p class='card-text'>Descripción breve del producto.</p>
                                </div>
                                <div class='col-md-2'>
                                    <input type='number' class='form-control' value='1' disabled>
                                </div>
                                <div class='col-md-2'>
                                    <p class='card-text'><?= $random  . $data['simbolo'] ?></p>
                                </div>
                                <div class='col-md-2 boton-cerrar'>
                                    <button type='button' class='btn-close' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div id="ancla"></div>
            </div>
            <div class='col-md-4 fijar' id="resumen">
                <div class='card' id="caja-resumen">
                    <div class='card-body'>
                        <h5 class='card-title'>Resumen de Compra</h5>
                        <hr>
                        <p class='card-text'>Subtotal: <span class='precio'><?= $data['total'] . $data['simbolo'] ?></span></p>
                        <p class='card-text'>Envío: <span class="precio"><?= $data['envio'] . $data['simbolo'] ?></span></p>
                        <hr>
                        <p class='card-text'><b>Total: <span class='precio'><?= $data['total'] + $data['envio'] . $data['simbolo'] ?></span></b></p>
                        <div class='botones'>
                            <button type='button' class='btn btn-primary btn-block'>Vaciar Carrito</button>
                            <button type='button' class='btn btn-success btn-block'>Tramitar pago</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src='./public/js/jquery.min.js'></script>
<?php } ?>

<?php require('pintar.php'); ?>