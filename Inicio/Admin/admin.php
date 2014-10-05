<?php
$result = mysqli_query($con,"SELECT nombre, fecha_inscripcion,email,ip_tipo.tipo as tipo FROM ip_usuario inner join ip_tipo where ip_usuario.tipo=ip_tipo.id and ip_usuario.id>1");
echo 'Numero de registros: '.mysqli_num_rows($result);
echo "<table><tr><th>Nombre</th><th>Inscripcion</th><th>Email</th><th>Tipo</th></tr>";
while($row = mysqli_fetch_array($result)) {
		$nombre=$row['nombre'];
		$fecha=$row['fecha_inscripcion'];
		$email=$row['email'];
		$tipo=$row['tipo'];
	echo "<tr><td>$nombre</td><td>$fecha</td><td>$email</td><td>$tipo</td></tr>";
}

$result = mysqli_query($con,"SELECT nombre,ip_area.area as area from ip_usuario inner join ip_profesor_area inner join ip_area where ip_usuario.tipo=3 and ip_profesor_area.area=ip_area.id and ip_profesor_area.profesor=ip_usuario.id;");
echo "</table><br/>Profesores:";
echo "<table><tr><th>Nombre</th><th>Área de enseñanza</th></tr>";

while($row = mysqli_fetch_array($result)) {
		$nombre=$row['nombre'];
		
		$area=$row['area'];
	echo "<tr><td>$nombre</td><td>$area</td>";
}
$result = mysqli_query($con,"SELECT nombre,ip_area.area as area from ip_usuario inner join ip_usuario_area inner join ip_area where ip_usuario.tipo=1 and ip_usuario_area.area=ip_area.id and ip_usuario_area.usuario=ip_usuario.id;");
echo "</table><br/>Padres de familia";
echo "<table><tr><th>Nombre</th><th>Área de interes</th></tr>";
while($row = mysqli_fetch_array($result)) {
		$nombre=$row['nombre'];
		
		$area=$row['area'];
	echo "<tr><td>$nombre</td><td>$area</td>";
}
$result = mysqli_query($con,"SELECT nombre,ip_area.area as area from ip_usuario inner join ip_usuario_area inner join ip_area where ip_usuario.tipo=2 and ip_usuario_area.area=ip_area.id and ip_usuario_area.usuario=ip_usuario.id;");
echo "</table><br/>Estudiantes:";
echo "<table><tr><th>Nombre</th><th>Área de interes</th></tr>";
while($row = mysqli_fetch_array($result)) {
		$nombre=$row['nombre'];
		
		$area=$row['area'];
	echo "<tr><td>$nombre</td><td>$area</td>";
}
echo "</table>";
?>