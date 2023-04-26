<?php 

    class ContenidosModel extends Mysql
    {
        public $intIdContenidos;
        public $intCodigo;
        public $strNombreC;
        public $strTexto;
        public $intStatus;
        public $strRuta;
        public $intTipoId;
        public $intCapituloId;
        

        public function __construct()
        {
            parent::__construct();
        }

        public function selectContenidos()
        {
            //EXTRAE Tipos de Contenido
            $sql = "SELECT t.idContenidos,t.codigoContenidos,t.nombreContenido,t.textoContenido,t.status,c.nombretipoC, d.nombreCapitulos  
                    FROM contenidos t 
                    INNER JOIN tipo_contenido c
                    INNER JOIN capitulos d
                    ON t.tipoContenidoId = c.idtipoC
                    AND t.capitulosId = d.idCapitulos
                    WHERE t.status != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectContenido(int $idContenidos)
		{
			//BUSCAR CAPITULO
			$this->intIdContenidos = $idContenidos;
			$sql = "SELECT * FROM contenidos WHERE idContenidos = $this->intIdContenidos";
			$request = $this->select($sql);
			return $request;
		}
        public function insertContenido(int $codigoContenidos, string $nombreContenido, string $textoContenido, int $status, string $ruta, int $tipocontenido, int $tipocapitulo){

			$return = 0 ;
			$this->intCodigo = $codigoContenidos;
			$this->strNombreC = $nombreContenido;
            $this->strTexto = $textoContenido;
			$this->intStatus = $status;
            $this->strRuta = $ruta;
            $this->intTipoId = $tipocontenido;
            $this->intCapituloId = $tipocapitulo;

			$sql = "SELECT * FROM contenidos WHERE nombreContenido = '{$this->strNombreC}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO contenidos(codigoContenidos,nombreContenido,textoContenido,status,ruta,tipoContenidoId,capitulosId) VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array($this->intCodigo, 
                                 $this->strNombreC,
                                 $this->strTexto,
                                 $this->intStatus,
                                 $this->strRuta,
                                 $this->intTipoId,
                                 $this->intCapituloId);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
        public function updateContenido(int $idContenidos, $codigoContenidos, string $nombreContenido, string $textoContenido, int $status, string $ruta, int $tipocontenido, int $tipocapitulo){
			$this->intIdContenidos = $idContenidos;
			$this->intCodigo = $codigoContenidos;
			$this->strNombreC = $nombreContenido;
            $this->strTexto = $textoContenido;
			$this->intStatus = $status;
            $this->strRuta = $ruta;
            $this->intTipoId = $tipocontenido;
            $this->intCapituloId = $tipocapitulo;

			$sql = "SELECT * FROM contenidos WHERE nombreContenido = '$this->strNombreC' AND idContenidos != $this->intIdContenidos";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE contenidos SET codigoContenidos = ?, nombreContenido = ?, textoContenido = ?, status = ?, ruta = ?, tipoContenidoId  = ?, capitulosId = ?
                WHERE idContenidos = $this->intIdContenidos ";
				$arrData = array($this->intCodigo,
                                 $this->strNombreC,
                                 $this->strTexto,
                                 $this->intStatus,
                                 $this->strRuta,
                                 $this->intTipoId,
                                 $this->intCapituloId);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

    }
?>