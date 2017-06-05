<?php 
require_once'../../model/connection.php';
require_once'../../model/capacidad.php';

$reg=capacidad::Consulta_Historico();

?>
              
            <h1 id="info">Historico de informe de capacidad</h1>

<div id="bajar">


            <table class="display" cellspacing="0" width="100%" id="example">

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

   $("#example").DataTable({
    language: { paginate: { first: "Primera", previous: "Anterior",
next: "Siguiente", last: "Anterior" }, processing: "Cargando datos...",
lengthMenu: "Mostrar _MENU_ Entradas", info: "Se muestran 1 de _MAX_ de un total de _TOTAL_" ,
infoEmpty: "Mostradas 0 de _MAX_ entradas", "infoFiltered": "(filtrada a partir de _MAX_ registro)",
infoPostFix: "", loadingRecords: "Cargando...", "zeroRecords": "Ninguno encontrada - Disculpa :/",
emptyTable: "No hay ninguna", search: "Buscar:" }
});




});
</script>