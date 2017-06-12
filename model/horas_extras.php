<?php
class Horas_Extras
{

// -----------------------------------------------------------------------------

     // Consulta para mostrar todos los analistas que estan en la base de datos
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

// -----------------------------------------------------------------------------

      //consulta para mostrr las horas por cada analista
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

//------------------------------------------------------------------------------

      /*Esta funcion es para consultar por cada analista que esta en la base de datos*/
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

//------------------------------------------------------------------------------

      /* esta funcion es para consulta el recargo */
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

//------------------------------------------------------------------------------

      /*consulta parar solo consultar nsolo el recargo y mostrarlo een la vista*/
      public static function recargo(){
      $pdo = ConexionBD::AbrirBD();
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="SELECT Descripcion FROM tipo_hora where Descripcion ='Recargo'";
      $query = $pdo->prepare($sql);
      $query -> execute();
      $result = $query->fetchAll(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
      }

//------------------------------------------------------------------------------

      //consulta donde muestra los datos de tipo pago
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

//------------------------------------------------------------------------------

      // consulta donde muestra solo el nombre de los clientes que existen
      public static function Cliente(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql ="SELECT Nombre_Cliente FROM cliente";
      $query = $pdo -> prepare($sql);
      $query -> execute();
      $result = $query -> fetchAll(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
      }

// -----------------------------------------------------------------------------

      // Consulta para generar el pdf por cada analista
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

//------------------------------------------------------------------------------

      /*consulta  para mostrar en la tabla de cliente*/
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

// -----------------------------------------------------------------------------

      /*procedimiento en proceso*/
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

//------------------------------------------------------------------------------

      /*funcion para la actualizacio del cliente*/
      public function Modificar_cliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas, $actualizar){
      $pdo = ConexionBD::AbrirBD();
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $query = $pdo->prepare("UPDATE cliente SET Gerente_Proyecto =?, Nombre_Cliente =?, Hora_Inicio =?, Hora_Fin =?, Horas_Laboradas =? WHERE Id_Cliente =?");
      $query->execute(array($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas, $actualizar));
      $result = $query->fetchALL(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
      }

//------------------------------------------------------------------------------
      /*funcion para el registro del cliente */
      public static function registrarcliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO cliente(Gerente_Proyecto, Nombre_Cliente, Hora_Inicio, Hora_Fin, Horas_Laboradas)values(?,?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas));
      ConexionBD::CerrarBD();
      }

//------------------------------------------------------------------------------

      /*funcion para el registro de recargo*/
      public static function RegistrarRecargo($Fecha, $Cantidad_Horas, $Comentario, $Empresa_Contrata){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO horas_extras(Fecha,Cantidad_Horas,Comentario,Empresa_Contrata)values(?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Fecha, $Cantidad_Horas, $Comentario, $Empresa_Contrata));
      ConexionBD::CerrarBD();
      }

// -----------------------------------------------------------------------------

      /*funcion para hacer el registro de las horas por analista*/
      public static function Registrarhoras($Fecha, $Cantidad_Horas){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO horas_extras(Fecha,Cantidad_Hora)values(?,?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Fecha, $Cantidad_Hora));
      ConexionBD::CerrarBD();
      }
// -----------------------------------------------------------------------------

      /*funcion para registras descripcion*/
      public static function RegistrarDescripcion($Descripcion){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="INSERT INTO tipo_hora(Descripcion)values(?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Descripcion));
      ConexionBD::CerrarBD();
      }

// -----------------------------------------------------------------------------

      /*funcion para el registro de las horas pagas*/
      public static function RegistroPaga($Id_tipo_hora){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = " INSERT INTO tipo_pago(Descripcion)values(?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Id_tipo_hora));
      ConexionBD::CerrarBD();
      }
// -----------------------------------------------------------------------------

      /*funcion para el registro del archivo de redmaine*/
      public static function temporal_extras($Proyecto,$Fecha,$Analista,$Actividad_Rh,$Actividad,$Comentario,$Horas,$Empresa_Contrata,$ciudad,$Extras){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO temporal_extras(Proyecto,Fecha,Analista,Actividad_Rh,Actividad,Comentario,Horas,Empresa_Contrata,
      ciudad,Extras)values(?,?,?,?,?,?,?,?,?,?)";
      $query = $pdo->prepare($sql);
      $query -> execute(array($Proyecto,$Fecha,$Analista,$Actividad_Rh,$Actividad,$Comentario,$Horas,$Empresa_Contrata,$ciudad,$Extras));
      ConexionBD::CerrarBD();
      }

//------------------------------------------------------------------------------

      /*funcion para consultar por el cliente que existe en la base de datos*/
      public function hacer_una_consulta($actualizar){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT Id_Cliente,Gerente_Proyecto,Nombre_Cliente,
      Hora_Inicio,Hora_Fin,Horas_Laboradas from cliente  where Id_Cliente = ?";
      $query = $pdo -> prepare($sql);
      $query -> execute(array($actualizar));
      $result = $query -> fetch(PDO::FETCH_BOTH);
      ConexionBD::CerrarBD();
      return $result;
      }
}

 ?>
