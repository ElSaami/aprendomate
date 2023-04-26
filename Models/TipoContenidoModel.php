<?php 

    class TipoContenidoModel extends Mysql
    {
        public $intIdTipoC;
        public $intCodigo;
        public $strNombretipoC;
        public $intStatus;
        public $strDescripcion;
        public $strRuta;

        public function __construct()
        {
            parent::__construct();
        }

        public function selectTContenidos()
        {
            //EXTRAE Tipos de Contenido
            $sql = "SELECT t.idtipoC,t.codigotipoC,t.nombretipoC,t.descripcion, t.status
                    FROM tipo_contenido t 
                    WHERE t.status != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectTContenido(int $idtipoC)
        {
            //BUSCAR el tipo de contenido
            $this->intIdTipoC = $idtipoC;
            $sql = "SELECT * FROM tipo_contenido WHERE idtipoC = $this->intIdTipoC";
            $request = $this->select($sql);
            return $request;
        }
        public function insertTipoC(int $codigotipoC, string $nombretipoC, string $descripcion, int $status, string $ruta){

			$return = 0 ;
			$this->intCodigo = $codigotipoC;
			$this->strNombretipoC = $nombretipoC;
            $this->strDescripcion = $descripcion;
			$this->intStatus = $status;
            $this->strRuta = $ruta;

			$sql = "SELECT * FROM tipo_contenido WHERE codigotipoC = '{$this->intCodigo}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tipo_contenido(codigotipoC,nombretipoC,descripcion,status,ruta) VALUES(?,?,?,?,?)";
	        	$arrData = array($this->intCodigo, 
                                 $this->strNombretipoC,
                                 $this->strDescripcion,
                                 $this->intStatus,
                                 $this->strRuta);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
        public function updateTipoC(int $idtipoC, int $codigotipoC, string $nombretipoC, string $descripcion, int $status, string $ruta){
			$this->intIdTipoC = $idtipoC;
			$this->intCodigo = $codigotipoC;
			$this->strNombretipoC = $nombretipoC;
            $this->strDescripcion = $descripcion;
			$this->intStatus = $status;
            $this->strRuta = $ruta;

			$sql = "SELECT * FROM tipo_contenido WHERE codigotipoC != $this->intCodigo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tipo_contenido SET codigotipoC = ?, nombretipoC = ?, descripcion = ?, status = ?, ruta = ?
                WHERE idtipoC = $this->intIdTipoC ";
				$arrData = array($this->intCodigo,
                                 $this->strNombretipoC,
                                 $this->strDescripcion,
                                 $this->intStatus,
                                 $this->strRuta);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
    }

?>