<?php 

    class LoginModel extends Mysql
    {
        public $intIdUsuario;
        public $strUsuario;
        public $strPassword;
        public $strToken;

        public function __construct()
        {
            parent::__construct();
        }

        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;
            $sql = "SELECT idpersona, status FROM persona WHERE
                    identificacion = '$this->strUsuario' and
                    password = '$this->strPassword' and
                    status !=0";
            $request = $this->select($sql);
            return $request;
        }

        public function sessionLogin(int $iduser)
        {
            $this->intIdUsuario = $iduser;
            $sql = "SELECT  p.idpersona,
                            p.identificacion,
                            p.nombres,
                            p.apellidos,
                            r.idrol,r.nombrerol,
                            p.status 
                    FROM persona p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.idpersona = $this->intIdUsuario";
            $request = $this->select($sql);
            return $request;
        }
    }
?>