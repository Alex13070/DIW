<?php 

$data = json_decode(file_get_contents('./detalles.json'));
$data = $data->product
// search_results
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de producto</title>
    <link rel="website icon" type="png" href="./public/img/logoEditado.png">
    <link rel="stylesheet" href="./public/css/bootstrap.css">


    <!-- navbar -->
    <link rel="stylesheet" href="./public/css/barra-buscadora.css">
    <link rel="stylesheet" href="./public/css/header.css">

    <!-- Detalles de producto -->
    <link rel="stylesheet" type="text/css" href="./public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'>
    <link rel="stylesheet" href="./public/css/detalles-producto.css">
</head>

<body>
    <header>
        <nav class="topnav" id="myTopnav">
            <div class="nav-item align-left">
                <div class="centrar-nav">
                    <a href="#home" class="active"><img class="logo" src="./public/img/logoEditado.png" alt="logo"></a>
                </div>
            </div>

            <div class="nav-item centro">
                <div class="centrar-nav ">
                    <div class="caja-buscador">
                        <form action="Buscar.php" method="get" class="buscador">
                            <input id="search" type="search" placeholder="Escriba el producto que quiere buscar" autofocus required />
                            <button class="buscador-enviar" type="submit"><i class="fa fa-search text-white icono-buscar"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="nav-item align-left">
                <div class="centrar-nav">
                    <a href="#news"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>

            <div class="nav-item align-right">
                <div class="centrar-nav">
                    <a href="#about">Registrate</a>
                </div>
            </div>

            <div class="nav-item align-right">
                <div class="centrar-nav">
                    <a href="#about">Inicia sesión</a>
                </div>
            </div>

            <div class="icon nav-item">
                <div class="centrar-nav">
                    <button class="boton-menu-responsive" onclick="javascript:responsiveHeader()"><i class="fa fa-bars"></i></button>
                </div>
            </div>
        </nav>
    </header>

    <main class="contenido">
        <section class="row producto">
            <article class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- <div class="swiper-slide">
                            <div class="background-image">
                                <img class="background-image__image" src="<?= $data->main_image->link ?>" alt="A random unsplash image" />
                            </div>
                        </div> -->

                        <?php foreach($data->images as $imagen) {?>
                            <div class="swiper-slide">
                                <div class="background-image">
                                    <img class="background-image__image" src="<?= $imagen->link ?>" alt="A random unsplash image" />
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </article>

            <article class="col-md-6 texto-producto">
                <div class="card p-3">
                    <!-- detalles de producto -->
                    <h1><?= $data->title ?></h1>

                    <h2 class="precios"><?= $data->buybox_winner->price->value . ' ' . $data->buybox_winner->price->symbol ?></h2>

                    <div class="descripcion">
                        <?= $data->feature_bullets_flat ?>
                    </div>

                    <?php if (isset($data->videos_flat)) {?>

                        <video controls muted>
                            <source src="<?= $data->videos_flat ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php }?>

                    
                </div>
            </article>
        </section>

        <section class="row opciones-de-compra">
            <div class="col wrapper-formulario-compra card">
                <h3>Opciones de Compra</h3>
                <form class="formulario-compra">
                    <div class="row justify-content-center p-1">
                        <div class="col-md-2 label-compra">
                            <label for="cantidad">Cantidad:<label>
                        </div>
                        <div class="col-md-4 campo-compra">
                            <input class="form-control" type="number" id="cantidad" name="cantidad" min="1" max="10"
                                value="1">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 campo-compra">
                            <input class="btn btn-success" type="submit" value="Agregar al Carrito">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if  (isset($data->specifications)) { ?>
            <section class="d-flex justify-content-center">
                <div class="">
                    <h3>Especificaciones</h3>
                    <table>
                        <?php foreach($data->specifications as $specification) {?>
                            <tr>
                                <th class="key"><?= $specification->name ?></th>
                                <td><?= $specification->value ?></td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </section>
        <?php } ?>

    </main>

    <div class="show">
        <div class="wrapper-boton-cerrar"><i class="boton-cerrar fa-solid fa-xmark"></i></div>
        <div class="img-show">
            <img src="">
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="centrar">
            <div class="container p-4">

                <!-- Redes sociales -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-google"></i>
                    </a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-github"></i></a>
                </section>
                <!-- Redes sociales -->

                <!-- Fprmulario suscripción -->
                <section class="">
                    <form action="">
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>Suscríbete a nuestro boletín</strong>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="form5Example21" class="form-control" />
                                    <label class="form-label" for="form5Example21">Dirección de correo</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-auto">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Suscribirse
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Fprmulario suscripción -->

                <!-- Carta de presentación -->
                <section class="mb-4">
                    <p class="mb-4">
                        En nuestra tienda en línea, encontrará una amplia selección de productos de las mejores marcas, con precios competitivos y una interfaz fácil de usar para facilitar su búsqueda y compra. Además, ofrecemos un servicio de atención al cliente excepcional, con agentes disponibles para responder cualquier pregunta o inquietud que pueda tener antes, durante y después de su compra.
                    </p>
                </section>
                <!-- Carta de presentación -->

               
            </div>
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="#">type100.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/script.js"></script>
    <script src="./public/js/fontAwesome.js" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'></script>
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/pagina-detalles.js"></script>
    


</body>

</html>