<?php

require('./dependencias.php');

$producto = json_decode(file_get_contents('./detalles.json'))->product;

$data['imagenes'] = $producto->images;
$data['nombre_producto'] = $producto->title;
$data['marca'] = $producto->brand;
$data['codigo'] = $producto->asin;
$data['precio'] = $producto->buybox_winner->price->value . ' ' . $producto->buybox_winner->price->symbol;
$data['precio_original'] = $producto->buybox_winner->rrp->value . ' ' . $producto->buybox_winner->rrp->symbol;
$data['ahorras'] = $data['precio_original'] - $data['precio'] . ' ' . $producto->buybox_winner->price->symbol;
$data['porcentaje_ahorro'] = ceil($data['ahorras'] / $data['precio_original'] * 100);
$data['opciones'] = $producto->buybox_winner->fulfillment->fastest_delivery->name;
$data['producto'] = $producto->buybox_winner->availability->raw;
$data['caracteristicas'] = $producto->feature_bullets;
$data['videos'] = $producto->videos;
$data['especificaciones'] = $producto->specifications;

// search_results

$titulo = "Detalles";


array_push(
    $styles,
    "<link rel='stylesheet' type='text/css' href='./public/css/styles.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>",
    "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'>",
    "<link rel='stylesheet' href='./public/css/detalles-producto.css'>",
);

array_push(
    $scripts,
    "<script src='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'></script>",
    "",
    "<script src='./public/js/pagina-detalles.js'></script>"
);

?>

<?php function mainContent($data) { ?>
    <main class='contenido'>
        <section class='row producto'>
            <article class='col-md-6 d-flex justify-content-center align-items-center'>
                <div class='swiper mySwiper'>
                    <div class='swiper-wrapper'>
                        <?php foreach ($data['imagenes'] as $imagen) { ?>
                            <div class='swiper-slide'>
                                <div class='background-image'>
                                    <img class='background-image__image' src='<?= $imagen->link ?>' alt='<?= $data['nombre_producto'] ?>' />
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class='swiper-pagination'></div>

                    <div class='swiper-button-prev'></div>
                    <div class='swiper-button-next'></div>
                </div>
            </article>

            <article class='col-md-6 texto-producto'>
                <h2><?= $data['nombre_producto'] ?></h2>
                <p><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star-half-o text-warning"></i> 4.5 estrellas</p>
                <p class="text-muted">Marca: <?= $data['marca'] ?></p>
                <p class="text-muted">Referencia del Producto: <?= $data['codigo'] ?></p>
                <hr>
                <h4>Precio</h4>
                <p class="h3 text-danger"><?= $data['precio'] ?></p>
                <p class="text-muted">Precio original: <?= $data['precio_original'] ?></p>
                <p class="text-success">Ahorras <?= $data['ahorras'] ?> (<?= $data['porcentaje_ahorro'] ?>%)</p>
                <hr>
                <h4>Opciones de Envío</h4>
                <p><?= $data['opciones'] ?></p>
                <hr>
                <h4>Disponibilidad</h4>
                <p><?= $data['producto'] ?></p>
                <hr>
                <h4>Cantidad</h4>
                <div class="input-group input-height">

                    <button type="button" class="btn btn-default btn-number rest" disabled>
                        <i class="fa fa-minus"></i>
                    </button>

                    <input type="text" name="cantidad" id="cantidad" class="form-control input-number cantidad" value="1" min="1" max="10" readonly>
                    <button type="button" class="btn btn-default btn-number sum">
                        <i class="fa fa-plus"></i>
                    </button>
                    </span>
                </div>
                <hr>
                <button type="button" class="btn btn-primary btn-lg btn-block btn-100"><i class="fa fa-shopping-cart"></i> Añadir al Carrito</button>
                <button type="button" class="btn btn-warning btn-lg btn-block btn-100"><i class="fa fa-shopping-cart"></i> ¡Comprar ya!</button>

            </article>
        </section>

        <section class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="caracteristicas-tab" data-bs-toggle="tab" data-bs-target="#caracteristicas" type="button" role="tab" aria-controls="caracteristicas" aria-selected="true">Características</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">Videos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="especificaciones-tab" data-bs-toggle="tab" data-bs-target="#especificaciones" type="button" role="tab" aria-controls="especificaciones" aria-selected="false">Especificaciones</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab">
                        <div class='d-flex justify-content-center'>
                            <div class="tab-padding">
                                <ul>
                                    <?php foreach ($data['caracteristicas'] as $caracteristica) { ?>
                                        <li><?= $caracteristica ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="tab-pane fade tab-padding" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                        <?php foreach ($data['videos'] as $video) { ?>
                            <div class="video">
                                <video controls muted>
                                    <source src='<?= $video->link ?>' type='video/mp4'>
                                    <track src="subtitulos.vtt" kind="subtitles" srclang="es" label="Español">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="especificaciones" role="tabpanel" aria-labelledby="especificaciones-tab">
                        <div class='d-flex justify-content-center'>
                            <div class='tab-padding'>
                                <h3>Especificaciones</h3>
                                <table>
                                    <?php foreach ($data['especificaciones'] as $specification) { ?>
                                        <tr>
                                            <th class='key'><?= $specification->name ?></th>
                                            <td><?= $specification->value ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   

        <section class='imagen-grande'>
            <div class='wrapper-boton-cerrar'><i class='boton-cerrar fa-solid fa-xmark'></i></div>
            <div class='img-show'>
                <img src=''>
            </div>
        </section>
    </main>
    <script src='./public/js/jquery.min.js'></script>
    <script>
        jQuery($ => {

            $('.sum').click(e => {
                $('#cantidad').val(+$('#cantidad').val() + 1);

                if (+$('#cantidad').val() == 10) {
                    $('.sum').prop("disabled", true);
                }

                if (+$('#cantidad').val() > 1) {
                    $('.rest').prop("disabled", false);
                }
            });

            $('.rest').click(e => {
                $('#cantidad').val(+$('#cantidad').val() - 1);

                if (+$('#cantidad').val() == 1) {
                    $('.rest').prop("disabled", true);
                }

                if (+$('#cantidad').val() < 10) {
                    $('.sum').prop("disabled", false);
                }
            });

        })
    </script>

<?php } ?>

<?php require('./pintar.php'); ?>