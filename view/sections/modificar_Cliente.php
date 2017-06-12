<?php
require_once '../../model/connection.php';
require_once '../../model/horas_extras.php';
$hola=Horas_Extras::hacer_una_consulta($_GET["Actualizar_cliente"]);
?>
<div class="actcliente">
  <form action="../../controller/horas_extras.php" method="post">
    <div class="col-md-9 col-md-4" id="regcliente" style="margin-top:150px;">
      <center>
       <label for="">Actualizar cliente</label>
       <center/>
       <input type="hidden" value="<?php echo $hola["Id_Cliente"]; ?>"  name="Id_Cliente">
       <br>
       <label>Gerente Proyectos:</label><br>
       <input name="Gerente_Proyecto" class="form-control" rows="10"  value="<?php echo $hola[1]; ?>" />
      <br>
      <label>Nombre Cliente:</label><br>
      <input type="text" name="Nombre_Cliente" class="form-control"  value="<?php echo $hola[2]; ?>"/>
      <br>
      <label>Hora inicio:</label><br>
      <input name="Hora_Inicio" rows="10"  class="form-control" value="<?php echo $hola[3]; ?>"/><br>
      <label>Horas fin:</label><br>
      <input name="Hora_Fin" rows="10" class="form-control" value="<?php echo $hola[4]; ?>"/>
      <br>
      <label>Horas laboradas:</label><br>
      <input name="Horas_Laboradas" rows="10" class="form-control" value="<?php echo $hola[5]; ?>"/>
      <br>
      <br>
<button type="submit"  class="btn btn-warning active" id="btn-guardar" name="actual" value="Modificar_cliente">Guardar</button>          </div>
    </form>
</div>
