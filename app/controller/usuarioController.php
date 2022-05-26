<?php
require 'app/Model/Usuario.php';
use UPT\Usuario;
class usuarioController{
    public function __construct(){

    }

    function saludo()
    {
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
    }
    /*
    //se usa para verficar si se inicio sesion
	public function __construct (){
		if ($_GET["action"]=="home") {
			if (!isset($_SESSION["Usuarios"])) {
				echo "No hay sesion";
				header("Location:/Proyecto/index.php?controller=Usuario&action=vistahome");
				
			}
		}
	}
	//Esta funcion muestra la vista Registrar
	function Registro (){

		 require "app/Views/Registro.php";
	}
	//Con esta funcion mando a llamar la vista de inicio
	function inicio (){
		require "app/Views/Inicio.php";
	}
	//Con esta funcion hago un registro
	function verificarRegistro (){
		//Llamo a la vista registro
		require "app/Views/Registro.php";
		$usuario = new Usuario();
		//Mandar datps
 		$usuario->nombre=$_POST['nombre'];
 		$usuario->apellidoPaterno=$_POST['apellidoP'];
 		$usuario->apellidoMaterno=$_POST['apellidoM'];
 		$usuario->nombreUsuario=$_POST['nombreUsuario'];
 		$usuario->correo=$_POST['correo'];
 		$usuario->contrasenia=$_POST['pass'];
 		$usuario->sexo=$_POST['sexo'];
 		$usuario->descripcion=$_POST['descripcion'];
 		$usuario->crear();
 		header("Location:/Proyecto/index.php?controller=Usuario&action=login");

	}

    */
}
?>