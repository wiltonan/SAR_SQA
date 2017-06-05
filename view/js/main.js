$(document).ready(function(){
	// Este es la parte del menu
	$("#consultar").click(function(){
		$(".cargas4").fadeIn();
		$(".cargas4").load("../sections/consultar.php");
	});

	$("#consultar").click(function(){
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/consultar.php");
	});

	$("#consultar").click(function(){
		$(".cargas1").fadeIn();
		$(".cargas1").load("../sections/consultar.php");
	});
	
	$("#crear").click(function(){
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/crear_cv.php");
	});

	$("#mi_hv").click(function(){
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/cv.php");
	});

	$("#Crear_usuario").click(function(){
		$(".cargas1").fadeIn();
		$(".cargas1").load("../sections/crear_usuario.php");
	});

	$("#personal").click(function(){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/personal.php");
	});

	$("#academico").click(function(){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/academica.php");
	});

	$("#laboral").click(function(){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/laboral.php");
	});

	// $("#ver_cv").click(function(){
	// 	$(".cargas3").fadeIn();
	// 	$(".cargas3").load("../sections/ver_form_hv.php")
	// });
	
	// hasta aqui la párte de los menus

	$("#selectorsqa").change(function(){
    var valor = $(this).val();
    if (valor=="Si") {
      alert("holas")
      // $("#btn1").css("display","block");
      // $("#btn2").css("display","block");
      // $("#btn3").css("display","block");
      }

    else{
      $("#btn1").css("display","none");
      $("#btn2").css("display","none");
      $("#btn3").css("display","none"); 
    }
  });
	
    url();
});
	

function url(){
	var URLhas = window.location.hash;
	// Este es la parte del menu
	if (URLhas=="#/consultar") {
		$(".cargas4").fadeIn();
		$(".cargas4").load("../sections/consultar.php");
	}

	if (URLhas=="#/consultar") {
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/consultar.php");
	}

	if (URLhas=="#/consultar") {
		$(".cargas1").fadeIn();
		$(".cargas1").load("../sections/consultar.php");
	}

	if (URLhas=="#/crear") {
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/crear_cv.php");
	}

	if (URLhas=="#/mi_hoja_de_vida") {
		$(".cargas2").fadeIn();
		$(".cargas2").load("../sections/cv.php");
	}

	if (URLhas=="#/Crear_usuario"){
		$(".cargas1").fadeIn();
		$(".cargas1").load("../sections/crear_usuario.php");
	}

	if (URLhas=="#/informaion_personal"){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/personal.php");
	}

	if (URLhas=="#/informaion_academica"){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/academica.php");
	}

	if (URLhas=="#/informaion_laboral"){
		$(".cargas3").fadeIn();
		$(".cargas3").load("../sections/laboral.php");
	}

	// if (URLhas=="#/ver_hoja_de_vida") {
	// 	$(".cargas3").fadeIn();
	// 	$(".cargas3").load("../sections/ver_form_hv.php");
	// }
	// hasta aqui la párte del menu

}





































// $(document).ready(function() {
//     $('#example').DataTable({
//       "language": {
//                     "sProcessing":     "Procesando...",
//                     "sLengthMenu":     "Mostrar _MENU_ registros",
//                     "sZeroRecords":    "No se encontraron resultados",
//                     "sEmptyTable":     "Ningún dato disponible en esta tabla",
//                     "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                     "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
//                     "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
//                     "sInfoPostFix":    "",
//                     "sSearch":         "Buscar:",
//                     "sUrl":            "",
//                     "sInfoThousands":  ",",
//                     "sLoadingRecords": "Cargando...",
//                     "oPaginate": {
//                         "sFirst":    "Primero",
//                         "sLast":     "Último",
//                         "sNext":     "Siguiente",
//                         "sPrevious": "Anterior"
//                     },
//                     "oAria": {
//                         "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
//                         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//                     }
//                 }
//     });
// } );