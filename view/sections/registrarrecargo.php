<?php
//se incluye la coneccion y el modelo
require_once '../../model/connection.php';
require_once '../../model/horas_extras.php';
  $ver = Horas_Extras::Consulta_Horas($_GET["registro"]);
  $generar = Horas_Extras::Consulta_Horas($_GET["Consulta"]);
  $recar = Horas_Extras::recargo();
  $pag = Horas_Extras::pagas();
?>
     <script type="text/javascript">
     //funcion para diriguirce a otra paguina
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
          <input type="text" name=""class="form-control inputs" disable=""  value="<?php echo utf8_encode($ver[1]); ?>" disabled="true">
        </div>
        <div class="col-md-4  col-md-4">
          <label for="">Fecha</label>
          <input type="date" class="form-control inputs" name="Fecha" value="">
        </div>
<div class="col-md-4  col-md-4">
  <label for="">recargo</label>
  <select class="form-control select"  name="Descripcion" disabled="true">
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
                     <input type="numeric" class="form-control col-md-8 inputs" name="Cantidad_Horas" value="">
                   </div>
                    <div class="col-md-4  col-md-4">
                      <label for="">Cliente</label>
                      <input type="text" class="form-control inputs" name="Empresa_Contratante" value="">
                    </div>
                        <div class="col-md-4  col-md-4">
                          <label for="">tipo pagas</label>
                         <select class="form-control select" name="Descripcion1">
                           <option value="AS">seleccione</option>

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
           <textarea class="form-control textarea" rows="6"  name="Comentario"></textarea>
         </div>
       </div>
      <div>
        <br>
        <div  id="recarg1">
          <button type="submit" id="recarg" name="actual" value="RegistrarRecargo" class="btn btn-warning">Registrar</button>
        </div>
        <div id="recarg2">
          <button type="button" onclick="atras(<?php echo $generar[0];?>)" class="btn btn-warning" name="button">Atras</button>
        </div>
        </div>
      </article>
     </div>
   </form>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        //cambioi de lenguaje a la tabla de ingles a español
        $("#Tabla").DataTable({
          language: { paginate: { first: "Primera", previous: "Anterior",
          next: "Siguiente", last: "Anterior" }, processing: "Cargando datos...",
          lengthMenu: "Mostrar _MENU_ Entradas", info: "Se muestran 1 de _MAX_ de un total de _TOTAL_" ,
          infoEmpty: "Mostradas 0 de _MAX_ entradas", "infoFiltered": "(filtrada a partir de _MAX_ registro)",
           infoPostFix: "", loadingRecords: "Cargando...", "zeroRecords": "Ninguno dato encontrado",
           emptyTable: "No hay ningun dato", search: "Buscar:" }
        });
        /*se genero las validaciones en los inputs como en el select y en los inpust*/
        $("#recarg").click(function () {
          /* permite que no se repita la alerta de campo obligatorio*/
            $(".remove").remove();
            /*declaracion de variables*/
            var boo = 0;
            var inputs = $(".inputs");
            var selec = $(".select");
            var textare = $(".textarea");
            var input, selet, text;
            var validar=true;
            //se inicia el for para comprobar que el input no este vacio
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value == "") {
                  boo++
                    input = $(inputs[i]);
                    input.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Campo obligatorio</font><div>");  
                    validar=false;
                }
            }

            // for (var i = 0; i < text.length; i++) {
            //     if (textare[i].value == "") {
            //       boo++
            //       text = $(textare[i]);
            //         text.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Campo obligatorio</font><div>");  
            //         validar=false;
            //     }
            // }

            //for para validr si el usuario selecciono algo en el select
            for (var i = 0; i < selec.length; i++) {
            if (selec[i].value == "AS") {
                selet = $(selet[i]);
                selet.focus().after("<div style='font-size:15px;' class='remove'><font color='red'>Campo obligatorio</font><div>");
            } else {
                boo++;
            }
        }
            });
      });
    </script>
