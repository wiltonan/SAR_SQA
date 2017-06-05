<?php
require_once'../../model/connection.php';
require_once'../../model/capacidad.php';

$reg=capacidad::Consult_Capacidad();

?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
     function actualiza(a) {
       $(".administrador").load("../sections/Act_Capacidad.php?hola="+a+"");
    }
</script>

            <h1 id="info">Informe de capacidad</h1>

<div id="bajar">


            <table class=" display nowrap table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="example" >

                <thead >
                    <tr>
                        <th>Ciudad</th>
                        <th>Nombre completo</th><!--Estado-->
                        <th># Cédula</th>
                        <th>Cargo</th>
                        <th>Rol</th>
                        <th>Cliente asignado al 30 del mes</th>
                        <th>Ubicación fisica</thutf8_encode(>
                        <th>Novedad respecto al mes anterior</th>
                        <th>Gerente de proyectos</th>
                        <th>Factura ?</th>
                        <th>Facturación</th>
                        <th>Modelo de servicio</th>
                        <th>Observaciones</th>
                        <th>Actualizar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reg as $regis): ?>
                    	<tr>
                    		<td><?php echo utf8_encode($regis[0]);?> </td>
                    		<td><?php echo utf8_encode($regis[1]);?> </td>
                    		<td><?php echo utf8_encode($regis[2]);?> </td>
                            <td><?php echo utf8_encode($regis[3]);?> </td>
                            <td><?php echo utf8_encode($regis[4]);?> </td>
                            <td><?php echo utf8_encode($regis[5]);?> </td>
                            <td><?php echo utf8_encode($regis[6]);?> </td>
                            <td><?php echo utf8_encode($regis[7]);?> </td>
                            <td><?php echo utf8_encode($regis[8]);?> </td>
                            <td><?php echo utf8_encode($regis[9]);?> </td>
                            <td><?php echo utf8_encode($regis[10]);?> </td>
                            <td><?php echo utf8_encode($regis[11]);?> </td>
                            <td><?php echo utf8_encode($regis[12]);?> </td>


                        <!--     <td>
                                <a href="?hola=<?php echo $regis[13];?>">
                                <i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </td> -->


                             <td>
                                <span style="cursor: pointer;" onclick="actualiza(<?php echo $regis[13];?>)">Actualizar</span>
                            </td>

                    	</tr>
                    <?php endforeach ?>
                <tbody>

            </table>
            </div>

<script type="text/javascript">
$(document).ready(function() {

  var table = $('#example').DataTable({
     scrollX: true,
     language:
     {

       search: "Buscar",
       processing: "Procesando...",
       lengthMenu: "Mostrar _MENU_ registros",
       zeroRecords: "No se encontraron resultados",
       emptyTable: 'Ningún registro encontrado', info: 'Mostrando <b>_START_</b> de <b>_END_</b> de un total de <b>_TOTAL_</b> registros',
       infoEmpty: 'Mostrando <b>0</b> de <b>0</b> de un total de <b>0</b> registros',
       infoFiltered: '(Filtrados de _MAX_ registros)',
       infoPostFix: '',
       paginate: {
       sPrevious: "Anterior",
       sNext: "Próximo" }, }
  });
});
</script>
