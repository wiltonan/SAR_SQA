<?php
require_once '../../model/connection.php';
require_once '../../model/horas_extras.php';
$sth=horas_extras::Consulta_cliente();
 ?>
 <script type="text/javascript">
      function modificar_Cliente(modificar_Cliente) {
        $(".administrador").load("../sections/modificar_Cliente.php?Actualizar_cliente="+modificar_Cliente+"");
     }

 </script>

 <section>

	<div class="consultar">

			<table class="display" cellspacing="0" width="100%" id="Tabla">

			    	<thead>

			    <center><h1 class="">Consulta cliente </h1></center>

			        <tr>

                <td>Gerente de proyectos</td>
               <td>Nombre Cliente</td>
               <td>Hora inicio</td>
               <td>Hora fin</td>
               <td>Horas laboradas</td>
               <td>Modificar</td>
              </tr>

			    </thead>

			    <tbody id="">

				   	<?php foreach ($sth as $ver): ?>

				    	<tr>

				            <td><?php echo utf8_encode($ver[1]);?></td>
				            <td><?php echo utf8_encode($ver[2]);?></td>
				            <td><?php echo utf8_encode($ver[3]);?></td>
				            <td><?php echo utf8_encode($ver[4]);?></td>
				            <td><?php echo utf8_encode($ver[5]);?></td>

                    <td>

			                <span style="cursor: pointer;"
                      onclick="modificar_Cliente(<?php echo $ver[0];?>)">actualizar</span>

			             	</td>

				    	</tr>

				    <?php endforeach ?>

			    </tbody>


			</table>

	</div>

</section>
<!--<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/dataTables.min.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {
    $("#Tabla").DataTable({
    	language: { paginate: { first: "Primera", previous: "Anterior",
			next: "Siguiente", last: "Anterior" }, processing: "Cargando datos...",
			lengthMenu: "Mostrar _MENU_ Entradas", info: "Se muestran 1 de _MAX_ de un total de _TOTAL_" ,
			infoEmpty: "Mostradas 0 de _MAX_ entradas", "infoFiltered": "(filtrada a partir de _MAX_ registro)",
			 infoPostFix: "", loadingRecords: "Cargando...", "zeroRecords": "Ninguno encontrada - Disculpa :/",
			 emptyTable: "No hay ninguna", search: "Buscar:" }
		});

	} );
</script>
