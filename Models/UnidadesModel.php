<?php 

    class UnidadesModel extends Mysql
    {
        public $intIdUnidades;
        public $intCodigo;
        public $strNombreU;
        public $intStatus;
		public $strRuta;

        public function __construct()
        {
            parent::__construct();
        }

        public function selectUnidades()
        {
            //EXTRAE UNIDADES
            $sql = "SELECT  p.idUnidades,
                            p.codigoUnidad,
                            p.nombreUnidad,
                            p.status 
                            FROM unidades p
                            INNER JOIN capitulos c
                            ON unidadesId = c.idCapitulos
                            WHERE p.status != 0;";
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectUnidad(int $idUnidades)
		{
			//BUSCAR Unidad
			$this->intIdUnidades = $idUnidades;
			$sql = "SELECT * FROM unidades WHERE idUnidades = $this->intIdUnidades";
			$request = $this->select($sql);
			return $request;
		}
        public function insertUnidad(int $codigoUnidad, string $nombreUnidad, int $status, string $ruta){

			$return = "";
			$this->intCodigo = $codigoUnidad;
			$this->strNombreU = $nombreUnidad;
			$this->intStatus = $status;
			$this->strRuta = $ruta;

			$sql = "SELECT * FROM unidades WHERE nombreUnidad = '{$this->strNombreU}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO unidades(codigoUnidad,nombreUnidad,status,ruta) VALUES(?,?,?,?)";
	        	$arrData = array($this->intCodigo, 
								 $this->strNombreU, 
								 $this->intStatus,
								 $this->strRuta);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
        public function updateUnidad(int $idUnidades, int $codigoUnidad, string $nombreUnidad, int $status, string $ruta){
			$this->intIdUnidades = $idUnidades;
			$this->intCodigo = $codigoUnidad;
			$this->strNombreU = $nombreUnidad;
			$this->intStatus = $status;
			$this->strRuta = $ruta;

			$sql = "SELECT * FROM unidades WHERE nombreUnidad = '$this->strNombreU' AND idUnidades != $this->intIdUnidades";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE unidades SET codigoUnidad = ?, nombreUnidad = ?, status = ?, ruta = ? WHERE idUnidades = $this->intIdUnidades ";
				$arrData = array($this->intCodigo,
								 $this->strNombreU,
								 $this->intStatus,
								 $this->strRuta);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
        public function deleteUnidad(int $idUnidades)
		{
			$this->intIdUnidades = $idUnidades;
			$sql = "SELECT * FROM capitulos WHERE unidadesId = $this->intIdUnidades";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE unidades SET status = ? WHERE idUnidades = $this->intIdUnidades ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
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