<?php 

/**
* Clase capcidad sirve para hacer los metodos como consutar y actualizar.

Esta clase pérmite hacer un metodo de actualizar, el cual me sirve para almacenar todo el informe de capacidad si se hace algun cambio me lo actualiza aqui solo llamando el procedimieto almacenado. Y el metodo Consultar me consulta segun el mes todo el informe de capacidad.
@author Eimmy Salcedo
@access 
@version
*/

class capacidad 
{
	public static function Actualiza_Capacidad($nombre,$apellido,$ubicacion,$idcargo,$facturacion,$idrol,$idcliente,$idnovedad,$idservicio,$idciudad,$obser,$codigo){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$query = $pdo->prepare("UPDATE datos_analista  SET Nombres=?, Apellidos=?, Ubicacion=?, Id_Cargo=?, Facturacion=?,Id_Rol=?, Id_Cliente=?, Id_Novedad=?, Id_Servicio=?, Id_Ciudad=?, Observaciones=? WHERE Id_Usuario=?");
		
		$query->execute(array($nombre,$apellido,$ubicacion,$idcargo,$facturacion,$idrol,$idcliente,$idnovedad,$idservicio,$idciudad,$obser,$codigo)); 

		ConexionBD::CerrarBD();
	}


	public static function Actualiza_Document($documento, $codigo){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$query = $pdo->prepare("UPDATE Usuario SET Num_Documento =? WHERE Id_usuario= ?");
		

		$query->execute(array($documento,$codigo)); 

		$result = $query->fetchALL(PDO::FETCH_BOTH);
	

		ConexionBD::CerrarBD();
		
		return $result;
	
}
	public static function consulta_codigo($codigo){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql ="SELECT 
			DC.Nombres,
			DC.Apellidos,
			U.Num_Documento,
			DC.Ubicacion,
			DC.Id_Cargo,
			Cl.Gerente_Proyecto,
			DC.Facturacion,
			Dc.Id_Rol,
			Dc.Id_Cliente,
			DC.Id_Novedad,
			DC.Id_Servicio,
			DC.Id_Ciudad,
			DC.Observaciones,
			U.Id_Usuario

			FROM datos_analista DC 
			INNER JOIN Cliente Cl ON Cl.Id_Cliente = DC.Id_Cliente 
			INNER JOIN Usuario U 
			ON U.Id_Usuario = DC.Id_Usuario
			WHERE Id_Datos=?";

		$query= $pdo->prepare($sql);
	    $query->execute(array($codigo));
	    $result= $query->fetch(PDO::FETCH_BOTH);
	    ConexionBD::CerrarBD();
	    return $result;
	}

	public static function consulta_cargo()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT c.Id_Cargo,c.Nombre_Cargo FROM Cargo c";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}

	public function consulta_rol()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT r.Id_Rol,r.Nombre_Rol FROM Rol r";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}
	public function consulta_cliente()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT C.Id_Cliente,C.Nombre_Cliente,C.Gerente_Proyecto FROM Cliente C";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}
	public function consulta_novedad()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT N.Id_Novedad,N.Tipo_Novedad FROM Novedad N";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}
	public function consulta_servicio()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT S.Id_Servicio,S.Nombre_Servicio FROM Servicio S";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}
	public function consulta_ciudad()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql="SELECT Ci.Id_Ciudad,Ci.Nombre_Ciudad FROM Ciudad Ci";

	      $query = $pdo->prepare($sql);
	      $query -> execute();

	      $result = $query->fetchAll(PDO::FETCH_BOTH);

	      ConexionBD::CerrarBD();

	      return $result;
	}

	public static function Consult_Capacidad()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$query= $pdo->prepare("CALL Consultar_Datos()");

		$query->execute();

		$result = $query->fetchALL(PDO::FETCH_BOTH);

		ConexionBD::CerrarBD();

		return $result;

	}

	public static function Consulta_Persona()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$query = $pdo->prepare("CALL Consulta_Analista()");

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_BOTH);

		ConexionBD::CerrarBD();
		return $result;
	}
	public function Consulta_Historico()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query= $pdo->prepare("CALL Historico()");

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_BOTH);

		ConexionBD::CerrarBD();

		return $result;
	}
	public function Exportar_excel()
	{
		$pdo = ConexionBD::AbrirBD();

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $pdo->prepare("CALL Consultar_Datos()");

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_BOTH);

		ConexionBD::CerrarBD();

		return $result;
	}
}



 ?>