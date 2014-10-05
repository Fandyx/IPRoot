<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'head.php'?>
<?php include '../../config.php'?>
</head>
<body id="login">

	<div id="login_content">
		<div id="controls">
			<div id="login_img_container">
				<img src="../assets/images/INSTAPROFE_1.png">
			</div>
			<form action="index.php" method="POST">
			<input type="text" placeholder="user" id="txtUser" name="txtUser">
			<br/>
			<input type="password" placeholder="password" id="txtPass" name="txtPass">
			<input type="submit" value="Ingresa">
			</form>
		</div>
	</div>
</body>
</html>