<?php
require_once '../../model/connection.php';
require_once '../../model/ejemplo.php';
$hola=ejemplo::hacer_una_consulta($_GET["Actualizar_cliente"]);
?>
<div class="cosa">
  <form action="../../controller/Horase_xtras.php" method="post">
            <input type="hidden" value="<?php echo $hola["Id_Cliente"]; ?>"  name="Id_Cliente">
            <label>Gerente Proyectos:</label><br>
                  <input name="Gerente_Proyecto"  rows="10"  value="<?php echo $hola["Gerente_Proyecto"]; ?>" /><br>
                  <label>Nombre Cliente:</label><br>
                  <input type="text" name="Nombre_Cliente" value="<?php echo $hola[2]; ?>"/><br>
                  <label>Hora inicio:</label><br>
                  <input name="Hora_Inicio" rows="10"   value="<?php echo $hola[3]; ?>"/><br>
                  <label>Horas fin:</label><br>
                  <input name="Hora_Fin" rows="10"  value="<?php echo $hola[4]; ?>"/><br>
                  <label>Horas laboradas:</label><br>
                  <input name="Horas_Laboradas" rows="10"  value="<?php echo $hola[5]; ?>"/><br>
                  <button type="submit"  class="btn btn-primary active" id="btn-guardar" name="actual" value="Modificar_cliente">Guardar</button>

  </form>
</div>
