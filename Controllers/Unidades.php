<?php 

    class Unidades extends Controllers
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

        public function Unidades()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = " Unidades";
            $data['page_tag2'] = "<small>AprendoMate 3° Básico</small>";
            $data['page_title'] = "Unidades";
            $data['page_name'] = "UNIDADES";
            $data['page_functions_js'] = "functions_unidades.js";
            $this->views->getView($this, "unidades", $data);
        }
        public function getUnidades()
		{
			$arrData = $this->model->selectUnidades();

			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-primary btn-sm btnEditUnidad" onClick="fntEditUnidad('.$arrData[$i]['idUnidades'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUnidad" onClick="fntDelUnidad('.$arrData[$i]['idUnidades'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}
        public function getSelectUnidades()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectUnidades();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idUnidades'].'">'.$arrData[$i]['nombreUnidad'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
        public function getUnidad(int $idUnidades)
		{
			$intIdUnidades = intval(strClean($idUnidades));
			if($intIdUnidades > 0)
			{
				$arrData = $this->model->selectUnidad($intIdUnidades);
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
        public function setUnidad(){
			
			$intIdUnidades = intval($_POST['idUnidades']);
            $intCodigo = intval($_POST['txtCodigo']);
			$strNombreU =  strClean($_POST['txtNombreU']);
			$intStatus = intval($_POST['listStatus']);

			$ruta = strtolower(clear_cadena($strNombreU));
			$ruta = str_replace(" ","-",$ruta);

			if($intIdUnidades == 0)
			{
				//Crear
				$request_unidad = $this->model->insertUnidad($intCodigo, $strNombreU, $intStatus, $ruta);
				$option = 1;
			}else{
				//Actualizar
				$request_unidad = $this->model->updateUnidad($intIdUnidades, $intCodigo, $strNombreU, $intStatus, $ruta);
				$option = 2;
			}

			if($request_unidad > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_unidad == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! La Unidad ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}
        public function delUnidad()
		{
			if($_POST){
				$intIdUnidades = intval($_POST['idUnidades']);
				$requestDelete = $this->model->deleteUnidad($intIdUnidades);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Unidad');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar la Unidad ya que tiene Capitulos.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Unidad.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
    }
?>