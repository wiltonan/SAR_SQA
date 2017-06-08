<?php
require_once'../../model/connection.php';
require_once'../../model/capacidad.php';

$reg=capacidad::Consulta_Historico();

?>
  <!-- <link rel="stylesheet" typ e="text/css" href="//cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">         -->
            <center><h2 id="info" style="margin-top:-5px; margin-left:80px;">Historico</h2></center>

<div id="bajar" style="margin-top:100px;">
            <table class="display nowrap table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="example">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>action</th>
                        <th>Fecha Registro</th>
                        <th>Nombre anterior</th>
                        <th>Nombre actual</th>
                        <th>Apellido anterior</th>
                        <th>Apellido actual</th>
                        <th>Factura ? anterior</th>
                        <th>Factura ? actual</th>
                        <th>Facturación anterior</th>
                        <th>Facturación actual</th>
                        <th>Ubicacion</th>
                        <th>Ubicacion</th>
                        <th>Observacion anterior</th>
                        <th>Observacion actual</th>


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
                            <td><?php echo utf8_encode($regis[13]);?> </td>
                            <td><?php echo utf8_encode($regis[14]);?> </td>




                        <!--     <td>
                                <a href="?hola=<?php echo $regis[13];?>">
                                <i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </td> -->

                    	</tr>
                    <?php endforeach ?>
                <tbody>

            </table>
            </div>
<script type="text/javascript">
$(document).ready(function() {
      var table = $('#example').DataTable({
      scrollX: true,
      language: { search: "Buscar", processing: "Procesando...", lengthMenu: "Mostrar _MENU_ registros", zeroRecords: "No se encontraron resultados", emptyTable: 'Ningún registro encontrado', info: 'Mostrando <b>_START_</b> de <b>_END_</b> de un total de <b>_TOTAL_</b> registros', infoEmpty: 'Mostrando <b>0</b> de <b>0</b> de un total de <b>0</b> registros', infoFiltered: '(Filtrados de _MAX_ registros)', infoPostFix: '', paginate: { sPrevious: "Anterior", sNext: "Próximo" } }

});

});
</script>
