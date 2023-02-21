<?php

array_push(
    $styles,
    "<link rel='stylesheet' href='./public/css/barra-buscadora.css'>",
    "<link rel='stylesheet' href='./public/css/header.css'>",
);

array_push(
    $scripts,
    "<script src='./public/js/script.js'></script>"
);
function cabecera() { ?>
<header>
    <nav class="topnav" id="myTopnav">
        <div class="nav-item align-left">
            <div class="centrar-nav">
                <a href="<?= index ?>"><img class="logo" src="./public/img/logo_final_sin_fondo.png" alt="logo"></a>
            </div>
        </div>

        <div class="nav-item centro">
            <div class="centrar-nav ">
                <div class="caja-buscador">
                    <form action="<?= buscar ?>" method="get" class="buscador">
                        <input id="search" type="search" placeholder="Escriba el producto que quiere buscar" autofocus required name="busqueda"/>
                        <button class="buscador-enviar" type="submit"><i class="fa fa-search text-white icono-buscar"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="nav-item align-left">
            <div class="centrar-nav">
                <a href="<?= carrito ?>"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="nav-item align-right">
            <div class="centrar-nav">
                <a href="<?= registro ?>">Registrate</a>
            </div>
        </div>

        <div class="nav-item align-right">
            <div class="centrar-nav">
                <a href="<?= login ?>">Inicia sesión</a>
            </div>
        </div>

        <div class="icon nav-item">
            <div class="centrar-nav">
                <button class="boton-menu-responsive" onclick="javascript:responsiveHeader()"><i class="fa fa-bars"></i></button>
            </div>
        </div>
    </nav>
</header>
<?php }?>