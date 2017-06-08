<!--la contraseña generada cuando ingrese la mia: bKEWrHvhrXyrjB7Z -->
<?php 
  session_start();
  ob_start();
  date_default_timezone_set('America/Bogota');
  $my_codigo = $_SESSION['codigo'];
  require_once '../../model/connection.php';
  require_once '../../model/hoja_vida.php';
  $sctr=hoja_vida::mstrr_sctr();
 ?>

<link rel="stylesheet" type="text/css" href="../css/calendario.css">
<div class="lbrl">
  <form class="form-horizontal" action="../../controller/hoja_vida.php" method="POST">
    <CENTER><h1 class="xprnc_lbrl">Experiencia laboral</h1></CENTER>
    <div class="form-group">
      <input type="hidden" value="<?php echo $my_codigo; ?>" name="nd">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Empresa (*)</label>
        <input class="form-control inputs" type="text" id="2" name="mprs" placeholder="Empresa">
      </div>

      <div class="col-xs-12 col-sm-6">
        <label for="usr">Sector (*)</label>
        <select class="form-control select" name="sctr" >
          <option value="crear">Sector</option>
          <?php foreach ($sctr as $sector) {
              echo "<option value=".$sector[0].">".$sector[1]."</option>";
          }?>   
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Cargo (*)</label>
        <input class="form-control inputs" type="text" id="3" name="crg" placeholder="Cargo">
      </div>

      <div class="col-xs-12 col-sm-6">
        <label for="usr">contacto (*)</label>
        <input class="form-control inputs" type="number" id="4" name="cllr" placeholder="Celular de contacto">
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Fecha inicio (*)</label>
        <input class="form-control inputs" type="text" id="5" autocomplete="off" name="fch_nc" placeholder="Fecha inicio">
      </div>

      <div class="col-xs-12 col-sm-6">
        <label for="usr">Trabaja actualmente en esta empresa: (*)</label>
        <select class="form-control select"  onchange="button()" id="0" name="sqa">
          <option value="crear">Trabaja actualmente en esta empresa</option>
          <option value="Si">Si</option>
          <option value="No">No</option>                
        </select>
      </div>
    </div>

     <div class="form-group">

      <div class="col-xs-12 col-sm-6" id="11">
        <label for="usr">Fecha fin (*)</label>
        <input class="form-control inputs" type="text" id="1" autocomplete="off" name="fch_fn" placeholder="Fecha fin: (*)">
      </div>
      <input type="hidden" name="mss_xprnc" id="6">
    </div>


    <center>
      <label class="form-contro">
        No olvides de colocar los archivos de evidencia, ya que es lo que costa que si trabajastes en dicha empresa
      </label>
    </center>
      
    <div class=" col-sm-offset-5.9  col-xs-offset-5">
      <button type="button" id="BtnRegistrar" class="btn btn_lbrl" name="ctn" value="rgstrr_lbrl">Agregar</button>
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

    $( "#5").datepicker({
        changeMonth:true,
        yearRange:"c-100:c+100",
        changeYear:true,
        dateFormat: "yy/mm/dd",
        maxDate:anho+'/'+mes+'/'+dia,
      });

    $( "#1").datepicker({
        changeMonth:true,
        yearRange:"c-100:c+100",
        changeYear:true,
        dateFormat: "yy/mm/dd",
        maxDate:anho+'/'+mes+'/'+dia,
      });
  });

$(document).ready(function(){
  document.getElementById("1").style.display = "none";
  document.getElementById("11").style.display = "none";
  document.getElementById("2").style.display = "block";
  document.getElementById("3").style.display = "block";
  document.getElementById("4").style.display = "block";
  document.getElementById("5").style.display = "block";
});

function button(){
  var w = document.getElementById("0").value;
  if (w=="crear") {
    document.getElementById("11").style.display = "none";
    document.getElementById("1").style.display = "none";
    document.getElementById("1").value="";
  }
  if (w == "No") {
    document.getElementById("11").style.display = "block";
    document.getElementById("1").style.display = "block";
  }
  if (w=="Si") {
    document.getElementById("11").style.display = "none";
    document.getElementById("1").style.display = "none";
    document.getElementById("1").value="";
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

        var valores = document.getElementById("0").value;
        var fec_fin = document.getElementById("1").value;
        var fec_ini = document.getElementById("5").value;   
        var fecfi = moment(fec_fin);
        var fecni = moment(fec_ini);
        

        if (valores == "Si"){
          var anho= '<?php echo date('Y') ?>';
          var mes= '<?php echo date('m') ?>';
          var dia= '<?php echo date('d') ?>';
          var anho = moment(anho+"/"+mes+"/"+dia);

          var fec_actu = anho.diff(fecni, 'month');
          document.getElementById("6").value=fec_actu;
          validar==true;

          document.getElementById("1").value="Sigo en la empresa";

        }

        if (valores == "No") {
          var mese = fecfi.diff(fecni, 'month');
          document.getElementById("6").value=mese;
          validar==true;

          if (fecni >= fecfi) {
            alert("la fecha inicial no puede ser igual o llamar a la fecha final");
            validar=false;
          }
          validar==true;
        }

        if (validar==true) {
          document.getElementById('BtnRegistrar').type="submit";
        }
    });
});
</script>