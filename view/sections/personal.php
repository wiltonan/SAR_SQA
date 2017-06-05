<?php
  session_start();
  ob_start();
  $my_codigo = $_SESSION['codigo'];
  
  include_once '../../model/connection.php';
  include_once '../../model/hoja_vida.php';
  $dato=hoja_vida::cnslt_ms_dts($my_codigo);
 ?>


<div class="prsnl">
  <form class="form-horizontal" action="../../controller/hoja_vida.php" method="POST">
    <CENTER><h1 class="prsnls">Datos personales</h1></CENTER>

    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Tipo de documento</label>
        <input class="form-control" value="<?php echo $dato[5]; ?>" placeholder="Tipo de documento" disabled>
      </div>

      <div class="col-xs-12 col-sm-6">
        <label for="usr">Tipo de documento</label>
        <input class="form-control" value="<?php echo $dato[6]; ?>" placeholder="Numero de documento" disabled >
      </div>
    </div>      

    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Nombres (*)</label>
        <input type="hidden" value="<?php echo $my_codigo; ?>" name="nd">
        <input class="form-control inputs" id="1" type="text" value="<?php echo $dato[0]; ?>" name="nmbrs" placeholder="Nombres" disabled>
      </div>

      <div class="col-xs-12 col-sm-6">
         <label for="usr">Apellidos (*)</label>
        <input class="form-control inputs" id="2" type="text" value="<?php echo $dato[1]; ?>" name="pllds" placeholder="Apellidos" disabled>
      </div>
    </div>      
            
    <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <label for="usr">Telefono (*)</label>
        <input class="form-control inputs" id="3" type="number" value="<?php echo $dato[2]; ?>" name="tlfn" placeholder="Telefono" disabled>
      </div>

      <div class="col-xs-12 col-sm-6">
        <label for="usr">Celular (*)</label>
        <input class="form-control inputs" id="4" type="number" value="<?php echo $dato[3]; ?>" name="cllr" placeholder="Celular" disabled>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12 col-sm-3">
         <label for="usr">Ubicacion de las evidencias</label>
        <a class=form-control href="<?php echo $dato[4]; ?>" disabled target="_blank" >Esta es la direccion donde vas a guardar las evidencias</a>
      </div>                 
    </div>

    <div class=" col-sm-offset-5  col-xs-offset-5">
      <button onclick="vali()" type="button" id="boton1" class="btn">Modificar</button>
      <button  type="button" class="btn" id="buton2" disabled><a style="color: black; text-decoration: none;" href="javascript:document.location.reload()">Cancelar</a></button>

      <button type="button" id="BtnRegistrar" class="btn" name="ctn" value="rgstrr_psnl" disabled>Guardar</button >
    </div>
  </form>
</div>
<script type="text/javascript" src="../js/jquery-1.10.2.js" ></script>
 <script type="text/javascript">
$(document).on('ready', function () {
    $("#BtnRegistrar").click(function () {
        $(".remove").remove();
        var boo = 0;
        var inputs = $(".inputs");
        var input;
        var validar=true;

        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value == "") {
              boo++
                input = $(inputs[i]);
                input.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");  
                validar=false;
            } 
        }
        if (validar==true) {
          document.getElementById('BtnRegistrar').type="submit";
        }
    });
  });

  function vali(){
    document.getElementById("1").disabled=false;
    document.getElementById("2").disabled=false;
    document.getElementById("3").disabled=false;
    document.getElementById("4").disabled=false;
    document.getElementById("boton1").disabled=true;
    document.getElementById("buton2").disabled=false;
    document.getElementById("BtnRegistrar").disabled=false;
  }

  // function invali(){
  //   document.getElementById("1").disabled=true;
  //   document.getElementById("2").disabled=true;
  //   document.getElementById("3").disabled=true;
  //   document.getElementById("4").disabled=true;
  //   document.getElementById("boton1").disabled=false;
  //   document.getElementById("buton2").disabled=true;
  //   document.getElementById("BtnRegistrar").disabled=true;
  // }
</script>