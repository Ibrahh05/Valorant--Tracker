<table>
	<tr>
		<td>id</td>
		<td>nombre</td>
		<td>rol</td>
		<td>habilidad_firma </td>
		<td>descripcion</td>
	</tr>

	<?php
	$ssql="select * from agentes";
	if($rs=mysqli_query($conexion,$ssql)){
		while($fila=mysqli_fetch_array($rs)){
			echo "<tr>";
			echo "<td>". $fila['id'] . "</td>";
			echo "<td>". $fila['nombre'] . "</td>";
			echo "<td>". $fila['rol'] . "</td>";
			echo "<td>". $fila['habilidad_firma'] . "</td>";
			echo "<td>". $fila['descripcion'] . "</td>";
			echo "</tr>";	
		}
	}
?>
</table>