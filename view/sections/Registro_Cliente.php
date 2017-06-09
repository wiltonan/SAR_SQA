      <div class="rgscliente">
        <form action="../../controller/horas_extras.php" method="post">
          <div class="col-md-9 col-md-4" id="regcliente" style="margin-top:150px;">
            <center>
             <label for="">Registro cliente</label>
             <center/>
             <br>
            <label>Gerente Proyectos:</label>
            <br>
            <input name="Gerente_Proyecto" class="form-control inputs col-sm-3 "/>
            <br>
            <label>Nombre Cliente:</label>
            <br>
            <input type="text" class="form-control inputs col-sm-3 inputs"  name="Nombre_Cliente"/>
            <br>
            <label>Hora inicio:</label><br>
            <input type="time" name="Hora_Inicio" class="form-control inputs "/><br>
            <label>Horas fin:</label><br>
            <input type="time" name="Hora_Fin" class="form-control inputs col-sm-3"/>
            <br>
            <label>Horas laboradas:</label>
            <br>
            <input type="text" name="Horas_Laboradas" class="form-control inputs col-sm-3"/>
            <br>
            <br>
                  <button type="submit" id="Registrarc" name="actual" value="rgstrr_cliente" class="btn btn-warning">Registrar</button>
                </div>
          </form>
      </div>
      <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>

      <script type="text/javascript">
      $(document).on('ready', function () {
        $("#Registrarc").click(function () {
            $(".remove").remove();
            var boo = 0;
            var inputs = $(".inputs");
            var input, selet;
            var validar=true;

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value == "") {
                  boo++
                    input = $(inputs[i]);
                    input.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");  
                    validar=false;
                }
            }
            });
          });
      </script>
