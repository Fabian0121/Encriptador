<?php

namespace Datos;

class Conexion
{

	public $con;
	public function __construct()
	{
	    $host ='localhost';
	    $usuario ='root';
	    $contrasenia = '';
	    $base ='usuario';
		$this->con = mysqli_connect($host, $usuario, $contrasenia, $base);
 		mysqli_query($this->con,"SET NAMES 'utf8'");

	}
}
?>