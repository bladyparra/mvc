<?php 

	//Clase controlador principal
	//Se encargan de poder cargar los modelos y las vistas

	class Controller{
		//Cargar modelo
		public function modelo($modelo){
			//Carga
			require_once '../app/models/' .$modelo. '.php';
			//Instanciar en modelo
			return new $modelo();
		}

		//Cargar vista
		public function vista($vista, $datos = []){
			//Chequear si el archivo vista existe
			if(file_exists('../app/views/' .$vista. '.php')) {
				require_once '../app/views/' .$vista. '.php';
			}
			else{
				//Si el archivo de la vista no existe
				die('La Vista no existe');
			}
		}
	}
