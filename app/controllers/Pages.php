<?php 

	class Pages extends Controller{
		public function __construct(){
			
		}

		public function index(){
			
			$datos = [
				'titulo' => 'Bienvenidos a MVC Ip Proyectos Soluciones, su mejor elección en la web'
			];

			$this->vista('pages/inicio', $datos);
		}

		
	}