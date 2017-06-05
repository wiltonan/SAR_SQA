<?php
require_once'../../model/connection.php';
require_once'../../model/capacidad.php';

$ver=capacidad::Consulta_Persona();

?>

<script type="text/javascript">
     function actualiza(a) {
       $(".administrador").load("../sections/Act_Capacidad.php?hola="+a+"");
    }
</script>

      <h1 id="titlo">Analistas</h1>

<div id="bajar" >


            <table class="display" cellspacing="0" width="100%" id="example">

                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Nombre completo</th><!--Estado-->
                        <th># Cédula</th>
                        <th>Usuario</th>
                        <th>Cargo</th>
                        <th>Historico</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ver as $consul): ?>
                    	<tr>
                    		<td><?php echo utf8_encode($consul[0]);?> </td>
                    		<td><?php echo utf8_encode($consul[1]);?> </td>
                    		<td><?php echo utf8_encode($consul[2]);?> </td>
                            <td><?php echo utf8_encode($consul[3]);?> </td>
                            <td><?php echo utf8_encode($consul[4]);?> </td>

                        <!--     <td>
                                <a href="?hola=<?php echo $regis[13];?>">
                                <i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </td> -->


                             <td>
                                <span style="cursor: pointer;" onclick="actualiza(<?php echo $consul[13];?>)">Consultar</span>
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
                 language: { search: "Buscar",
                 processing: "Procesando...",
                 lengthMenu: "Mostrar _MENU_ registros",
                 zeroRecords: "No se encontraron resultados",
                 emptyTable: 'Ningún registro encontrado',
                 info: 'Mostrando <b>_START_</b> de <b>_END_</b> de un total de <b>_TOTAL_</b> registros',
                 infoEmpty: 'Mostrando <b>0</b> de <b>0</b> de un total de <b>0</b> registros',
                 infoFiltered: '(Filtrados de _MAX_ registros)',
                 infoPostFix: '', paginate:
                 { sPrevious: "Anterior", sNext: "Próximo" }, }
              });



            });
            </script>
