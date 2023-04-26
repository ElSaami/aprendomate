<?php 

    class Contenidos extends Controllers
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

        public function Contenidos()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = " Contenidos";
            $data['page_tag2'] = "<small>AprendoMate 3° Básico</small>";
            $data['page_title'] = "Contenidos";
            $data['page_name'] = "CONTENIDOS";
            $data['page_functions_js'] = "functions_contenidos.js";
            $this->views->getView($this, "contenidos", $data);
        }
        public function getContenidos()
		{
            $arrData = $this->model->selectContenidos();

            for ($i=0; $i < count($arrData); $i++) {
                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                        <button class="btn btn-primary btn-sm btnEditContenido" onClick="fntEditContenido('.$arrData[$i]['idContenidos'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm btnDelContenido" onClick="fntDelContenido('.$arrData[$i]['idContenidos'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                        </div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getSelectContenidos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectContenidos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idContenidos'].'">'.$arrData[$i]['nombreContenido'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
        public function setContenido(){
			$intIdContenidos = intval($_POST['idContenidos']);
            $intCodigo = intval($_POST['txtCodigo']);
			$strNombreC =  strClean($_POST['txtNombre']);
            $strTexto = strClean($_POST['txtContenido']);
			$intStatus = intval($_POST['listStatus']);
			$intTipoId = intval($_POST['listTipoContenido']);
            $intCapituloId = intval($_POST['listCapituloid']);

			$ruta = strtolower(clear_cadena($strNombreC));
			$ruta = str_replace(" ","-",$ruta);

			if($intIdContenidos == 0)
			{
				//Crear
				$request_contenidos = $this->model->insertContenido($intCodigo, $strNombreC, $strTexto, $intStatus, $ruta, $intTipoId, $intCapituloId);
				$option = 1;
			}else{
				//Actualizar
				$request_contenidos = $this->model->updateContenido($intIdContenidos, $intCodigo, $strNombreC, $intStatus, $ruta, $intTipoId, $intCapituloId);
				$option = 2;
			}

			if($request_contenidos > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_contenidos == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! La Unidad ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

    }
?>