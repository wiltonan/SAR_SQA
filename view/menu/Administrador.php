<?php
  session_start();
  ob_start();
  $my_codigo=$_SESSION['codigo'];
  if (!isset($_SESSION['nombre'])) {
    header("location:../../");
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Menu</title>
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/menu_admin.css">
    <link rel="stylesheet" type="text/css" href="../css/cv.css">
    <link rel="stylesheet" type="text/css" href="../css/scapacidad.css">
  <link rel="stylesheet" type="text/css" href="../css/dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/HorasExtras1.css">
	</head>
	<body style="background: #bbdefb;"  >
		<div class="el_menu" style="background-color: green;">
			<header class="navar">
				<div id="menu">

				<div class="inicio">
					<i style="color:#EBE4D8;" class="fa fa-home fa-fw" onclick="inicio()"><a style="color:#EBE4D8;" href="#/inicio">Inicio</a></i>
				</div>

					<div class="sesion">
						<a style="color:#EBE4D8;" href="../../controller/login.controller.php?action=session" >Cerrar sesion</a>
					</div>
					<ul class="nav">
						<li class="dropdown">

							<div style="color:#EBE4D8;" class="menu">
								<a style="color:#EBE4D8;" href="#!">Menu</a>
								<i style="color:#EBE4D8;" class="caret"></i>
							</div>

              <ul class="dropdown-menu">

          <li class="dropdown">
            <a  class="dropdown-toggle">
              <i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;Informe capacidad
              <b class=""></b>
            </a>

            <ul class="dropdown-menu">
              <li id="consul_capacidad">
        									<a href="#/consul_capacidad">
        										<i class="fa fa-search " aria-hidden="true" ></i>&nbsp;Consultar
        									</a>
        								</li>

        								<li id="consul_historico" class="dropdown">
        									<a href="#/consul_historico" class="dropdown-toggle">
        										<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Auditoria
        									</a>
        								</li>
            </ul>
          </li>

          <li class="dropdown">

							<a  class="dropdown-toggle">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
								&nbsp;Horas extras
							</a>
							<ul class="dropdown-menu">
                <li id="cargararchivo">
                  <a href="#/cargararchivo">
                    <i class="fa fa-road" aria-hidden="true"></i>
                    &nbsp;Cargar archivo
                  </a>
                </li>


                <li id="consultar_analista">
                  <a href="#/consultar_analista">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;Consultar analista
                  </a>
                </li>




								<li id="consultar_cliente">
									<a href="#/consultar_cliente">
										<i class="fa fa-search" aria-hidden="true"></i>
										&nbsp;Consultar cliente
									</a>
								</li>

								<li id="Registrar">
									<a href="#/Registrar">
										<i class="fa fa-plus" aria-hidden="true"></i>
										&nbsp;Registrar cliente
									</a>
								</li>
							</ul>
						</li>

          <li class="dropdown">

            <a  class="dropdown-toggle">
              <i class="fa fa-address-card-o" aria-hidden="true"></i>
              &nbsp;Hoja de vida
            </a>

            <ul class="dropdown-menu">
              <li id="consultar">
                <a href="#/consultar">
                  <i class="fa fa-download" aria-hidden="true"></i>
                  &nbsp;Consultar usuarios
                </a>
              </li>

              <li id="usuario_crear">
                <a href="#/usuario_crear">
                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                  &nbsp;Crear usuario
                </a>
              </li>

              <li id="asignar_cv">
                <a href="#/asignar_cv">
                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                  &nbsp;Asignar hoja de vida
                </a>
              </li>

              <li class="dropdown">
                <a  class="dropdown-toggle">
                  <i class="fa fa-address-card-o" aria-hidden="true"></i>
                  &nbsp; Mis datos
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a target="_blank" href="../sections/ver_form_hv.php?usuario=<?php echo $my_codigo ?>">&nbsp; Mis hoja de vida
                    </a>
                  </li>

                  <li id="Datos_personales">
                    <a href="#/Datos_personales">
                      <i class="fa fa-check-square-o" aria-hidden="true"></i>
                      &nbsp; Datos personales
                    </a>
                  </li>
                  <li id="agre_estudio">
                    <a href="#/agregar_estudio">
                      <i class="fa fa-check-square-o" aria-hidden="true"></i>
                      &nbsp;Agregar estudio
                    </a>
                  </li>

                  <li id="agre_expe_labor">
                    <a href="#/Agregar_experiencia_laboral">
                      <i class="fa fa-check-square-o" aria-hidden="true"></i>
                      &nbsp;Agregar experiencia laboral
                    </a>
                  </li>

                </ul>
              </li>

              </ul>
              </li>

              <li class="dropdown">
              <a  class="dropdown-toggle">
              <i class="fa fa-users" aria-hidden="true"></i>
              &nbsp;Cuenta de usuarios
              <b class="caret right"></b>
              </a>

              <ul class="dropdown-menu">
              <li>
                <a href="">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  &nbsp;Consultar
                </a>
              </li>

              <li>
                <a href="">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                  &nbsp;Actualizar
                </a>
              </li>

              <li>
                <a href="">
                  <i class="fa fa-plus" aria-hidden="true">
                  </i>&nbsp;Registrar
                </a>
              </li>


        </ul>
      </li>
    </ul>
				</div>
			</header>
		</div>
		<section class="administrador">
		</section>

		<section id="inicio">
			<?php include '../sections/inicio.php'; ?>
		</section>
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="../js/menuresponsive.js"></script>
    <script type="text/javascript" src="../js/dataTables.min.js"></script>
    <script type="text/javascript" src="../js/datepicker.js" ></script>
    <script type="text/javascript" src="../js/horas_extras.js" ></script>
	</body>
</html>
