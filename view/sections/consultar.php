<?php 
    require_once '../../model/connection.php';
    require_once '../../model/hoja_vida.php';
    $tbl=hoja_vida::tbl_sr();
 ?>
<section>
	<div class="consultar">
	<!-- 	<form >
			<div class="Fltrs">
				<div class="row">
					<div class="input-field col m3 s12">
				      <input type="text" placeholder="Ingresa: Nombre o Cedula" id="bscr_nmbr_o_cdl">
				      <label class="active" for="">Buscar: </label>
				    </div>
				</div>
			</div>
		</form >
 -->
		<div class="mtbl">
			<table class="display" cellspacing="0" width="100%" id="example">
			    <thead>
			    <center><h1 class="nfrmcn_prsnl">Información del personal</h1></center>
			        <tr>
			            <th>Nombre</th>
			            <th>Apellido</th>
			            <th>Tipo documento</th>
			            <th>Cedula</th>
			            <th>Telefono</th>
			            <th>Celular</th>
			            <th>Ruta de anexos</th>
			            <th>Mas información</th>
			            <th>Cliente</th>
			        </tr>
			    </thead>
			    <tbody id="mstrr_sr">
			    <?php foreach ($tbl as $ver): ?>
			    	<tr>
			    		<td>	<?php echo $ver[1];?>	</td>
			    		<td>	<?php echo $ver[2];?>	</td>
			    		<td>	<?php echo $ver[7];?>	</td>
			    		<td>	<?php echo $ver[6];?>	</td>
			    		<td> 	<?php echo $ver[3];?>	</td>
			    		<td> 	<?php echo $ver[4];?>	</td>
			    		<td>
			    			<a href="<?php echo $ver[5]; ?>" target="blank">
			    				<i class="fa fa-eye fa-2x" aria-hidden="true"></i>
			    			</a>
			    		</td>

			    		<td>
		                    <a href="../sections/ver_form_hv.php?usuario=<?php echo $ver[0];?>" target="blank">
		                        <i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i>
		                    </a>
		                </td>
		                <td> 	<?php echo $ver[8];?>	</td>
			    	</tr>
			    	<?php endforeach ?>
			    </tbody>
			</table>
			<script type="text/javascript" src="../js/dataTables.min.js"></script>
			<script type="text/javascript">
			 	$(document).ready(function() {
				    $("#example").DataTable({ 
				    	language: { paginate: { first: "Primera", previous: "Anterior", next: "Siguiente", last: "Anterior" }, processing: "Cargando datos...", lengthMenu: "Mostrar _MENU_ Entradas", info: "Se muestran 1 de _MAX_ de un total de _TOTAL_" , infoEmpty: "Mostradas 0 de _MAX_ entradas", "infoFiltered": "(filtrada a partir de _MAX_ registro)", infoPostFix: "", loadingRecords: "Cargando...", "zeroRecords": "Ninguno encontrada - Disculpa :/", emptyTable: "No hay ninguna", search: "Buscar:" } 
					});
			   		
				} );

				$("#bscr_nmbr_o_cdl").keyup(function(){
					var cnsltr = $(this).val();
					$.post("../sections/cnslts.php",{vlr_prmtr: cnsltr}, function(data){
						$("#mstrr_sr").html(data)
					});
				});
			</script>
		</div>
	</div>
</section>
