<?php 

session_start();

$titulo = "";

$buscador = true;
$extras = true;

$tabLogo = "<link rel='website icon' type='png' href='./img/logo_final.png'>";

$styles = [
    "<link rel='stylesheet' href='./css/styles.css'>",
    "<link rel='stylesheet' href='./css/bootstrap.css'>"
];

$scripts = [
    "<script src='./js/fontAwesome.js'></script>",
    "<script src='./js/bootstrap.min.js'></script>",
    "<script src='./js/audio.js'></script>",
];

$data = [];


const index = "http://localhost:8000/index.php";
const buscar = "http://localhost:8000/buscar.php";
const carrito = "http://localhost:8000/carrito.php";
const registro = "http://localhost:8000/registro.php";
const login = "http://localhost:8000/login.php";
const detalles = "http://localhost:8000/detalles.php";
const logout = "http://localhost:8000/logout.php";


require('./header.php');
require('./footer.php');


?>



