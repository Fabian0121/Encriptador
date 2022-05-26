<?php
require 'app/Model/Usuario.php';
use Datos\Usuario;
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
    //
    function crearRegistro (){
		//Llamo a la vista registro
		//require "app/Views/Registro.php";
		$usuario = new Usuario();
		//Mandar datps
 		$usuario->nombre=$_POST['nombre'];
 		$usuario->apellidoP=$_POST['apellidoP'];
 		$usuario->apellidoM=$_POST['apellidoM'];
 		$usuario->correo=$_POST['correo'];
 		$usuario->password=$_POST['pass'];
 		$usuario->registrarUsuario();
        
         echo $usuario;
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
?>