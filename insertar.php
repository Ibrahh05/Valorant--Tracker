<?php
include("includes/plantilla.php");
$titulo="Insercion de contacto";
escribe_cabecera($titulo);


if(!$_POST){
	include "includes/formulario.php";
}else{
	//realizo la insercion

	///COmprobaciones necesarias

	$ssql="insert into agentes(id, nombre, rol, habilidad_firma, descripcion) values ('".$_POST['id']."','".$_POST['nombre']."','".$_POST['rol']."','".$_POST['habilidad_firma']."','".$_POST['descripcion']."')";
	if(mysqli_query($conexion,$ssql)){
		echo "Agente insertado";
	}else{
		echo "No inserte nada";
		echo "<br />". mysqli_error($conexion);
		include ("includes/formulario.php");
	}
}

escribe_pie($conexion);