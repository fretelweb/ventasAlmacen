<?php
session_start();

$iduser = $_SESSION['iduser'];

require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";

$carpeta = '../../archivos/';

$obj = new articulos();

$datos = array();
$datos[0] = $_POST['categoriaSelect'];
$datos[1] = 0;
$datos[2] = $iduser;
$datos[3] = $_POST['nombre'];
$datos[4] = $_POST['descripcion'];
$datos[5] = $_POST['cantidad'];
$datos[6] = $_POST['precio'];

$nombreImg = $_FILES['imagen']['name'];
$rutaAlmacenamiento = $_FILES['imagen']['tmp_name'];
$rutaFinal = $carpeta . $nombreImg;

$datosImg = array(
	$_POST['categoriaSelect'],
	$nombreImg,
	$rutaFinal
);

if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
	$idimagen = $obj->agregaImagen($datosImg);
	if ($idimagen > 0) {
		$datos[1] = $idimagen;
	}
}
echo $obj->insertaArticulo($datos);
