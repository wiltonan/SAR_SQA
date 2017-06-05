<?php
  class hoja_vida{
    public static function cnsltr_xstnc($cedu){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT u.Num_Documento FROM usuario u WHERE Num_Documento = ?";

      $query = $pdo->prepare($sql);
      $query -> execute(array($cedu));

      $result = $query->fetch(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

     public static function cnsltr_xstnc1($nick){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT u.Nombre_Usuario FROM usuario u WHERE Nombre_Usuario = ?";

      $query = $pdo->prepare($sql);
      $query -> execute(array($nick));

      $result = $query->fetch(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function crr_cv($car, $rol, $dire_docu, $usua){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $sql="INSERT INTO datos_analista(Id_Cargo, Id_Rol, Ruta_Anexos,Id_Usuario)values(?,?,?,?)";

      $query = $pdo->prepare($sql);
      $query -> execute(array($car,$rol,$dire_docu,$usua));

      ConexionBD::CerrarBD();    
    }

     public static function crr_sr($tip_docu,$privilegio,$cedu,$lugar_expedicion,$nick,$contra,$correo,$est){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql="INSERT INTO usuario(Id_Tipo_Documento, Id_Privilegio, Num_Documento, Lugar_Expedi, Nombre_Usuario, Password, Email, Estado) values (?,?,?,?,?,?,?,?)";

      $query = $pdo->prepare($sql);
      $query -> execute(array($tip_docu,$privilegio,$cedu,$lugar_expedicion,$nick,$contra,$correo,$est));

      ConexionBD::CerrarBD();    
    }

    public static function mstrr_tp_dcmnt(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT tipo_documento.Id_Tipo_Documento,tipo_documento.Descripcion FROM tipo_documento";

      $query = $pdo->prepare($sql);
      $query -> execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function mstrr_prfl(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT p.Id_Privilegio, p.Tipo_Privilegio FROM privilegios p";

      $query = $pdo->prepare($sql);
      $query -> execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function mstrr_sr_sn_cv(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT u.Id_Usuario, u.Num_Documento FROM usuario u left join datos_analista da on da.Id_Usuario= u.Id_Usuario where da.Id_Usuario is null";

      $query = $pdo->prepare($sql);
      $query -> execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function mstrr_crg(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT c.Id_Cargo, c.Nombre_Cargo FROM cargo c";

      $query = $pdo->prepare($sql);
      $query -> execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function mstrr_rl(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT r.Id_Rol, r.Nombre_Rol FROM rol r";

      $query = $pdo->prepare($sql);
      $query -> execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function tbl_sr(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT dts.Id_Datos, dts.Nombres, dts.Apellidos, dts.Telefono, dts.Celular, dts.Ruta_Anexos, u.Num_Documento, tp.Descripcion, cl.Nombre_Cliente
        FROM datos_analista dts
        
        LEFT JOIN cliente cl
        ON dts.Id_Cliente = cl.Id_Cliente

        INNER JOIN usuario u
        ON dts.Id_Usuario = u.Id_Usuario

        INNER JOIN tipo_documento tp
        ON u.Id_Tipo_Documento = tp.Id_Tipo_Documento

        where dts.Nombres is not null AND dts.Apellidos is not null";

        $query = $pdo -> prepare($sql);
        $query -> execute();

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }


    // public static function tbl_sr(){
    //   $pdo = ConexionBD::AbrirBD();
    //   $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //   $sql = $pdo -> prepare("CALL consultar usuario()");

    //     $sql -> execute();

    //     $result = $sql -> fetchAll(PDO::FETCH_BOTH);

    //     ConexionBD::CerrarBD();

    //     return $result;
    // }

    public static function bscdr($buscar){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql = "SELECT dts.Id_Datos, dts.Nombres, dts.Apellidos, dts.Telefono,
            dts.Celular, dts.Ruta_Anexos, u.Num_Documento,tp.Descripcion
            FROM datos_analista dts

            INNER JOIN usuario u
            ON dts.Id_Usuario = u.Id_Usuario

            INNER JOIN tipo_documento tp
            ON u.Id_Tipo_Documento = tp.Id_Tipo_Documento 

            WHERE dts.Nombres OR u.Num_Documento  

            LIKE CONCAT('%',?,'%') ";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($buscar));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    // public static function mstrr_hj($usuario){
    //   $pdo = ConexionBD::AbrirBD();
    //   $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //   $sql = "SELECT dts.Nombres, dts.Apellidos, dts.Telefono, dts.Celular, dts.Ruta_Anexos, u.Num_Documento, tp.Descripcion, u.Lugar_Expedi, el.Empresa, el.Cargo, el.Fecha_Inicio, el.Fecha_Fin, el.Contacto, el.Meses_Experiencia, se.Descripcion, es.Titulo, es.Institucion, es.Fecha_Inicio, es.Fecha_Fin, es.Observaciones, es.Tarjeta_Profesional, te.Nivel_Formacion

    //     FROM datos_analista dts

    //     LEFT JOIN usuario u
    //     ON dts.Id_Usuario = u.Id_Usuario

    //     LEFT JOIN tipo_documento tp
    //     ON u.Id_Tipo_Documento = tp.Id_Tipo_Documento

    //     LEFT JOIN Experiencia_laboral el
    //     ON dts.Id_Datos = el.Id_Datos

    //     LEFT JOIN sector se
    //     ON el.Id_Sector = se.Id_Sector

    //     LEFT JOIN estudio es
    //     ON dts.Id_Datos = es.Id_Datos

    //     LEFT JOIN tipo_estudio te
    //     ON es.Id_tipo_Estudio = te.Id_tipo_Estudio

    //     WHERE dts.Id_Datos =?";

    //     $query = $pdo -> prepare($sql);
    //     $query -> execute(array($usuario));

    //     $result = $query -> fetchAll(PDO::FETCH_BOTH);

    //     ConexionBD::CerrarBD();

    //     return $result;
    // }

    public static function datos_personales($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT dts.Nombres, dts.Apellidos, dts.Telefono, dts.Celular, dts.Ruta_Anexos, u.Num_Documento, tp.Descripcion, dts.Id_Datos, u.Lugar_Expedi
        FROM datos_analista dts

        LEFT JOIN usuario u
        ON dts.Id_Usuario = u.Id_Usuario

        LEFT JOIN tipo_documento tp
        ON u.Id_Tipo_Documento = tp.Id_Tipo_Documento

        WHERE dts.Id_Datos =?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

     public static function datos_laborales($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT el.Empresa, el.Cargo, el.Fecha_Inicio, el.Fecha_Fin, el.Contacto, el.Meses_Experiencia, se.Descripcion
        FROM experiencia_laboral el

        LEFT JOIN sector se
        ON el.Id_Sector = se.Id_Sector

        WHERE el.Id_Datos =?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario));

        
        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    public static function datos_estudiosc($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $Técni="Técnico";
      $Tecno="Tecnologia";
      $Pregr="Pregrado";
      $Postg="Postgrado";

      $sql = "SELECT es.Titulo, es.Institucion, es.Fecha_Inicio, es.Fecha_Fin, es.Observaciones, es.Tarjeta_Profesional, es.nivel, te.Nivel_Formacion
        FROM estudio es

        LEFT JOIN tipo_estudio te
        ON es.Id_tipo_Estudio = te.Id_tipo_Estudio

      WHERE es.Id_Datos =? and te.Nivel_Formacion=? or te.Nivel_Formacion=? or te.Nivel_Formacion=? or te.Nivel_Formacion=?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario, $Técni, $Tecno, $Pregr, $Postg));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    public static function datos_estudiost($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $semi="Seminario";
      $curs="Curso";

      $sql = "SELECT es.Titulo, es.Institucion, es.Fecha_Inicio, es.Fecha_Fin, es.Observaciones, es.Tarjeta_Profesional, es.nivel, te.Nivel_Formacion
        FROM estudio es

        LEFT JOIN tipo_estudio te
        ON es.Id_tipo_Estudio = te.Id_tipo_Estudio

      WHERE es.Id_Datos =? and te.Nivel_Formacion=? or te.Nivel_Formacion=?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario, $semi, $curs));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    public static function datos_estudiosp($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $idio="Idioma";
      $sql = "SELECT es.Titulo, es.Institucion, es.Fecha_Inicio, es.Fecha_Fin, es.Observaciones, es.Tarjeta_Profesional, es.nivel, te.Nivel_Formacion
        FROM estudio es

        LEFT JOIN tipo_estudio te
        ON es.Id_tipo_Estudio = te.Id_tipo_Estudio

      WHERE es.Id_Datos =? and te.Nivel_Formacion=?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario, $idio));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    public static function datos_estudiosi($usuario){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $platafor="Plataformas";
      $sql = "SELECT es.Titulo, es.Institucion, es.Fecha_Inicio, es.Fecha_Fin, es.Observaciones, es.Tarjeta_Profesional, es.nivel, te.Nivel_Formacion
        FROM estudio es

        LEFT JOIN tipo_estudio te
        ON es.Id_tipo_Estudio = te.Id_tipo_Estudio

        WHERE es.Id_Datos =? and te.Nivel_Formacion=?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array($usuario,$platafor));

        $result = $query -> fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

    public static function cdg(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql = "SELECT dts.Id_Datos  FROM datos_analista dts";

      $query = $pdo -> prepare($sql);
      $query -> execute();

      $result = $query -> fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

     public static function mstrr_std(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql = "SELECT ts.Id_tipo_Estudio, ts.Nivel_Formacion FROM tipo_estudio ts";

      $query = $pdo -> prepare($sql);
      $query -> execute();

      $result = $query -> fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function prsnl($nombres, $apellidos,  $telefono, $celular, $cod){
      $pdo = ConexionBD::AbrirBD();
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $sql="UPDATE datos_analista SET Nombres= ?, Apellidos= ?, Telefono=?, Celular=? WHERE datos_analista.Id_Datos = ?";

      $query= $pdo->prepare($sql);
      $query->execute(array($nombres, $apellidos, $telefono, $celular, $cod));

      ConexionBD::CerrarBD();
    }

     public static function cnslt_ms_dts($codigo){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $sql="SELECT da.Nombres, da.Apellidos, da.Telefono, da.celular, da.Ruta_Anexos, td.Descripcion, u.Num_Documento, da.Id_Usuario, u.Id_Tipo_Documento, td.Id_Tipo_Documento

        FROM datos_analista da 

        INNER JOIN usuario u
        ON da.Id_Usuario = u.Id_Usuario

        INNER JOIN tipo_documento td
        ON u.Id_Tipo_Documento = td.Id_Tipo_Documento

       WHERE da.Id_Datos = ?";

      $query = $pdo->prepare($sql);
      $query -> execute(array($codigo));

      $result = $query->fetch(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function mstrr_sr_vr(){
      $pdo = ConexionBD::AbrirBD();
      $pdo ->  setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql = "SELECT dts.Id_Datos, dts.Nombres, dts.Apellidos, dts.Num_Documento, dts.Telefono, dts.Celular, dts.Ruta_Anexos, dts.Id_Tipo_Documento, tp.Descripcion
        FROM datos_analista dts
        INNER JOIN tipo_documento tp
        ON dts.Id_Tipo_Documento = tp.Id_Tipo_Documento
        WHERE Id_Datos=?";

        $query = $pdo -> prepare($sql);
        $query -> execute(array());

        $result = $query->fetchAll(PDO::FETCH_BOTH);

        ConexionBD::CerrarBD();

        return $result;
    }

     public static function mstrr_sctr(){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql = "SELECT s.Id_Sector, s.Descripcion FROM sector s";

      $query = $pdo -> prepare($sql);
      $query -> execute();

      $result = $query -> fetchAll(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function consul_expe_labo($cod, $sector, $empresa, $cargo){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql="SELECT e.Id_Datos, e.Id_Sector, e.Empresa, e.Cargo FROM experiencia_laboral e 
      WHERE e.Id_Datos = ? And e.Id_Sector=? And e.Empresa = ? And e.Cargo=?";

      $query = $pdo->prepare($sql);
      $query -> execute(array($cod, $sector, $empresa, $cargo));

      $result = $query->fetch(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }

    public static function lbrl($cod, $sector, $es_sqa, $empresa, $cargo, $fecha_inicip, $fecha_fin, $meses_experi, $celu_conta){
      $pdo = ConexionBD::AbrirBD();
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       $sql="INSERT INTO experiencia_laboral(Id_Datos, Id_Sector, Trabaja_en_empresa, Empresa, Cargo, Fecha_Inicio, Fecha_Fin,  Meses_Experiencia, Contacto) values(?,?,?,?,?,?,?,?,?)";
      
      $query= $pdo->prepare($sql);
      $query->execute(array($cod, $sector, $es_sqa, $empresa, $cargo, $fecha_inicip, $fecha_fin, $meses_experi, $celu_conta));

      ConexionBD::CerrarBD();
    }

    public static function consul_estudio($cod, $titulo_obtenido, $tipo_estudio){
      $pdo = ConexionBD::AbrirBD();
      $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo -> exec("SET CHARACTER SET utf8");
      $sql="SELECT e.Id_Datos, e.Titulo, e.Id_tipo_Estudio FROM estudio e WHERE e.Id_Datos = ? And e.Titulo=? And e.Id_tipo_Estudio = ?";

      $query = $pdo->prepare($sql);
      $query -> execute(array($cod, $titulo_obtenido, $tipo_estudio));

      $result = $query->fetch(PDO::FETCH_BOTH);

      ConexionBD::CerrarBD();

      return $result;
    }  

     public static function estudio($cod, $tipo_estudio, $titulo_obtenido, $institucion, $fecha_inicio, $fecha_fin, $obsevacion, $tarjeta_profesional, $nivel){
      $pdo = ConexionBD::AbrirBD();
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       $sql="INSERT INTO estudio(Id_Datos, Id_tipo_Estudio, Titulo, Institucion, Fecha_Inicio, Fecha_Fin, Observaciones, Tarjeta_Profesional, Nivel) values(?,?,?,?,?,?,?,?,?)";
      
      $query= $pdo->prepare($sql);
      $query->execute(array($cod, $tipo_estudio, $titulo_obtenido, $institucion, $fecha_inicio, $fecha_fin, $tarjeta_profesional, $obsevacion, $nivel));

      ConexionBD::CerrarBD();
    }   
  }
?>