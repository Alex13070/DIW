<?php

// $data = json_decode(file_get_contents('./busqueda.json'));
require('./dependencias.php');

$titulo = "Buscar";

array_push(
    $styles,
    "<link rel='stylesheet' href='./css/pagina-busqueda.css'>"
);

array_push(
    $scripts,
);

if (isset($_GET['ver'])) {
    $array = [
        'telefonos' => './json/telefonos.json',
        'portatiles' => './json/portatiles.json',
        'graficas' => './json/graficas.json',
        'cascos' => './json/auriculares.json',
        'zapatos' => './json/zapatos.json',
    ];

    $doc = $array[$_GET['ver']] ?? './json/telefonos.json';
}
else {
    $doc = './json/telefonos.json';
}

$data['productos'] = json_decode(file_get_contents($doc))->search_results;

?>

<?php function mainContent(array $data) { ?>
    <main>
        <div class='container productos-busqueda'>
            <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
                <?php foreach ($data['productos'] as $element) { ?>
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
                <?php } ?>
            </div>

            <div class='row paginacion'>
                    <div class='col d-flex justify-content-center'>
                        <ul class='pagination'>
                            <li class='flecha-izq'><a href='#'>«</a></li>
                            <li><a href='#' class='active'>1</a></li>
                            <li><a href='#'>2</a></li>
                            <li><a href='#'>3</a></li>
                            <li><a href='#'>4</a></li>
                            <li><a href='#'>5</a></li>
                            <li class='flecha-der'><a href='#'>»</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </main>
<?php } ?>

<?php require('./pintar.php') ?>