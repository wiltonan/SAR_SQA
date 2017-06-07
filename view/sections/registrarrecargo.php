<?php
require_once '../../model/connection.php';
require_once '../../model/horas_extras.php';
  $ver = Horas_Extras::Consulta_Horas($_GET["registro"]);
  $generar = Horas_Extras::Consulta_Horas($_GET["Consulta"]);
  $recar = Horas_Extras::recargo();
  $pag = Horas_Extras::pagas();
?>
     <script type="text/javascript">
         function atras(a) {
           $(".administrador").load("../sections/Consulta_Analista.php?atras="+a+"");
        }
     </script>
     <h2 id="recar">Registrar recargo</h2>
<div id="recargo">
   <form class="container" action="../../controller/horas_extras.php" method="POST">
          <br><br>

          			<article >
          <div class="row-12">
          <div class="col-md-4  col-md-4">
          <label for="">Nombre</label>
          <input type="text" name=""class="form-control" disable=""  value="<?php echo utf8_encode($ver[1]); ?>" disabled="true">
        </div>
        <div class="col-md-4  col-md-4">
          <label for="">Fecha</label>
          <input type="date" class="form-control" name="Fecha" value="">
        </div>
<div class="col-md-4  col-md-4">
  <label for="">recargo</label>
  <select class="form-control"  name="Descripcion" disabled="true">
     <?php foreach ($recar as $recargo) {
     if($recargo["Id_tipo_hora"] == $ver["Id_tipo_hora"]){
       $selected = "selected";
    }else{
      $selected = "";
   }
   echo "<option value=".$recargo["Id_tipo_hora"]." $selected>".$recargo["Descripcion"]."</option>";
 }?>
          </select>
</div>
      </div>
                    <div class="row-6">
                    <div class="col-md-4  col-md-4">
                     <label for="">Cantidad Horas</label>
                     <input type="numeric" class="form-control col-md-8" name="Cantidad_Horas" value="">
                   </div>
                    <div class="col-md-4  col-md-4">
                      <label for="">Cliente</label>
                      <input type="text" class="form-control" name="Empresa_Contratante" value="">
                    </div>
                        <div class="col-md-4  col-md-4">
                          <label for="">tipo pagas</label>
                         <select class="form-control" name="Descripcion1">
                                 <?php foreach ($pag as $pagas) {
                                     if ($pag["Id_Tipo_Pago"] == $ver["Id_Tipo_Pago"]) {
                                       $selected = "selected";
                                     }else {
                                       $selected = "";
                                     }
                                     echo "<option value=".$pagas["Id_Tipo_Pago"]." $selected>".$pagas["Descripcion"]."</option>";
                                 }
                                  ?>
                         </select>
                       </div>
                  </div>
        <div class="rows-6">
          <div class="col-md-12 col-md-12">
           <label>Observaciones</label>
           <textarea class="form-control" rows="6"  name="Comentario"></textarea>
         </div>
       </div>+

      <div >
        <br>
        <div  id="recarg1">
          <button type="submit" id="recarg" name="actual" value="RegistrarRecargo" class="btn btn-warning">Registrar</button>
        </div>
        <div id="recarg2">
          <button type="button" onclick="atras(<?php echo $generar[0];?>)" class="btn btn-warning" name="button">Atras</button>
        </div >
                </div>
      </article>

     </div>
   </form>
    </div>
