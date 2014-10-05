<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="../css/stuck.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/touchTouch.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/touchTouch.jquery.js"></script>

<script>
 $(document).ready(function(){

  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});
  $('.gallery .gall_item').touchTouch();

  }); 
</script>
<!--[if lt IE 9]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="../css/ie.css">


<![endif]-->
</head>

<body class="page1" id="top">
<!--==============================
              header
=================================-->
<?php
include "config.php";
if(isset($_POST["descripcion"])&&isset($_FILES["file"]))
if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
	    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo '<script>alert("'.$_FILES["file"]["name"] . " ya existe. ".'");</script>';
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);

       mysqli_query($con,"INSERT INTO blog (foto,descripcion)
		VALUES ('". $_FILES["file"]["name"]."','".$_POST["descripcion"]."')");
	   echo '<script>alert("'.$_FILES["file"]["name"] . " subido exitosamente al Blog Optimus Marie!!! ".'");</script>';
    }
}
?>
<header>
<!--==============================
            Stuck menu
=================================-->
  <section>
    <div class="container">
      <div class="row">
        <div class="grid_12" id="logo_container">
       
          <div id="logo_div"><a href="index.html">
            <img src="images/oa_logo.png" alt="Logo alt" id="oalogo">
          </a>
          </div>
   		<div id="span_container">
		<div id="optimus">
		<span class="tit_let" id="l1" class="tit_let">O</span><span class="tit_let" id="l2">p</span><span class="tit_let" id="l3">t</span><span class="tit_let" id="l4">i</span><span class="tit_let" id="l5">m</span><span class="tit_let" id="l6">u</span><span class="tit_let" id="l7">s</span></div><span class="tit_let" id="l8"> </span><div id="architechture"><span class="tit_let" id="l9">A</span><span class="tit_let" id="l10">r</span><span class="tit_let" id="l11">c</span><span class="tit_let" id="l12">h</span><span class="tit_let" id="l13">i</span><span class="tit_let" id="l14">t</span><span class="tit_let" id="l15">e</span><span class="tit_let" id="l16">c</span><span class="tit_let" id="l17">h</span><span class="tit_let" id="l18">t</span><span class="tit_let" id="l19">u</span><span class="tit_let" id="l20">r</span><span class="tit_let" id="l21">e</span></div> <!-- <span>by marie</span> -->
		<span id="bymarie">By Marie</span>
		
		</div>
          <!-- <div class="navigation">
            <nav>
              <ul class="sf-menu">
               <li class="current"><a href="index.html">home</a></li>
               <li><a href="index-1.html">menu</a></li>
               <li><a href="index-2.html">reservation</a></li>
               <li><a href="index-3.html">blog</a></li>
               <li><a href="index-4.html">contacts</a></li>
             </ul>
            </nav>        
            <div class="clear"></div>
          </div> -->
        </div>
      </div>
    </div>
  </section> 
</header>        

<!--=====================
          Content
======================-->
<section class="content">
  <div class="container" id="main_container">
  	<hr/>
  	<div id="nav_ul"><ul>
  		<li>Inicio</li>
  		<li>Blog Optimus Marie</li>
  		<li>Optimus People</li>
  		<li>Noticias</li>
  		<li>Galeria</li>
  		<li>Contacto</li>
  	</ul>
  	<br/>
  	</div>
  	<hr style="clear:both;margin-top:20px;"/>
    <div class="row">
	<form action="#" method="post"
enctype="multipart/form-data">
     <input type="file" name="file" id="file"/><br/>
     <textarea type="text" id="file_text" name="descripcion" placeholder="Descripcion de la imagen" style="width:100%;height:7em"></textarea>
     <button type="submit" style="">Subir imagen</button>
    </form>
    </div>
  </div>
</section>

</body>
</html>

