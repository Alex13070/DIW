<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?= $tabLogo ?>
    <title><?= $titulo ?></title>

    <?php foreach ($styles as $style) {
        print_r($style);
    }?>

</head>
<body>

    <?php cabecera(); ?>

    <?php mainContent($data); ?>

    <?php footer(); ?>

    <?php foreach ($scripts as $script) {
        print_r($script);
    }?>    
</body>
</html>