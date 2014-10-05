<?php

 $host = "localhost"; 
 $user = "root"; 
 $pass = ""; 
 $con = mysqli_connect($host, $user, $pass);
 mysqli_select_db($con,"Instaprofe");
 mysqli_set_charset($con,'utf8');

									
?>