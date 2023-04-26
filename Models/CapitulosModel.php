<?php 

    class CapitulosModel extends Mysql
    {
        public $intIdCapitulos;
        public $intCodigo;
        public $strNombreC;
        public $intStatus;
		public $strRuta;
        public $intTipoId;

        public function __construct()
        {
            parent::__construct();
        }

        public function selectCapitulos()
        {
            //EXTRAE CAPITULOS
            $sql = "SELECT c.idCapitulos,c.codigoCapitulos,c.nombreCapitulos,c.status,u.nombreUnidad 
					FROM capitulos c 
					INNER JOIN unidades u 
					ON c.unidadesId = u.idUnidades 
					WHERE c.status != 0; ";
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectCapitulo(int $idCapitulos)
		{
			//BUSCAR CAPITULO
			$this->intIdCapitulos = $idCapitulos;
			$sql = "SELECT * FROM capitulos WHERE idCapitulos = $this->intIdCapitulos";
			$request = $this->select($sql);
			return $request;
		}
        public function insertCapitulo(int $codigoCapitulos, string $nombreCapitulos, int $status, string $ruta, int $tipounidad){

			$return = 0 ;
			$this->intCodigo = $codigoCapitulos;
			$this->strNombreC = $nombreCapitulos;
			$this->intStatus = $status;
			$this->strRuta = $ruta;
            $this->intTipoId = $tipounidad;

			$sql = "SELECT * FROM capitulos WHERE nombreCapitulos = '{$this->strNombreC}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO capitulos(codigoCapitulos,nombreCapitulos,status,ruta,unidadesId) VALUES(?,?,?,?,?)";
	        	$arrData = array($this->intCodigo, 
                                 $this->strNombreC,
                                 $this->intStatus,
								 $this->strRuta,
                                 $this->intTipoId);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
        public function updateCapitulo(int $idCapitulos, int $codigoCapitulos, string $nombreCapitulos, int $status, string $ruta, int $tipounidad){
			$this->intIdCapitulos = $idCapitulos;
			$this->intCodigo = $codigoCapitulos;
			$this->strNombreC = $nombreCapitulos;
			$this->intStatus = $status;
			$this->strRuta = $ruta;
            $this->intTipoId = $tipounidad;

			$sql = "SELECT * FROM capitulos WHERE nombreCapitulos = '$this->strNombreC' AND idCapitulos != $this->intIdCapitulos";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE capitulos SET codigoCapitulos = ?, nombreCapitulos = ?, status = ?, ruta = ?, unidadesId = ?
                WHERE idCapitulos = $this->intIdCapitulos ";
				$arrData = array($this->intCodigo,
                                 $this->strNombreC,
                                 $this->intStatus,
								 $this->strRuta,
                                 $this->intTipoId);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
		public function deleteCapitulo(int $intIdCapitulos)
		{
			$this->intIdCapitulos = $intIdCapitulos;
			if(empty($request))
			{

				$sql = "UPDATE capitulos SET status = ? WHERE idCapitulos = $this->intIdCapitulos ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				return $request;
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}
    }
?>