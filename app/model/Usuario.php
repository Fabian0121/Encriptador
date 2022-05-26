<?php
namespace Datos;
require 'app/Model/Conexion.php';

use Datos\Conexion;

    class Usuario extends Conexion{

        public $nombre;
        public $apellidoP;
        public $apellidoM;
        public $correo;
        public $password;

        public function __construct()
        {
            parent::__construct();
        }

        function registrarUsuario()
        {
            //$correoValidar = $this->correo;
            $verificar = Usuario::verificarUsuario($this->correo);
            if($verificar){
                $respuesta["estatus"] = "0";
                $respuesta["Mensaje"] = "Ya existe este usuario";
                echo json_encode($respuesta);
                return json_encode($respuesta);
            }else{
                //Query para mandar los datos y registrarlos
		        $pre = mysqli_prepare($this->con, "INSERT INTO usuarios(nombre,apellidoP,apellidoM,correo,pass) VALUES (?,?,?,?,?)");
		        $pre-> bind_param("sssss",$this->nombre,$this->apellidoP,$this->apellidoM,$this->correo,$this->password);
		        $pre-> execute();
                $respuesta["estatus"] = "1";
                $respuesta["Mensaje"] = "Usuario registrado";
                echo json_encode($respuesta);
                return json_encode($respuesta);
            }
        }
        //Funcion para login
	static function verificarUsuario($correoValidar)
	{
		$conexion = new Conexion();
		$pre = mysqli_prepare($conexion->con, "SELECT * FROM usuarios WHERE correo = ?");
		$pre-> bind_param("ss",$correoValidar);
		$pre-> execute();
		$resultado = $pre->get_result();
        return $resultado->fetch_object();
	}

    }
?>