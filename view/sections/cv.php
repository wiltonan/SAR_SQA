  
<div class="bd1">
  <form action="index.html" method="post">
    <div class="row">
      <div class="col m12">

        <div class="card">
          <div class="row">
            <CENTER><h1 class="prsnls">Datos personales</h1></CENTER>
            <div class="input-field col m6">
              <select>
                <option value="" disabled selected>Tipo de documento :(*) </option>
                <option value="">Cédula de ciudadanía</option>
                <option value="">Cédula de extranjería</option>
                <option value="">Tarjeta de identidad</option>                  
              </select>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Cedula: (*) </label>
            </div>
            
            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Nombres: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtlast" class="validate">
              <label class="active" for="">Apellidos: (*) </label>
            </div>     
            
            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Telefono: </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtlast" class="validate">
              <label class="active" for="">Celular: </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Direción: (*) </label>
            </div>              
          </div>
        </div>

        <div class="card">
          <CENTER><h1 class="xprnc_lbrl">Experiencia laboral</h1></CENTER>
          <div class="row">

            <div class="input-field col m6">
              <select id="selectorsqa">
                <option value="nd" disabled selected>La empresa es sqa: (*)</option>
                <option value="Si">Si</option>
                <option value="No">No</option>                
              </select>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Empresa: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Cargo: (*) </label>
            </div>

            <div class="input-field col m6">
                <input type="text" name="txtlast" class="validate">
                <label class="active" for="">Celular de contacto: </label>
            </div>

            <div class="input-field col m6">
              <input type="date" class="datepicker" name="txtlast">
              <label class="active" for="">Fecha de inicio: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="date" class="datepicker" name="txtfirst">
              <label class="active" for="">Fecha fin: (*) </label>
            </div>

            
          </div>    
        </div>

        <div class="card">
          <CENTER><h1 class="std">Estudio</h1></CENTER>
          <div class="row">

            <div class="input-field col m6">
              <select class="browser-default" id="slct_std">
                <option value="" disabled selected>Tipo de estudio</option>
                <option value="Seminario">Seminario</option>
                <option value="Curso">Curso</option>
                <option value="Técnico">Técnico</option>
                <option value="Tecnologo">Tecnologo</option>
                <option value="Profesional">Profesional</option> 
                <option value="Especialización">Especialización</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
                <option value="Otro">Otro</option>               
              </select>
            </div>

             <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Otro: </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" id="titulo"  class="validate" >
              <label class="active" for="">Titulo octenido: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="text" name="txtfirst" class="validate">
              <label class="active" for="">Institución: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="date" class="datepicker" name="txtlast">
              <label class="active" for="">Fecha de graduacion: (*) </label>
            </div>

            <div class="input-field col m6">
                <input type="text" name="txtlast" class="validate">
                <label class="active" for="">Pais: </label>
            </div>

            <div class="input-field col m6">
              <input type="text" class="txtlast" name="txtfirst">
              <label class="active" for="">Nivel: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="text" class="txtlast" name="txtfirst">
              <label class="active" for="">Plataformas: (*) </label>
            </div>

            <div class="input-field col m6">
              <input type="text" class="txtlast" name="txtfirst">
              <label class="active" for="">Numero de la tarjeta profesional: (*) </label>
            </div>  
          </div>    
        </div>

        <center><a class="waves-effect waves-light btn">Salir</a>
          <a class="waves-effect waves-light btn">Habilitar</a>
          <a class="waves-effect waves-light btn">Guardar</a>
          <a class="waves-effect waves-light btn">Cancelar</a></center>     
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">

  $("#selectorsqa").change(function(){
    var valor = $(this).val();
    if (valor=="Si") {
      $("#btn1").css("display","block");
      $("#btn2").css("display","block");
      $("#btn3").css("display","block");
      }

    else{
      $("#btn1").css("display","none");
      $("#btn2").css("display","none");
      $("#btn3").css("display","none"); 
    }
  });
  
  $('select').material_select();

  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 15
  }); 
</script>


      
