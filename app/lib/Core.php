<?php 

	/*Mapear la Url del navegador,
	1.controlador
	2.metodo
	3.parametro
	*/

	class Core{
		protected $controladorActual = "pages";
		protected $metodoActual = "index";
		protected $parametros = [];

		//Construtor
		public function __construct(){
			// print_r($this->getUrl());
			$url = $this->getUrl();

			//Buscar en controller si en controlador existe
			if (file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
				//Si existe se setea como controlador por defecto
				$this->controladorActual = ucwords($url[0]);
				//unset indice
				unset($url[0]);
			}
			//requerir el controlador
			require_once '../app/controllers/' .$this->controladorActual. '.php';
			$this->controladorActual = new $this->controladorActual;

			//Chequear la segunda parte de la url el cual es el metodo
			if (isset($url[1])){
				if (method_exists($this->controladorActual, $url[1])){
					//Chequeamos el método
					$this->metodoActual = $url[1];
					//unset indice
					unset($url[1]);
				}
			}
			// echo $this->metodoActual;

			//obtener los parametros
			$this->parametros = $url ? array_values($url) : [];

			//Llamar callback con parametros array
			call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

		}

		public function getUrl(){
			// echo $_GET['url'];
			if (isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}

