
<?php
header('Content-Type: text/html; charset=utf-8');
include '../config.php';
$user_data= $_POST["user_data"];

print_r($user_data);
$name=$user_data['name'];
$suger=$user_data['suger'];
$email=$user_data['email'];
$type=$user_data['type'];


$col=$user_data['col'];
$uni=$user_data['uni'];
$oth=$user_data['oth'];
$txtcol=$user_data['txtcol'];
$txtuniv=$user_data['txtuniv'];
$txtoth=$user_data['txtoth'];
$ciudad=$user_data['txtciudad'];
$opcion=$user_data['txtopcion'];

$areas=$_POST['areas'];
$hora = date('H')-5;
$query="INSERT INTO ip_usuario (nombre, ciudad,sugerencia,email,tipo,fecha_inscripcion) 
VALUES ('$name','$ciudad', '$suger','$email','$type','".date('Y-m-d H:i:s', time() - 3600 * 5)."')";
echo $query;
$result = mysqli_query($con,$query);
$user_id=mysqli_insert_id($con);
echo $user_id;
$table="ip_usuario_area";
$c1="usuario";
if($type==3){
$table="ip_profesor_area";
$c1="profesor";	
}
if($col=="checked"&&$txtcol!==""){
$result = mysqli_query($con,"INSERT INTO ip_instituto (instituto, tipo) 
VALUES ('$txtcol',1)");
$inst_id=mysqli_insert_id($con);
$result = mysqli_query($con,"INSERT INTO ip_usuario_instituto (usuario, instituto) 
VALUES ($user_id, $inst_id)");
}

if($uni=="checked"&&$txtuniv!==""){
$result = mysqli_query($con,"INSERT INTO ip_instituto (instituto, tipo) 
VALUES ('$txtuniv',2)");
$inst_id=mysqli_insert_id($con);
$result = mysqli_query($con,"INSERT INTO ip_usuario_instituto (usuario, instituto) 
VALUES ($user_id, $inst_id)");
}

if($oth=="checked"&&$txtoth!==""){
$result = mysqli_query($con,"INSERT INTO ip_instituto (instituto, tipo) 
VALUES ('$txtoth',3)");
$inst_id=mysqli_insert_id($con);$result = mysqli_query($con,"INSERT INTO ip_usuario_instituto (usuario, instituto) 
VALUES ($user_id, $inst_id)");
}
foreach($areas as $area){
    print_r($area);
    $id=$area['area'];
    $result = mysqli_query($con,"INSERT INTO $table ($c1, area) 
VALUES ($user_id,$id)");
}
if($opcion!=""){
    echo $opcion;
    $result = mysqli_query($con,"INSERT INTO ip_tags (tag, area) 
VALUES ('$opcion',32)");
}
echo($result);

// Cerrar la conexión
mysqli_close($con);

?>