<?php
require_once '../../model/connection.php';
require_once '../../model/horas_extras.php';

$sth=Horas_Extras::Consulta_Analis();
$generar = Horas_Extras::Consulta_Horas($_GET["Consulta"]);
 ?>
 <script type="text/javascript">
      function Consulta(c) {
        $(".administrador").load("../sections/Consulta_Horas1.php?Consulta="+c+"");
     }
     function recargo(r) {
       $(".administrador").load("../sections/registrarrecargo.php?registro="+r+"");
    }
    function atras(a) {
      $(".administrador").load("../menu/Administrador.php?registro="+a+"");
   }
 </script>
               <table class="display" cellspacing="1" width="100%" id="Tabla">
              <thead>
                <tr>
                  <td>desde<input type="date" name="" class="form-control" value=""></td>
                      <td>hasta <input type="date" name="" class="form-control"  value=""></td><br>
                      <td>
                        <br>
                          <button type="button"class="btn btn-warning" name="">Buscar</button>
                          <!-- <button type="button" onclick="atras(<?php echo $my_codigo[1];?>)" class="btn btn-warning" name="button">Atras</button> -->

                      </td>
                </tr>
            <center><h1 class="">Consulta analista</h1></center>
                <tr>
                  <th>Nombre</th>
                  <th>Cliente</th>
                  <th>Fecha</th>
                  <th>Horas_extras</th>
                  <th>recargo</th>
                  <th>Archivo de excel</th>
                </tr>
            </thead>
            <tbody id="">
              <?php foreach ($sth as $ver): ?>
                <tr>
                      <input type="hidden" value="<?php echo $hola[0]; ?>"  name="Id_Temporal_E">
                      <td><?php echo utf8_encode($ver[1]);?></td>
                      <td><?php echo utf8_encode($ver[2]);?></td>
                      <td><?php echo utf8_encode($ver[3]);?></td>
                      <div class="icono1">
                        <td>
                          <span style="cursor: pointer;" onclick="Consulta(<?php echo $ver[0];?>)">
                            <p><i style="color:#FFC84F;" class="fa fa-calculator fa-2x" aria-hidden="true"></i><p/></span>
                        </td>
                      </div>

                      <div class="icono2">
                        <td>
                          <span style="cursor: pointer;" onclick="recargo(<?php echo $ver[0];?>)">
                           <p><i style="color:#FFC84F;" class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i><p/>
                         </span>
                        </td>

                      </div>
                      <div class="icono3">
                        <td>
                          <span style="cursor: pointer;" onclick="">
                          <A HREF="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fsites.google.com%2Fa%2Fsqasa.com%2Fcorporativo-sqasa%2F&followup=https%3A%2F%2Fsites.google.com%2Fa%2Fsqasa.com%2Fcorporativo-sqasa%2F&hd=sqasa.com&service=jotspot&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">	<p><i style="color:#FFC84F;" class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i><p/></A>

                        </span></td>
                      </div>

                </tr>

              <?php endforeach ?>
            </tbody>


          </table>
<script type="text/javascript">
  $(document).ready(function() {
    $("#Tabla").DataTable({
      language: { paginate: { first: "Primera", previous: "Anterior",
      next: "Siguiente", last: "Anterior" }, processing: "Cargando datos...",
      lengthMenu: "Mostrar _MENU_ Entradas", info: "Se muestran 1 de _MAX_ de un total de _TOTAL_" ,
      infoEmpty: "Mostradas 0 de _MAX_ entradas", "infoFiltered": "(filtrada a partir de _MAX_ registro)",
       infoPostFix: "", loadingRecords: "Cargando...", "zeroRecords": "Ninguno dato encontrado",
       emptyTable: "No hay ningun dato", search: "Buscar:" }
    });
    });
</script>
