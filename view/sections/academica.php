<?php 
  session_start();
  ob_start();

  date_default_timezone_set('America/Bogota');
  $my_codigo = $_SESSION['codigo'];
  require_once '../../model/connection.php';
  require_once '../../model/hoja_vida.php';
  $std=hoja_vida::mstrr_std();
 ?>
9
<link rel="stylesheet" type="text/css" href="../css/calendario.css">
<div class="cdmc">
  <form class="form-horizontal" action="../../controller/hoja_vida.php" method="POST">
    <CENTER><h1 class="std">Estudio</h1></CENTER>

    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
      <label for="usr">Tipo de estudio (*)</label>
        <input type="hidden" value="<?php echo $my_codigo; ?>" name="nd">
        <select class="form-control select" onchange="button()" id="0" name="tp_std" >
          <option value="crear" >Tipo de estudio</option>
          <?php foreach ($std as $estudio) {
              echo "<option value=".$estudio[0].">".$estudio[1]."</option>";
          }?>   
        </select>
      </div>
   
      <div class="col-xs-12 col-sm-6" id="21">
        <label for="usr">Titulo obtenido (*)</label>
        <input class="form-control inputs" id="1" type="text" placeholder="Titulo obtenido">
      </div>

      <div class="col-xs-12 col-sm-6" d="29">
        <label for="usr">Nombre de la plataforma (*)</label>
        <input class="form-control inputs" id="9" type="text" placeholder="Nombre de la plataforma">
      </div>

      <div class="col-xs-12 col-sm-6" d="30">
        <label for="usr">Nombre de la plataforma (*)</label>
        <input class="form-control inputs" id="10" type="text" placeholder="Idioma">
      </div>

      <div class="col-xs-12 col-sm-6" d="32">
        <label for="usr">Descripcion (*)</label>
        <input class="form-control inputs" id="12" type="text" placeholder="Descripcion">
      </div>

      <div class="col-xs-12 col-sm-6" d="31">
        <label for="usr">Tema (*)</label>
        <input class="form-control inputs" id="11" type="text" placeholder="Tema">
        <input type="hidden" id="19" name="ttl_btnd">
      </div>
    </div>
       
    <div class="form-group">
        <div class="col-xs-12 col-sm-6" d="23">
          <label for="usr">Fecha inicio (*)</label>
          <input class="form-control inputs" autocomplete="off" id="3" type="text" name="fch_nc" placeholder="Fecha inicio">
        </div>

        <div class="col-xs-12 col-sm-6" d="26">
          <label for="usr">Fecha fin (*)</label>
          <input class="form-control inputs" autocomplete="off" id="6" type="text" name="fch_fn" placeholder="Fecha fin">
        </div>        
    </div>

    <div class="form-group">
      <div class="col-xs-12 col-sm-6" d="22">
        <label for="usr">Institución (*)</label>
        <input class="form-control inputs" id="2" type="text" name="nsttcn" placeholder="Institución">
      </div>
        
      <div class="col-xs-12 col-sm-6" d="24">
        <label for="usr">Numero de la tarjeta profesional (*)</label>
        <input class="form-control inputs" id="4" type="text" name="tjt_prfsnl" placeholder="Numero de la tarjeta profesional">
      </div>

      <div class="col-xs-12 col-sm-6" d="25">
        <label for="usr">Software que maneja (*)</label>
        <input class="form-control inputs" id="5" type="text" name="bsrvcns" placeholder="Software que maneja">
      </div>
    
      <div class="col-xs-12 col-sm-6" d="27">
        <label for="usr">Nivel (*)</label>
        <input class="form-control inputs" id="7" type="number" name="nvl" placeholder="Nivel">
      </div>
    </div>

        <!-- <center>
          <label class="form-contro">
            No olvides de adjuntar los soporte del estudio.
          </label>
        </center> -->

    <div class=" col-sm-offset-6  col-xs-offset-6">
      <button type="button" id="BtnRegistrar" class="btn" name="ctn" value="rgstrr_std">Guardar</button >
    </div>
  </form>
</div>

<script type="text/javascript" src="../js/jquery-1.10.2.js" ></script>
<script src="../js/calendario.1.12.4.js"></script>
<script src="../js/calendario.1.12.1.js"></script>
<script src="../js/moment.js"></script>
<script src="../js/localizaion.moment.js"></script>
<script type="text/javascript">

  $( function() {
    var anho= '<?php echo date('Y') ?>';
    var mes= '<?php echo date('m') ?>';
    var dia1= '<?php echo date('d') ?>';
    var dia = dia1-1

    $( "#3" ).datepicker({
        changeMonth:true,
        yearRange:"c-100:c+100",
        changeYear:true,
        dateFormat: "yy/mm/dd",
        maxDate:anho+'/'+mes+'/'+dia,
      });

    $( "#6" ).datepicker({
        changeMonth:true,
        yearRange:"c-100:c+100",
        changeYear:true,
        dateFormat: "yy/mm/dd",
        maxDate:anho+'/'+mes+'/'+dia,
      });
  });

$(document).ready(function(){
  document.getElementById("1").style.display = "none";
  document.getElementById("2").style.display = "none";
  document.getElementById("3").style.display = "none";
  document.getElementById("4").style.display = "none";
  document.getElementById("5").style.display = "none";
  document.getElementById("6").style.display = "none";
  document.getElementById("7").style.display = "none";
  document.getElementById("9").style.display = "none";
  document.getElementById("10").style.display = "none";
  document.getElementById("11").style.display = "none";
  document.getElementById("12").style.display = "none";
  document.getElementById("BtnRegistrar").style.display = "none";
});
  
function button(){
  var w = document.getElementById("0").value;
  if (w==8) {
    document.getElementById("9").style.display = "block";
    document.getElementById("5").style.display = "block";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("6").style.display = "block";
    document.getElementById("BtnRegistrar").style.display = "block";
    document.getElementById("1").style.display = "none";
    document.getElementById("4").style.display = "none";
    document.getElementById("7").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("11").style.display = "none";
    document.getElementById("12").style.display = "none";
  }

  if (w==3 || w==4 || w==6) {
    document.getElementById("1").style.display = "block";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("4").style.display = "none";
    document.getElementById("5").style.display = "none";
    document.getElementById("6").style.display = "block";
    document.getElementById("7").style.display = "none";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("11").style.display = "none";
    document.getElementById("12").style.display = "none";
    document.getElementById("BtnRegistrar").style.display = "block";
  }

  if (w=="crear") {
    document.getElementById("1").style.display = "none";
    document.getElementById("2").style.display = "none";
    document.getElementById("3").style.display = "none";
    document.getElementById("4").style.display = "none";
    document.getElementById("5").style.display = "none";
    document.getElementById("6").style.display = "none";
    document.getElementById("7").style.display = "none";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("11").style.display = "none";
    document.getElementById("12").style.display = "none";
    document.getElementById("BtnRegistrar").style.display = "none";
  }

  if (w==1 || w==2) {
    document.getElementById("11").style.display = "block";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("6").style.display = "block";
    document.getElementById("BtnRegistrar").style.display = "block";
    document.getElementById("1").style.display = "none";
    document.getElementById("5").style.display = "none";
    document.getElementById("4").style.display = "none";
    document.getElementById("7").style.display = "none";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("12").style.display = "none";
  }

  if (w==7) {
    document.getElementById("1").style.display = "none";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("4").style.display = "none";
    document.getElementById("5").style.display = "none";
    document.getElementById("6").style.display = "block";
    document.getElementById("7").style.display = "block";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "block";
    document.getElementById("11").style.display = "none";
    document.getElementById("12").style.display = "none";
    document.getElementById("BtnRegistrar").style.display = "block";
  }

  if (w==5) {
    document.getElementById("1").style.display = "block";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("4").style.display = "block";
    document.getElementById("5").style.display = "none";
    document.getElementById("6").style.display = "block";
    document.getElementById("7").style.display = "none";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("11").style.display = "none";
    document.getElementById("12").style.display = "none";
    document.getElementById("BtnRegistrar").style.display = "block";
  }

   if (w==9) {
    document.getElementById("12").style.display = "block";
    document.getElementById("2").style.display = "block";
    document.getElementById("3").style.display = "block";
    document.getElementById("6").style.display = "block";
    document.getElementById("BtnRegistrar").style.display = "block";
    document.getElementById("1").style.display = "none";
    document.getElementById("5").style.display = "none";
    document.getElementById("4").style.display = "none";
    document.getElementById("7").style.display = "none";
    document.getElementById("9").style.display = "none";
    document.getElementById("10").style.display = "none";
    document.getElementById("11").style.display = "none";
  }
}

  $(document).on('ready', function () {
    $("#BtnRegistrar").click(function () {
        $(".remove").remove();
        var boo = 0;
        var inputs = $(".inputs");
        var input, selet;
        var validar=true;

        for (var i = 0; i < inputs.length; i++) {

            if (inputs[i].value == "" && inputs[i].style.display=="block") {
              boo++
                input = $(inputs[i]);
                input.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");  
                validar=false;
            } 
        }

        var selec = $(".select");
        for (var i = 0; i < selec.length; i++) {
            if (selec[i].value == "crear") {
              boo++
                selet = $(selec[i]);
                selet.focus().after("<div style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");
                validar=false;
            } 
        }
        var titulo = document.getElementById("1").value;
        var plataforma = document.getElementById("9").value;
        var tema = document.getElementById("10").value;
        var idioma = document.getElementById("11").value;

        if (titulo!="") {
         document.getElementById("19").value=titulo;
        }
        if (plataforma!="") {
         document.getElementById("19").value=plataforma;
        }
        if (tema!="") {
          document.getElementById("19").value=tema;
        }
        if (idioma!="") {
          document.getElementById("19").value=idioma;
        }

        var fec_ini = document.getElementById("3").value;
        var fec_fin = document.getElementById("6").value;

        var fecni = moment(fec_ini);
        var fecfi = moment(fec_fin);

        if (fecni >= fecfi) {
          alert("La fecha inicio no puede ser mayor o igual a la  fecha fin");
          validar=false;
        }
        
        if (validar==true) {
          document.getElementById('BtnRegistrar').type="submit";
        }
    });
  });
</script>
