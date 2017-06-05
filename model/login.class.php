<?php
  class Validar{
    private static $query;
    private static $prepare;
    private static $resul;

    public static function Login($usu,$pas){
      try {
        $sql = ConexionBD::AbrirBD();
        self::$query = "SELECT u.Nombre_Usuario, u.Password, u.Estado, u.Id_Privilegio, u.Id_Usuario, da.Id_Datos        
              from usuario u
              inner join privilegios pr
              on u.Id_Privilegio = pr.Id_Privilegio

              left join datos_analista da
              on u.Id_Usuario = da.Id_Usuario

              WHERE u.Nombre_Usuario=? and u.Password=?";

        self::$prepare = $sql->prepare(self::$query);
        self::$prepare->execute(array($usu,$pas));

        self::$resul = self::$prepare->fetch(PDO::FETCH_BOTH);
        return self::$resul;
        
      } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
      }
    }
  }
 ?>
