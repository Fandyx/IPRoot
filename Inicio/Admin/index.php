<?php
header('Content-Type: text/html; charset=utf-8');
include '../../config.php';

	if(isset($_POST["txtUser"])&&isset($_POST["txtPass"])){
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
			
		$result = mysqli_query($con,"SELECT id FROM ip_usuario where nick='$user' and pass='$pass'");  
		if($row = mysqli_fetch_array($result)) {
		
	
	if($row["id"]==1){
$_SESSION["admin"]="true";
		
		 };
}
	}
	
if(isset($_SESSION["admin"])&&$_SESSION["admin"]=="true")
{	
	header("Location: html/ajax/");
}
else{
	header("Location: login.php");
}
?>

