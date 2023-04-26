<?php 

    class TipoContenido extends Controllers
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

        public function TipoContenido()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = " Tipo Contenido";
            $data['page_tag2'] = "<small>AprendoMate 3° Básico</small>";
            $data['page_title'] = "Tipo Contenido";
            $data['page_name'] = "TIPO CONTENIDO";
            $data['page_functions_js'] = "functions_tipo_contenido.js";
            $this->views->getView($this, "tipocontenido", $data);
        }
        public function getTipoContenidos()
		{
            $arrData = $this->model->selectTContenidos();

            for ($i=0; $i < count($arrData); $i++) {
                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                        <button class="btn btn-primary btn-sm btnEditTipoC" onClick="fntEditTipoC('.$arrData[$i]['idtipoC'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm btnDelTipoC" onClick="fntDelTipoC('.$arrData[$i]['idtipoC'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                        </div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getSelectTContenidos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectTContenidos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idtipoC'].'">'.$arrData[$i]['nombretipoC'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
        public function setTipoContenido(){
			$intIdTipoC = intval($_POST['idtipoC']);
            $intCodigo = intval($_POST['txtCodigo']);
			$strNombreTC =  strClean($_POST['txtNombreTC']);
			$intStatus = intval($_POST['listStatus']);
			$strDescripcion =  strClean($_POST['txtDescripcion']);

			$ruta = strtolower(clear_cadena($strNombreTC));
			$ruta = str_replace(" ","-",$ruta);

			if($intIdTipoC == 0)
			{
				//Crear
				$request_tipo_contenido = $this->model->insertTipoC($intCodigo, $strNombreTC, $strDescripcion, $intStatus, $ruta);
				$option = 1;
			}else{
				//Actualizar
				$request_tipo_contenido = $this->model->updateTipoC($intIdTipoC, $intCodigo, $strNombreTC, $strDescripcion, $intStatus, $ruta);
				$option = 2;
			}

			if($request_tipo_contenido > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_tipo_contenido == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El tipo de contenido ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}


    }
?>