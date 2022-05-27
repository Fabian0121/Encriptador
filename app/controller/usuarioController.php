<?php
require 'app/Model/Usuario.php';

use Datos\Usuario;

class usuarioController
{
	//Si intentan entrar a una pagina del index los redirecciona al login si no hay sesion
	public function __construct()
	{
		if ($_GET["action"] == "inicioView") {
			if (!isset($_SESSION["id"])) {
				echo "No hay sesion";
				header("Location:/App-encriptador/index.php?controller=usuario&action=loginView");
			}
		}
	}
	//Funcion para ir a vista
	function registrarseView()
	{
		require 'app/View/registrarse.php';
	}
	//Funcion para registrarse
	function crearRegistro()
	{
		if($_POST['pass1'] != $_POST['pass2'])
		{
			$resultado['estatus'] = 0;
			$resultado['mensaje'] = "Error revisa que los password se han iguales";
			echo json_encode($resultado, JSON_FORCE_OBJECT);
		}
		else
		{
			$usuario = new Usuario();
			$usuario->nombre = $_POST['nombre'];
			$usuario->apellidoP = $_POST['apellidoP'];
			$usuario->apellidoM = $_POST['apellidoM'];
			$usuario->correo = $_POST['correo'];
			$usuario->password = $_POST['pass1'];
			$usuario->registrarUsuario();
		}
	}
	function loginView()
	{
		require 'app/View/login.php';
	}
	//Funcion para iniciar sesion
	function iniciarSesion()
	{
		if (isset($_POST['correo']) && isset($_POST['pass'])) {
			//Realiza una consulta
			$verificar = Usuario::verificarLogin($_POST['correo'], $_POST['pass']);
			if (!$verificar) {
				//Manda mensaje de error
				$resultado["estatus"] = 0;
				$resultado["mensaje"] = "Error en los datos, revisa tu password o correo";
				echo json_encode($resultado, JSON_FORCE_OBJECT);
			} else {
				$resultado["estatus"] = 1;
				$resultado["mensaje"] = "Sesion iniciada";
				//Se crea una sesion
				$_SESSION['id'] = $verificar->id;
				$_SESSION['nombreUsuario'] = $verificar->nombre . $verificar->apellidoP . $verificar->apellidoM;
				$_SESSION['correo'] = $verificar->correo;
				//Se redirrecciona a la pagina principal
				//header("Location:/App-encriptador/index.php?controller=usuario&action=inicioView");
				echo json_encode($resultado, JSON_FORCE_OBJECT);
				//exit();
			}
		}
		else{
			$resultado["estatus"] = 0;
			$resultado["mensaje"] = "Error en los datos, agrega algo en los campos";
			echo json_encode($resultado, JSON_FORCE_OBJECT);
		}
	}
	//Muestra pantalla de inicio en encriptador
	function inicioView()
	{
		require 'app/View/index.php';
	}
	//Cierra sesion
	function cerrarSesion()
	{
		SESSION_DESTROY();
		if (isset($_SESSION['id']))
			unset($_SESSION['id']);
		$_SESSION['id'] = false;

		header("Location:/App-encriptador/index.php?controller=usuario&action=loginView");
	}
}
