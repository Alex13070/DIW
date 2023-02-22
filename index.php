<?php

require('./dependencias.php');

$titulo = "Inicio";

array_push(
    $styles,
    "<link rel='stylesheet' href='./public/css/index.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>"
);

array_push(
    $scripts,
    "<script src='./public/js/jquery.min.js'></script>",
    "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>",
    "<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>",
    "<script src='./public/js/index.js'></script>",
    "<script src='./public/js/slyder/next.js'></script>",
    "<script src='./public/js/slyder/sly.js'></script>",
    "<script src='./public/js/slyder/horisontal.js'></script>",
);


$data['titulo-1'] = "Teléfonos";
$data['slider-1'] = json_decode(file_get_contents('./telefonos.json'))->search_results;

$data['titulo-2'] = "Zapatos";
$data['slider-2'] = json_decode(file_get_contents('./zapatos.json'))->search_results;

$data['titulo-3'] = "Auriculares";
$data['slider-3'] = json_decode(file_get_contents('./auriculares.json'))->search_results;

$data['titulo-4'] = "Tarjetas gráficas";
$data['slider-4'] = json_decode(file_get_contents('./graficas.json'))->search_results;

$data['titulo-5'] = "Portátiles";
$data['slider-5'] = json_decode(file_get_contents('./portatiles.json'))->search_results;

?>
<?php function mainContent(array $data) {?>
    <main class='contenido'>
        <section>
            <div class='blog-slider'>
                <div class='blog-slider__wrp swiper-wrapper'>
                    <div class='blog-slider__item swiper-slide'>
                        <div class='blog-slider__img'>

                            <img src='https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759872/kuldar-kalvik-799168-unsplash.webp' alt=''>
                        </div>
                        <div class='blog-slider__content'>
                            <span class='blog-slider__code'>26 December 2019</span>
                            <div class='blog-slider__title'>Lorem Ipsum Dolor</div>
                            <div class='blog-slider__text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Recusandae voluptate repellendus magni illo ea animi? </div>
                            <a href='#' class='blog-slider__button'>READ MORE</a>
                        </div>
                    </div>
                    <div class='blog-slider__item swiper-slide'>
                        <div class='blog-slider__img'>
                            <img src='https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/jason-leung-798979-unsplash.webp' alt=''>
                        </div>
                        <div class='blog-slider__content'>
                            <span class='blog-slider__code'>26 December 2019</span>
                            <div class='blog-slider__title'>Lorem Ipsum Dolor2</div>
                            <div class='blog-slider__text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Recusandae voluptate repellendus magni illo ea animi?</div>
                            <a href='#' class='blog-slider__button'>READ MORE</a>
                        </div>
                    </div>

                    <div class='blog-slider__item swiper-slide'>
                        <div class='blog-slider__img'>
                            <img src='https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/alessandro-capuzzi-799180-unsplash.webp' alt=''>
                        </div>
                        <div class='blog-slider__content'>
                            <span class='blog-slider__code'>26 December 2019</span>
                            <div class='blog-slider__title'>Lorem Ipsum Dolor</div>
                            <div class='blog-slider__text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Recusandae voluptate repellendus magni illo ea animi?</div>
                            <a href='#' class='blog-slider__button'>READ MORE</a>
                        </div>
                    </div>

                    <div class='blog-slider__item swiper-slide'>
                        <div class='blog-slider__img'>

                            <img src='https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759872/kuldar-kalvik-799168-unsplash.webp' alt=''>
                        </div>
                        <div class='blog-slider__content'>
                            <span class='blog-slider__code'>26 December 2019</span>
                            <div class='blog-slider__title'>Lorem Ipsum Dolor</div>
                            <div class='blog-slider__text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Recusandae voluptate repellendus magni illo ea animi? </div>
                            <a href='#' class='blog-slider__button'>READ MORE</a>
                        </div>
                    </div>

                    <div class='blog-slider__item swiper-slide'>
                        <div class='blog-slider__img'>

                            <img src='https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759872/kuldar-kalvik-799168-unsplash.webp' alt=''>
                        </div>
                        <div class='blog-slider__content'>
                            <span class='blog-slider__code'>26 December 2019</span>
                            <div class='blog-slider__title'>Lorem Ipsum Dolor</div>
                            <div class='blog-slider__text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Recusandae voluptate repellendus magni illo ea animi? </div>
                            <a href='#' class='blog-slider__button'>READ MORE</a>
                        </div>
                    </div>

                </div>
                <div class='blog-slider__pagination'></div>
            </div>
        </section>

        <section class=''>

            <?php for($i = 1; $i <= 5; $i++) { ?>
                <div class='slider'>
                    <h1><?= $data['titulo-'.$i] ?></h1>

                    <div class='frame centered' data-slide='<?= $i ?>'>
                        <ul>
                            <?php foreach ($data['slider-'.$i] as $element) { ?>
                                <li>
                                    <a href='<?= detalles."?producto=".$element->asin ?>'>
                                        <div class='col'>
                                            <div class='card shadow-sm'>
                                                <div class='card-img-top imagen'>
                                                    <img class='' src='<?= $element->image ?>' alt='<?= $element->title ?>'>
                                                </div>
                                                <div class='card-body'>
                                                    <h4 class='card-title texto'><?= $element->title ?></h4>
                                                    <p class='card-text'><?= isset($element->price->name) ? $element->price->name : 'Sin existencias' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class='controls center'>
                        <button class='btn prev btn-outline-dark' data-slide='<?= $i ?>'><i class='fa-solid fa-chevron-left'></i></button>
                        <button class='btn next btn-outline-dark' data-slide='<?= $i ?>'><i class='fa-solid fa-chevron-right'></i></button>
                    </div>
                </div>
            <?php } ?>
        </section>
    </main>
<?php } ?>

<?php require('./pintar.php'); ?>
