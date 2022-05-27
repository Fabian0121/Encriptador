<?php
require 'app/Model/Usuario.php';

use Datos\Usuario;

class usuarioController
{
	public function __construct()
	{
		if ($_GET["action"] == "inicioView") {
			if (!isset($_SESSION["id"])) {
				echo "No hay sesion";
				header("Location:/App-encriptador/index.php?controller=usuario&action=iniciarSesion");
			}
		}
	}
	//Funcion para registrarse
	function crearRegistro()
	{
		//Llamo a la vista registro
		//require "app/Views/Registro.php";
		$usuario = new Usuario();
		//Mandar datps
		$usuario->nombre = $_POST['nombre'];
		$usuario->apellidoP = $_POST['apellidoP'];
		$usuario->apellidoM = $_POST['apellidoM'];
		$usuario->correo = $_POST['correo'];
		$usuario->password = $_POST['pass'];
		$usuario->registrarUsuario();
	}
	//Funcion para iniciar sesion
	function iniciarSesion()
	{
		echo "iniciaseion";
		if (isset($_POST['correo']) && isset($_POST['pass'])) {
			//Realiza una consulta
			$verificar = Usuario::verificarLogin($_POST['correo'], $_POST['pass']);
			if (!$verificar) {
				//Manda mensaje de error
				$resultado["estatus"] = "0";
				$resultado["mensaje"] = "Error en los datos, revisa tu contraseña o correo";
				echo json_encode($resultado);
			} else {
				//Se crea una sesion
				$_SESSION['id'] = $verificar->id;
				$_SESSION['nombreUsuario'] = $verificar->nombre . $verificar->apellidoP . $verificar->apellidoM;
				$_SESSION['correo'] = $verificar->correo;
				//Se redirrecciona a la pagina principal
				header("Location:/App-encriptador/index.php?controller=usuario&action=inicioView");
			}
		}
		else{
			$resultado["estatus"] = "0";
			$resultado["mensaje"] = "Error en los datos, agrega algo en los campos";
			echo json_encode($resultado);
		}
	}
	//Muestra pantalla de inicio en encriptador
	function inicioView()
	{
		echo "Bienvenido";
	}
	//Cierra sesion
	function cerrarSesion()
	{
		SESSION_DESTROY();
		if (isset($_SESSION['id']))
			unset($_SESSION['id']);
		$_SESSION['id'] = false;

		header("Location:/App-encriptador/index.php?controller=usuario&action=iniciarSesion");
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
	

    //Con esta funcion llamo a la vista login
	function login (){
		require "app/Views/login.php";
	}
	//Con esta funcion compruebo si los datos introducidos son correctos
	function verificarlogin(){
		//Verificar si estan los datos
		if((!isset($_POST["nomUsuario"]) || (!isset($_POST["pass"])))){

		}
		//Variables a usar
		$nomUsuario=$_POST['nomUsuario'];
 		$contrasenia=$_POST['pass'];
 		//Se llama al metodo y pasan parametros
 		$verificar = Usuario::verificarUsuario($nomUsuario,$contrasenia);
 		if(!$verificar){
 			 $estatus = "Datos incorrectos";
 			require "app/Views/login.php";

        }else{
           
 		   // $_SESSION['Usuarios']=$verificar;
        	$_SESSION['Usuarios']=$nomUsuario;
            header("Location:/Proyecto/index.php?controller=Publicaciones&action=home");
        }
    */
}
