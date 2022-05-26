<?php
if ((!isset($_GET["controller"])) || (!isset($_GET["action"]))) {
	echo "Peticion invalida";
}
session_start();
$controller = $_GET["controller"]."Controller";

require 'app/Controller/'.$controller.".php";

$action =$_GET["action"];
$objeto = new $controller();
$objeto->{$action}();
?>