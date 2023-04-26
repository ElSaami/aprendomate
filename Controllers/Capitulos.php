<?php 

    class Capitulos extends Controllers
    {
        public function __construct()
        {
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
            parent::__construct();
        }

        public function Capitulos()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = " Capitulos";
            $data['page_tag2'] = "<small>AprendoMate 3° Básico</small>";
            $data['page_title'] = "Capitulos";
            $data['page_name'] = "CAPITULOS";
            $data['page_functions_js'] = "functions_capitulos.js";
            $this->views->getView($this, "capitulos", $data);
        }
        public function getCapitulos()
		{
			$arrData = $this->model->selectCapitulos();

			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-primary btn-sm btnEditCapitulo" onClick="fntEditCapitulo('.$arrData[$i]['idCapitulos'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelCapitulo" onClick="fntDelCapitulo('.$arrData[$i]['idCapitulos'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}
        public function getSelectCapitulos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectCapitulos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idCapitulos'].'">'.$arrData[$i]['nombreCapitulos'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
        public function getCapitulo(int $idCapitulos)
		{
			$intIdCapitulos = intval(strClean($idCapitulos));
			if($intIdCapitulos > 0)
			{
				$arrData = $this->model->selectCapitulo($intIdCapitulos);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
        public function setCapitulo(){
			$intIdCapitulos = intval($_POST['idCapitulos']);
            $intCodigo = intval($_POST['txtCodigo']);
			$strNombreC =  strClean($_POST['txtNombreCapitulo']);
			$intStatus = intval($_POST['listStatus']);
			$intTipoId = intval($_POST['listUnidadid']);

			$ruta = strtolower(clear_cadena($strNombreC));
			$ruta = str_replace(" ","-",$ruta);

			if($intIdCapitulos == 0)
			{
				//Crear
				$request_capitulo = $this->model->insertCapitulo($intCodigo, $strNombreC, $intStatus, $ruta, $intTipoId);
				$option = 1;
			}else{
				//Actualizar
				$request_capitulo = $this->model->updateCapitulo($intIdCapitulos, $intCodigo, $strNombreC, $intStatus, $ruta, $intTipoId);
				$option = 2;
			}

			if($request_capitulo > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_capitulo == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! La Unidad ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}
		public function delCapitulo()
		{
			if($_POST){
				$intIdCapitulos = intval($_POST['idCapitulos']);
				$requestDelete = $this->model->deleteCapitulo($intIdCapitulos);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Capitulo');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el capitulo.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Capitulo.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
    }
?>