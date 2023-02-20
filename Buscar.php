<?php

$data = json_decode(file_get_contents('./busqueda.json'));



// search_results
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <link rel="website icon" type="png" href="./public/img/logoEditado.png">
    <link rel="stylesheet" href="./public/css/barra-buscadora.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/pagina-busqueda.css">
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

    <main>
        <div class="container productos-busqueda">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Prueba -->
                <?php foreach ($data->search_results as $element) { ?>
                    <a href="http://localhost:8000/Detalles.php?producto=<?= $element->asin ?>">
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-img-top imagen">
                                    <img class="" src="<?= $element->image ?>" alt="Imagen de noticia">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title texto"><?= $element->title ?></h4>
                                    <p class="card-text"><?= isset($element->price->name) ? $element->price->name : "Sin existencias" ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <div class="row paginacion">
                    <div class="col d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="flecha-izq"><a href="#">«</a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li class="flecha-der"><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </main>

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
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
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



    <script src="./public/js/fontAwesome.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>