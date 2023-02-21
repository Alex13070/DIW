<?php

require('./dependencias.php');

$data['producto'] = json_decode(file_get_contents('./detalles.json'))->product;

// search_results

$titulo = "Detalles";


array_push(
    $styles,
    "<link rel='stylesheet' type='text/css' href='./public/css/styles.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>",
    "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'>",
    "<link rel='stylesheet' href='./public/css/detalles-producto.css'>"
);

array_push(
    $scripts,
    "<script src='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'></script>",
    "<script src='./public/js/jquery.min.js'></script>",
    "<script src='./public/js/pagina-detalles.js'></script>"
);

?>

<?php function mainContent($data) { ?>
    <main class='contenido'>
        <section class='row producto'>
            <article class='col-md-6 d-flex justify-content-center align-items-center'>
                <div class='swiper mySwiper'>
                    <div class='swiper-wrapper'>
                        <?php foreach ($data['producto']->images as $imagen) { ?>
                            <div class='swiper-slide'>
                                <div class='background-image'>
                                    <img class='background-image__image' src='<?= $imagen->link ?>' alt='A random unsplash image' />
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
                <div class='card p-3'>
                    <!-- detalles de producto -->
                    <h1><?= $data['producto']->title ?></h1>

                    <h2 class='precios'><?= $data['producto']->buybox_winner->price->value . ' ' . $data['producto']->buybox_winner->price->symbol ?></h2>

                    <div class='descripcion'>
                        <?= $data['producto']->feature_bullets_flat ?>
                    </div>

                    <?php if (isset($data['producto']->videos_flat)) { ?>

                        <video controls muted>
                            <source src='<?= $data['producto']->videos_flat ?>' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    <?php } ?>


                </div>
            </article>
        </section>

        <section class='row opciones-de-compra'>
            <div class='col wrapper-formulario-compra card'>
                <h3>Opciones de Compra</h3>
                <form class='formulario-compra'>
                    <div class='row justify-content-center p-1'>
                        <div class='col-md-2 label-compra'>
                            <label for='cantidad'>Cantidad:<label>
                        </div>
                        <div class='col-md-4 campo-compra'>
                            <input class='form-control' type='number' id='cantidad' name='cantidad' min='1' max='10' value='1'>
                        </div>
                    </div>
                    <div class='row justify-content-center'>
                        <div class='col-md-4 campo-compra'>
                            <input class='btn btn-success' type='submit' value='Agregar al Carrito'>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if (isset($data['producto']->specifications)) { ?>
            <section class='d-flex justify-content-center'>
                <div class=''>
                    <h3>Especificaciones</h3>
                    <table>
                        <?php foreach ($data['producto']->specifications as $specification) { ?>
                            <tr>
                                <th class='key'><?= $specification->name ?></th>
                                <td><?= $specification->value ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </section>
        <?php } ?>

        <div class='show'>
            <div class='wrapper-boton-cerrar'><i class='boton-cerrar fa-solid fa-xmark'></i></div>
            <div class='img-show'>
                <img src=''>
            </div>
        </div>

    </main>

<?php } ?>

<?php require('./pintar.php'); ?>