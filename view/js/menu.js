$(document).ready(function(){

	$('#consultar').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/consultar.php");
		$('#inicio').fadeOut();
	});

	$('#usuario_crear').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/crear_usuario.php");
		$('#inicio').fadeOut();
	});

	$('#asignar_cv').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/crear_cv.php");
		$('#inicio').fadeOut();
	});

	$('#agre_estudio').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/academica.php");
		$('#inicio').fadeOut();
	});

	$('#agre_expe_labor').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/laboral.php");
		$('#inicio').fadeOut();
	});

	$('#Datos_personales').click(function(){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/personal.php");
		$('#inicio').fadeOut();
	});


	$('#consul_capacidad').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/consul_capacidad.php");
	});

	$('#act_Capacidad').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Act_Capacidad.php");
	});
	$('#consul_historico').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/historico.php");
	});

	$('#con_historico').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/historico.php");
	});

	$('#consultar_analista').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Consulta_Analista.php");
	});

	$('#consultar_cliente').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Consultar_Cliente.php");
	});
	$('#Consulta_Horas').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Consulta_horas1.php");
	});
	$('#Registrar').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Registro_Cliente.php");
	});

	$('#registrarrecargo').click(function () {
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('administrador').load("../sections/registrarrecargo.php");
	})
	$('#actualizar').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/modificar_cliente.php");
	});
	$('#cargararchivo').click(function(){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/importar_archivo.php");
	});
		url();
	});

function url(){
	var URLhas = window.location.hash;

	if(URLhas=="#/consul_capacidad"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/consul_capacidad.php");
	}
	if(URLhas=="#/act_Capacidad"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Act_Capacidad.php");
	}
	if(URLhas=="#/consul_historico"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/historico.php");
	}

	if(URLhas=="#/consultar"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/consultar.php");
		$('#inicio').fadeOut();
	}
	if(URLhas=="#/usuario_crear"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/crear_usuario.php");
		$('#inicio').fadeOut();
	}
	if(URLhas=="#/asignar_cv"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/crear_cv.php");
		$('#inicio').fadeOut();
	}
	if(URLhas=="#/agregar_estudio"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/academica.php");
		$('#inicio').fadeOut();
	}
	if(URLhas=="#/Agregar_experiencia_laboral"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/laboral.php");
		$('#inicio').fadeOut();
	}
	if(URLhas=="#/Datos_personales"){
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/personal.php");
		$('#inicio').fadeOut();
	}


	if(URLhas=="#/consultar_analista"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Consulta_Analista.php");
	}
	if(URLhas=="#/Consulta_Horas"){
			$('#inicio').fadeOut();
			$('.administrador').fadeIn();
			$('.administrador').load("../sections/Consulta_horas1.php");
		}
	if(URLhas=="#/consultar_cliente"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Consultar_Cliente.php");
	}
	if(URLhas=="#/Registrar"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/Registro_Cliente.php");
	}
	if(URLhas=="#/actualizar"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/modificar_cliente.php");
	}
	if(URLhas=="#/cargararchivo"){
		$('#inicio').fadeOut();
		$('.administrador').fadeIn();
		$('.administrador').load("../sections/importar_archivo.php");
	}
	}

	function inicio(){
		$('.administrador').fadeOut();
		$('#inicio').fadeIn();
	}
