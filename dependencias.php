<?php 

session_start();

$_SESSION['iniciada'] = true;

$titulo = "";

$buscador = true;
$extras = true;

$tabLogo = "<link rel='website icon' type='png' href='./public/img/logo_final.png'>";

$styles = [
    "<link rel='stylesheet' href='./public/css/styles.css'>",
    "<link rel='stylesheet' href='./public/css/bootstrap.css'>"
];

$scripts = [
    "<script src='./public/js/fontAwesome.js'></script>",
    "<script src='./public/js/bootstrap.min.js'></script>",
    "<script src='./public/js/audio.js'></script>",
];

$data = [];


const index = "http://localhost:8000/index.php";
const buscar = "http://localhost:8000/buscar.php";
const carrito = "http://localhost:8000/carrito.php";
const registro = "";
const login = "";
const detalles = "http://localhost:8000/detalles.php";


require('./header.php');
require('./footer.php');


?>



