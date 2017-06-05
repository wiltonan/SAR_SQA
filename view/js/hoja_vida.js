$(document).ready(function(){
  document.getElementById("1").style.display = "none";
  document.getElementById("2").style.display = "block";
  document.getElementById("3").style.display = "block";
  document.getElementById("4").style.display = "block";
  document.getElementById("5").style.display = "block";

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

function button(){
  var w = document.getElementById("0").value;
  if (w=="crear") {
    document.getElementById("1").style.display = "none";
    document.getElementById("1").value="";
  }
  if (w == "No") {
    document.getElementById("1").style.display = "block";
  }
  if (w=="Si") {
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
