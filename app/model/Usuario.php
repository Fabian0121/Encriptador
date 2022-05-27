<?php

namespace Datos;

require 'app/Model/Conexion.php';

use Datos\Conexion;
use mysqli;

class Usuario extends Conexion
{

    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $correo;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }
    //Funcion para registrar usuario
    function registrarUsuario()
    {
        $verificar = Usuario::verificarUsuario($this->correo);
        if ($verificar) {
            $respuesta["estatus"] = "0";
            $respuesta["Mensaje"] = "Ya existe este usuario";
            echo json_encode($respuesta);
        } else {
            //Query para mandar los datos y registrarlos
            $pre = mysqli_prepare($this->con, "INSERT INTO usuarios(nombre,apellidoP,apellidoM,correo,pass) VALUES (?,?,?,?,?)");
            $pre->bind_param("sssss", $this->nombre, $this->apellidoP, $this->apellidoM, $this->correo, $this->password);
            $pre->execute();
            $respuesta["estatus"] = "1";
            $respuesta["Mensaje"] = "Usuario registrado";
            echo json_encode($respuesta);
        }
    }
    //Funcion para validar usuario
    static function verificarUsuario($correoValidar)
    {
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM usuarios WHERE correo = ?");
        $pre->bind_param("s", $correoValidar);
        $pre->execute();
        $resultado = $pre->get_result();
        return $resultado->fetch_object();
    }
    //Funcion para iniciar sesion
    static function verificarLogin($correoValidar, $password)
    {
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM usuarios WHERE correo = ? aND pass = ?");
        $pre->bind_param("ss", $correoValidar, $password);
        $pre->execute();
        $resultado = $pre->get_result();
        return $resultado->fetch_object();
    }
}
