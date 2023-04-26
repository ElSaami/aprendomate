<?php 

    class Paginas extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])) {
                header('Location: '.base_url().'/login');
            }
        }

        public function Paginas()
		{
			$data['page_id'] = 2;
            $data['page_tag'] = " Páginas";
			$data['page_tag2'] = "<small>AprendoMate 3° Básico</small>";
			$data['page_title'] = "Páginas";
			$data['page_name'] = "rol_usuario";
            $data['page_functions_js'] = "functions_roles.js";
			$this->views->getView($this,"paginas",$data);
		}
    }
?>