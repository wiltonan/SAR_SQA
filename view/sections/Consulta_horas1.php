<?php
require_once '../../model/connection.php';
require_once '../../model/ejemplo.php';
$generar = ejemplo::Consulta_Horas($_GET["Consulta"]);
$recargo = ejemplo::recargo1();
$extras = ejemplo::Extras();
 ?>
 <script type="text/javascript">
     function atras(a) {
       $(".administrador").load("../sections/Consulta_Analista.php?atras="+a+"");
    }
 </script>
    <div class="tblhoras" style="margin-top:100px;">
 <form  action="../../controller/Horase_xtras.php" method="post">
      <center>
      <a  href="../sections/formatohoras.php?Consulta=<?php echo $ver[0];?>" target="blank">descargar</a></button>
      <br>
            <td ><?php echo utf8_encode($generar[1]);?></td>
            <br>
            <button type="submit" id="Registrar" name="actual" value="Extras" class="btn btn-warning">Guardar</button>
            <button type="button" onclick="atras(<?php echo $generar[0];?>)" class="btn btn-warning" name="button">Atras</button>
           <center/>
        <table class="display" cellspacing="1" width="100%" height="60%" id="Tabla">
              <thead >
              <tr>
              <th ><strong>Fecha</strong></th>
              <th ><strong>Horas</strong></th>
              <th ><strong>HEOD</strong></th>
              <th><strong>HEON</strong></th>
              <th ><strong>DFD</strong></th>
              <th ><strong>DFN</strong></th>
              <th><strong>Comentario</strong></th>
              <th><strong>recargo</strong></th>
              <th ><strong>pagas</strong></th>
              <th><strong>compensadas</strong></th>
              <th><strong>por compensar</strong></th>
              <th><strong>Pendientes</strong></th>
            </tr>

        </thead>
        <tbody id="">
              <input type="hidden" value="<?php echo $generar[0]; ?>"  name="Id_Temporal_E">
                <?php foreach ($generar as $ver):?>
                <tr>
                  <td><?php echo utf8_encode($generar[2]);?></td>
                  <td><?php echo utf8_encode($generar[3]);?></td>
                       <td><?php echo utf8_encode($generar[3]);?></td>
                        <td><?php echo utf8_encode($generar[3]);?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo utf8_encode($generar[4]);?></td>
                      <td><?php echo utf8_encode($recargo[0]);?></td>
                      <td><select class="form-control" name="Descripcion">
                        <option value="">Seleccione</option>
                        <option value="">pagas</option>
                      </select><input type="number" class="form-control" name="Cantidad_Horas" value=""></td>
                      <td><select class="form-control" name="Descripcion">
                        <option value="">Seleccione</option>
                        <option value="">compensadas</option>
                      </select>
                      <input type="number" class="form-control" name="Descripcion" value=""></td>
                      <td><select class="form-control" name="Cantidad_Horas">
                        <option value="">Seleccione</option>
                        <option value="">por compensar</option>
                      </select>
                      <input type="number" class="form-control" name="Cantidad_Horas" value=""></td>
                      <td><select class="form-control" name="Descripcion">
                        <option value="">Seleccione</option>
                          <option value="">Pendientes</option>
                      </select>
                      <input type="date"class="form-control" name="Fecha" value="">
                      <input type="number " class="form-control" name="Cantidad_Horas" value=""></td>

                  </tr>
                <?php  endforeach ?>
            </tbody>
          </table>

 </form>
   </div>

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
