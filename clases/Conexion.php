<?php 

ini_set('display_errors',1);
error_reporting(E_ALL);

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $password="";
		private $bd="ventas";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>