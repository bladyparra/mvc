<?php 
	
	//Cargamos las librerias
	require_once 'config/config.php';

	// require_once 'lib/Base.php';
	// require_once 'lib/Controller.php';
	// require_once 'lib/Core.php';

	//Autoload php

	spl_autoload_register(function($nombreClase){
		require_once 'lib/' .$nombreClase. '.php';
	});