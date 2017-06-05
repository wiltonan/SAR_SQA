<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="view/plugins/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="view/css/main.css" type="text/css">
</head>
<body class="blue lighten-4">
	<div class="row">
		<div class="col m12 s12">
			<img src="view/images/logo.png" class="responsive-img" alt="Logo" id="logo">
			<div id="bglog">
				<div class="row">
					<form action="controller/login.controller.php" method="POST">
						<div class="col m12 s12 input-field">
							<input type="text" name="txtusname" id="txtusname" required>
							<label for="" class=" black-text">Usuario</label>
						</div>

						<div class="col m12 s12 input-field">
							<input type="password" name="txtkey" required>
							<label for="" class=" black-text">Contraseña</label>
							<br>
						</div>
						<button class="btn" name="action" value="login" >Iniciar sesión</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p>
			Medellín: Teléfono: (57-4) 448 8567 - Dirección: Cra 43 B Nº 9-33 / Parque El Poblado
			<br>
			Bogotá: Teléfono: (57-1) 805 30 40 - Dirección: Calle 94 A Nº 11ª-39 Of 206
			<br>
			2017 ©SQA. Todos los derechos reservados.
			<br>
			<a href="http://www.sqasa.com/SQA_ProteccionDatosPersonales.pdf" target="blank">Conoce nuestra Politica de Proteccion de Datos Personales</a>
		</p>
	</footer>
	<!-- jquery -->
	<script src="view/js/jquery-3.1.1.min.js"></script>
	<!-- materialize -->
	<script src="view/plugins/materialize/js/materialize.min.js"></script>
</body>
</html>
