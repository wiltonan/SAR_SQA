<?php
session_start();
require_once '../model/connection.php';
require_once '../model/login.class.php';

$accion =$_REQUEST['action'];
switch ($accion) {
  case 'login':
    $usu = $_POST['txtusname'];
    $pas = $_POST['txtkey'];
    try {
      $resul = Validar::Login($usu,$pas);
      if ($usu=="" or $pas=="") {
        echo "<script>alert('Por favor llene todos los datos.');
                self.location.href='../';
              </script>";
      }else{ 
        if ($resul[0]==$usu and $resul[1]==$pas){
          if ($resul[2]==1) {
            if ($resul[3]==3) {
              $_SESSION['codigo'] = $resul[5];
              $_SESSION['nombre'] = $resul[4];
              echo "<script>location.href='../view/menu/Administrador.php'; </script>";
            }
          }else{
             echo "<script>alert('El usuario esta inactivo');
                  self.location.href='../';
                </script>";
          }
        }else{
           echo "<script>alert('Usuario o contraseña incorrecto ');
                  self.location.href='../';
                </script>";
        }
      }
    } catch (Exception $e) {
      echo "posible error";
    }
  break;

  default:
   echo "entro por donde no era :)¨¨(:";
  break;

  // Este es la otra parte para cerrar session y la ultima
  case 'session':
    session_destroy();
    echo "<script>
      self.location.href='../';
    </script>";
  break;
}
?>
