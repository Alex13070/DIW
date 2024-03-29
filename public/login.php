<?php 

session_start();

if (isset($_POST['submit'])) {
	$_SESSION['iniciada'] = true;
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login</title>
    <link rel='stylesheet' href='https://necolas.github.io/normalize.css/8.0.1/normalize.css'>
	<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'> 
	<link rel='stylesheet' href='./css/registro.css'>
</head>
<body>
    <main>
		<form action='login.php' method="post" class='formulario' id='formulario'>
			<!-- Grupo: Usuario -->
			<div class='formulario__grupo' id='grupo__usuario'>
				<label for='usuario' class='formulario__label'>Usuario</label>
				<div class='formulario__grupo-input'>
					<input type='text' class='formulario__input' name='usuario' id='usuario' placeholder='Ingrese su usuario'>
					<i class='formulario__validacion-estado fas fa-times-circle'></i>
				</div>
				<p class='formulario__input-error'>El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Contraseña -->
			<div class='formulario__grupo' id='grupo__password'>
				<label for='password' class='formulario__label'>Contraseña</label>
				<div class='formulario__grupo-input'>
					<input type='password' class='formulario__input' name='password' id='password' placeholder='Ingrese su contraseña'>
					<i class='formulario__validacion-estado fas fa-times-circle'></i>
				</div>
				<p class='formulario__input-error'>La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>

			<!-- Grupo: Terminos y Condiciones -->
			<div class='formulario__grupo' id='grupo__terminos'>
				<label class='formulario__label'>
					<input class='formulario__checkbox' type='checkbox' name='recuerdame' id='terminos'>
					Recuérdame
				</label>
			</div>

			<div class='formulario__mensaje' id='formulario__mensaje'>
				<p><i class='fas fa-exclamation-triangle'></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class='formulario__grupo formulario__grupo-btn-enviar'>
				<input type='submit' class='formulario__btn' value="Iniciar sesión" name="submit"/>
				<p class='formulario__mensaje-exito' id='formulario__mensaje-exito'>Formulario enviado exitosamente!</p>
			</div>
            
            <div class='barra nuevo'>
                <h3>¿Eres nuevo?</h3>
                <hr>
            </div>

            <div class='formulario__grupo formulario__grupo-btn-enviar'>
				<button class='formulario__btn'><a href='./registro.php'>Crear Cuenta</a></button>
			</div>
		</form>
	</main>

	<script src='./js/login.js'></script>
	<script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
</body>
</html>