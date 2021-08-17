<?php
session_start();
require_once './autoload.php';
require_once './config/parameters.php';
require_once './config/Database.php';
require_once './helpers/Utils.php';

require_once './Views/templates/header.php';

function showError(){
    $error = new errorController();
    $error -> index();
}

if(isset($_GET['controller'])){
	$controler_name = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$controler_name = controller_default;
	//showError();
}else{
    showError();
    exit();
}

if(class_exists($controler_name)){	
	$controlador = new $controler_name();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$default = action_default;
		$controlador->$default();
	}else{
            showError();
            exit();
	}
}else{
    showError();
    exit();
}

require_once './Views/templates/footer.php';
