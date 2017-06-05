<?php

//nos conectamos a la BD

require_once '../../model/connection.php';
require_once'../../model/capacidad.php';

$result=capacidad::Consult_Capacidad();



?>
<!DOCTYPE html>
<html lang="es" >

    <head>
        <meta charset="utf-8">
        <title>Informe de capacidad</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/jquery.js" charset="utf-8"></script>
    </head>
    <body>
              <form action="vista.php" method="POST" class="conteint-fluid">
               <div class="col-md-12">


               <center><h1>Informe de capacidad</h1><center/>
                   <div class="col-md-12">
                   <Article class="col-md-offset-6 col-md-9">
                                       <input type="text"  name="criterio" size="25" maxlength="150"> <input type="submit" class="btn btn-primary" value="Buscar">
               </Article>   </div>


                              <table  border="2" aling="center" class="table table-bordered table-hover table-striped  ">
                                <tr>
                                <td class="info"><strong>Ciudad</strong></td>
                                  <td class="info" ><strong>Nombres y apellidos</strong></td>
                                  <td class="info" ><strong># Cédula</strong></td>
                                  <td class="info" ><strong>Cargo</strong></td>
                                  <td class="info" ><strong>Rol</strong></td>
                                   <td class="info"><strong>Cliente asignado al 30 del mes</strong></td>
                                   <td class="info"><strong>Ubicación física</strong></td>
                                   <td class="info"><strong>Novedad respecto al mes anterior</strong></td>
                                   <td class="info"><strong>Gerente de proyectos</strong></td>
                                  <td class="info"><strong>Factura?</strong></td>
                                  <td class="info"><strong>% Facturación</strong></td>
                                   <td class="info"><strong>Modelo de servicio</strong></td>
                                  <td class="info"><strong>Observaciones</strong></td>

                                </tr>
                              </div>

            <?php

            if($result){
              foreach  ($result as $key => $value) {?>
                  <tr>
                    <td><?php echo utf8_encode($value['Ciudad']);?></td>
                    <td><?php echo utf8_encode($value['Nombre completo']);?></td>
                    <td><?php echo $value['Num_Documento'];?></td>
                    <td><?php echo utf8_encode($value['Cargo']);?></td>
                    <td><?php echo utf8_encode($value['Rol']);?></td>

                    <td><?php echo utf8_encode($value['Cliente']);?></td>
                    <td><?php echo utf8_encode($value['Ubicacion']);?></td>

                    <td><?php echo utf8_encode($value['Novedad']);?></td>
                    <td><?php echo utf8_encode($value['Gerente de proyectos']);?></td>
                    <td><?php echo utf8_encode($value['Factura']);?></td>
                    <td><?php echo $value['Facturacion'];?></td>

                    <td><?php echo utf8_encode($value['Servicio']);?></td>
                    <td><?php echo utf8_encode($value['Observaciones']);?></td>
                  </tr>
            <?php

            }


            }else{?>
            <tr>
                <td colspan="4">No hay registros para mostrar</td>
            </tr><?php

            }
            ?>
        </table>

    </form>
    <div>
        <a href="exportar.php">Descargar</a>
    </div>
  </body>
</html>
