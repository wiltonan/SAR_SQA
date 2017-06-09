<?php
class Horas_Extras
{
  // ---------------------------------------------------------------------------------------------------
    public static function Consulta_Analis(){
    $pdo = ConexionBD::AbrirBD();
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="SELECT Id_Temporal_E,Analista,Empresa_Contrata,Fecha,Horas From temporal_extras  group by Analista";
    $query = $pdo->prepare($sql);
    $query -> execute();
    $result = $query->fetchAll(PDO::FETCH_BOTH);
    ConexionBD::CerrarBD();
    return $result;
   }

   // ---------------------------------------------------------------------------------------------------
       public static function Consulta_Horas($Consultar){
         $pdo = ConexionBD::AbrirBD();
         $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql ="SELECT Id_Temporal_E,Analista,Fecha,Horas,Comentario FROM temporal_extras  where Id_Temporal_E = ? group by Fecha";
         $query = $pdo->prepare($sql);
         $query -> execute(array($Consultar));
         $result = $query->fetch(PDO::FETCH_BOTH);

         ConexionBD::CerrarBD();
         return $result;
       }
// ---------------------------------------------

public static function Analista(){
  $pdo = ConexionBD::AbrirBD();
  $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql ="SELECT Analista FROM temporal_extras  where Analista = ?";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $result = $query->fetch(PDO::FETCH_BOTH);

  ConexionBD::CerrarBD();
  return $result;
}

// --------------------------------------------------

        public static function Recargo1(){
          $pdo = ConexionBD::AbrirBD();
          $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sql ="SELECT Cantidad_Horas FROM horas_extras";
          $query = $pdo->prepare($sql);
          $query -> execute();
          $result = $query->fetch(PDO::FETCH_BOTH);
          ConexionBD::CerrarBD();
          return $result;
        }

//---------------------------------------------------------------------------------------------------------------------
     public static function recargo()

 {
       $pdo = ConexionBD::AbrirBD();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $sql="SELECT Descripcion FROM tipo_hora where Descripcion ='Recargo' ";
       $query = $pdo->prepare($sql);

       $query -> execute();
       $result = $query->fetchAll(PDO::FETCH_BOTH);
       ConexionBD::CerrarBD();
       return $result;

 }


//----------------------------------------------------------------------------------------------------
       public static function pagas(){
         $pdo = ConexionBD::AbrirBD();
         $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql="SELECT Descripcion FROM tipo_pago";
         $query = $pdo->prepare($sql);
         $query -> execute();
         $result = $query->fetchAll(PDO::FETCH_BOTH);
         ConexionBD::CerrarBD();
         return $result;
       }

      //  ----------------------------------------------------------------------------------------------------

      public static function Cliente(){

      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql ="SELECT Nombre_Cliente
      FROM cliente";
      $query = $pdo -> prepare($sql);
      $query -> execute();
      $result = $query -> fetchAll(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
}

      // ---------------------------------------------------------------------------------------------------
       public static function GenerarPDF(){

       $pdo = ConexionBD::AbrirBD();
       $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql ="SELECT Fecha,Empresa_Contrata,Analista,Num_documento,Nombre_Cargo,horas
       FROM temporal_extras,usuario,cargo where horas = '?'";
       $query = $pdo -> prepare($sql);
       $query -> execute();
       $result = $query -> fetchAll(PDO::FETCH_BOTH);
       ConexionBD::CerrarBD();
       return $result;
}
      // ---------------------------------------------------------------------------------------------------
      public static function Consulta_Cliente(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * From cliente";
      $query = $pdo -> prepare($sql);
      $query -> execute();
      $result = $query -> fetchAll(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
}

      public static function Extras(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CALL CALCULAREXTRAS();";
      $query = $pdo -> prepare($sql);
      $query -> execute();
      $result = $query -> fetchAll(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
      }

    // ---------------------------------------------------------------------------------------------------

      public function Modificar_cliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas, $actualizar)
     {
       $pdo = ConexionBD::AbrirBD();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query = $pdo->prepare("UPDATE cliente SET Gerente_Proyecto =?, Nombre_Cliente =?, Hora_Inicio =?, Hora_Fin =?, Horas_Laboradas =? WHERE Id_Cliente =?");
       $query->execute(array($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas, $actualizar));
       $result = $query->fetchALL(PDO::FETCH_BOTH);
       ConexionBD::CerrarBD();
       return $result;
     }
   // ---------------------------------------------------------------------------------------------------

      public static function registrarcliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas){
       $pdo = ConexionBD::AbrirBD();
       $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $sql="INSERT INTO cliente(Gerente_Proyecto, Nombre_Cliente, Hora_Inicio, Hora_Fin, Horas_Laboradas)values(?,?,?,?,?)";
       $query = $pdo->prepare($sql);
       $query -> execute(array($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas));
       ConexionBD::CerrarBD();
     }

   // ---------------------------------------------------------------------------------------------------

      public static function RegistrarRecargo($Fecha, $Cantidad_Horas, $Comentario, $Empresa_Contrata){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO horas_extras(Fecha,Cantidad_Horas,Comentario,Empresa_Contrata)values(?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Fecha, $Cantidad_Horas, $Comentario, $Empresa_Contrata));
       ConexionBD::CerrarBD();
    }

  // ----------------------------------------------------------------------------------------------------------------------

        public static function Registrarhoras($Fecha, $Cantidad_Horas){
        $pdo = ConexionBD::AbrirBD();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO horas_extras(Fecha,Cantidad_Hora)values(?,?)";
        $query = $pdo->prepare($sql);
        $query -> execute(array($Fecha, $Cantidad_Hora));
         ConexionBD::CerrarBD();
      }
// ---------------------------------------------------------------------------------------------------------------------------

      public static function RegistrarDescripcion($Descripcion){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO tipo_hora(Descripcion)values(?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Descripcion));
       ConexionBD::CerrarBD();
    }
      public static function RegistroPaga($Id_tipo_hora)

      {

        $pdo = ConexionBD::AbrirBD();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = " INSERT INTO tipo_pago(Descripcion)values(?)";
        $query = $pdo->prepare($sql);
        $query -> execute(array($Id_tipo_hora));
         ConexionBD::CerrarBD();

      }


     // ------------------------------------------------------------------------------

      public static function temporal_extras($Proyecto,$Fecha,$Analista,$Actividad_Rh,$Actividad,$Comentario,$Horas,$Empresa_Contrata,$ciudad,$Extras)

      {

        $pdo = ConexionBD::AbrirBD();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO temporal_extras(Proyecto,Fecha,Analista,Actividad_Rh,Actividad,Comentario,Horas,Empresa_Contrata,
        ciudad,Extras)values(?,?,?,?,?,?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query -> execute(array($Proyecto,$Fecha,$Analista,$Actividad_Rh,$Actividad,$Comentario,$Horas,$Empresa_Contrata,$ciudad,$Extras));
         ConexionBD::CerrarBD();

      }


// ---------------------------------------------------------------------------------------------------
       public function hacer_una_consulta($actualizar){
          $pdo = ConexionBD::AbrirBD();
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT Id_Cliente,Gerente_Proyecto,Nombre_Cliente,
          Hora_Inicio,Hora_Fin,Horas_Laboradas  from cliente  where Id_Cliente = ?";
          $query = $pdo -> prepare($sql);
          $query -> execute(array($actualizar));
          $result = $query -> fetch(PDO::FETCH_BOTH);
          ConexionBD::CerrarBD();
          return $result;
        }
}
 ?>
