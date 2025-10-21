<?php
include "includes/plantilla.php";
$titulo="Editando un contacto";
escribe_cabecera($titulo);


if($_POST){
	//quieres editar 
	$ssql="update contacto set nombre='".$_POST['nombre']."', email='".$_POST['email']."', tlf='".$_POST['tlf']."', direccion='".$_POST['direccion']."' where id_contacto=".$_POST['id_contacto'];

	if(mysqli_query($conexion,$ssql)){
		echo "Usuario actualizado";
	}else{
		echo "Error" . mysqli_error($conexion);
	}


}else{
	$ssql="select * from contacto where id=".$_GET['id'];
	if($rs=mysqli_query($conexion,$ssql)){
		$fila=mysqli_fetch_array($rs);
		include ("includes/formulario.php");
	}

}
escribe_pie($conexion);