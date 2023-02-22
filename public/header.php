<?php

array_push(
    $styles,
    "<link rel='stylesheet' href='./css/barra-buscadora.css'>",
    "<link rel='stylesheet' href='./css/header.css'>",
);

array_push(
    $scripts,
    "<script src='./js/script.js'></script>"
);
function cabecera(bool $buscador, bool $extras) { ?>
<header>
    <nav class="topnav" id="myTopnav">
        <div class="item-navegador align-left">
            <div class="centrar-nav">
                <a href="<?= index ?>"><img class="logo" src="./img/logo_final_sin_fondo.png" alt="logo"></a>
            </div>
        </div>

        <?php if ($buscador) { ?>
            <div class="item-navegador centro">
                <div class="centrar-nav ">
                    <div class="caja-buscador">
                        <form action="<?= buscar ?>" method="get" class="buscador">
                            <input id="search" type="search" placeholder="Escriba el producto que quiere buscar" autofocus required name="busqueda"/>
                            <button class="buscador-enviar" type="submit"><i class="fa fa-search text-white icono-buscar"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($extras) { ?>

            <?php if (isset($_SESSION['iniciada'])) { ?>
                <div class="item-navegador align-right">
                    <div class="centrar-nav">
                        <a href="<?= logout ?>">Cerrar sesión</i></a>
                    </div>
                </div>

                <div class="item-navegador align-right">
                    <div class="centrar-nav">
                        <a href="<?= carrito ?>"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="item-navegador align-right">
                    <div class="centrar-nav">
                        <a href="<?= registro ?>">Registrate</a>
                    </div>
                </div>

                <div class="item-navegador align-right">
                    <div class="centrar-nav">
                        <a href="<?= login ?>">Inicia sesión</a>
                    </div>
                </div>
            <?php }?>
        <?php } ?>

        <?php if ($extras || $buscador) { ?>
            <div class="icon item-navegador">
                <div class="centrar-nav">
                    <button class="boton-menu-responsive" onclick="javascript:responsiveHeader()"><i class="fa fa-bars"></i></button>
                </div>
            </div>
        <?php } ?>
    </nav>
</header>
<?php }?>