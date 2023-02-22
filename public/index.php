<?php

require('./dependencias.php');

$titulo = "Inicio";

array_push(
    $styles,
    "<link rel='stylesheet' href='./css/index.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>"
);

array_push(
    $scripts,
    "<script src='./js/jquery.min.js'></script>",
    "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>",
    "<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>",
    "<script src='./js/index.js'></script>",
    "<script src='./js/slyder/next.js'></script>",
    "<script src='./js/slyder/sly.js'></script>",
    "<script src='./js/slyder/horisontal.js'></script>",
);


$data['titulo-1'] = "Teléfonos";
$data['slider-1'] = json_decode(file_get_contents('./json/telefonos.json'))->search_results;

$data['titulo-2'] = "Zapatos";
$data['slider-2'] = json_decode(file_get_contents('./json/zapatos.json'))->search_results;

$data['titulo-3'] = "Auriculares";
$data['slider-3'] = json_decode(file_get_contents('./json/auriculares.json'))->search_results;

$data['titulo-4'] = "Tarjetas gráficas";
$data['slider-4'] = json_decode(file_get_contents('./json/graficas.json'))->search_results;

$data['titulo-5'] = "Portátiles";
$data['slider-5'] = json_decode(file_get_contents('./json/portatiles.json'))->search_results;

$data['presentacion'] = [
    [
        'titulo' => 'Teléfonos',
        'texto' => '¿Estás interesado en comprarte un nuevo teléfono?¡Mira nuestro departamento de teléfonos!',
        'foto' => 'https://d500.epimg.net/cincodias/imagenes/2020/11/16/lifestyle/1605555641_363320_1605556525_noticia_normal.jpg',
        'link' => buscar . '?ver=telefonos',
        'alt' => 'teléfono'
    ],
    [
        'titulo' => 'Zapatos',
        'texto' => '¿Cansado de tu calzado habitual?¡Mira nuestro apartado de calzado!',
        'foto' => 'https://media.revistagq.com/photos/5fd1fdf7dfba54732a24bc13/16:9/w_1488,h_837,c_limit/zapatos%20de%20vestir.jpg',
        'link' => buscar . '?ver=zapatos',
        'alt' => 'zapatos'
    ],
    [
        'titulo' => 'Cascos',
        'texto' => 'Necesitas unos cascos nuevos?¡Mira nuestras opciones!',
        'foto' => 'https://imagenes.20minutos.es/files/og_thumbnail/uploads/imagenes/2020/11/04/principal-afiliacion-auriculares.jpeg',
        'link' => buscar . '?ver=cascos',
        'alt' => 'cascos'
    ],
    [
        'titulo' => 'Tarjetas gráficas',
        'texto' => '¿Estás pensando en montar un ordenador y necesitas una tarjeta gráfica?¡Mira nuestras ofertas!',
        'foto' => 'https://img.pccomponentes.com/pcblog/3866/elegir-tarjeta-grafica.jpg',
        'link' => buscar . '?ver=graficas',
        'alt' => 'tarjetas graficas'
    ],
    [
        'titulo' => 'Portátiles',
        'texto' => '¿Necesitas un portatil?¡Mira las opciones de nuestro departamento de ordenadores!',
        'foto' => 'https://phantom-expansion.unidadeditorial.es/7f163486198b4be37bf1ba009d863325/f/jpg/assets/multimedia/imagenes/2021/10/28/16354205780427.jpg',
        'link' => buscar . '?ver=portatiles',
        'alt' => 'portatiles'
    ],
]

?>
<?php function mainContent(array $data)
{ ?>
    <section class='superior'>
        <div class="color">
            <div class='blog-slider'>
                <div class='blog-slider__wrp swiper-wrapper'>
                    <?php foreach ($data['presentacion'] as $item) { ?>
                        <div class='blog-slider__item swiper-slide'>
                            <div class='blog-slider__img'>
                                <img src='<?= $item['foto'] ?>' alt='<?= $item['alt'] ?>'>
                            </div>
                            <div class='blog-slider__content'>
                                <div class='blog-slider__title'><?= $item['titulo'] ?></div>
                                <div class='blog-slider__text'><?= $item['texto'] ?></div>
                                <a href='<?= $item['link'] ?>' class='blog-slider__button'>Leer más</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class='blog-slider__pagination'></div>
            </div>
        </div>
    </section>
    <main class='contenido'>


        <section class=''>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class='slider'>
                    <h1><?= $data['titulo-' . $i] ?></h1>

                    <div class='frame centered' data-slide='<?= $i ?>'>
                        <ul>
                            <?php foreach ($data['slider-' . $i] as $element) { ?>
                                <li>
                                    <a href='<?= detalles . "?producto=" . $element->asin ?>'>
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