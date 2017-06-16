<?php
class ConexionBD{
	private static $dbhost="localhost";//host
	private static $dbname="sqa";//nombre de la base de datos
	private static $dbuser="root";//usuario
	private static $dbpass="";//password

  private static $conn=null;//variable que contiene la Conexion

    //funcion para abrir la Conexion
	public static function AbrirBD(){
		if (self::$conn==null) {
			try {
				self::$conn=new PDO('mysql:host='.self::$dbhost.';dbname='.self::$dbname.'',self::$dbuser,self::$dbpass);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			return self::$conn;
		}
	}
	// funcion para cerrar la coneccion
	public static function CerrarBD(){
		self::$conn=null;
	}
}
 ?>
