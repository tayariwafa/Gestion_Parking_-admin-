<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfe2','root','');

?>
</!DOCTYPE html>
<html>
<head>
	<title>MY PARK</title>
	<?php require 'header.php'; ?>
	<link rel="stylesheet" href="css/style4.css">
	<style type="text/css">
		.buttonlien{
   margin-left:  215px;
    right: 5px;
     margin-top: 485px;
}
.lien{  text-decoration: none;
color: #fff ;
font-family: "Chinal", Times, serif;
 font-size: 35px;
 float: left;
  margin: 20px;
}
button:hover{
box-shadow: 0 0 40px -9px #000;}
button{
 width: 550px;
 height: 90px;
 margin-right: 10px;

}
.button1{
 background-color: #1E08BC; 
  border-color: #1E08BC ;
}
.button2{
 background-color: #E22323; 
  border-color: #E22323;
}
.imgb{
	height:70px; 
	width:70px;
	float: left;
	margin: 10px;
	margin-top: -10px;
}



	</style>
</head>
<body>
<div class="container">
	
	<div data-am-fadeshow="next-prev-navigation">

		<!-- Radio -->
		<input type="radio" name="css-fadeshow" id="slide-1" />
		<input type="radio" name="css-fadeshow" id="slide-2" />
		<input type="radio" name="css-fadeshow" id="slide-3" />

		<!-- Slides -->
		<div class="fs-slides">
			<div class="fs-slide" style="background-image: url(2.jpg);"></div>
			<div class="fs-slide" style="background-image: url(mike-wilson-36140-unsplash.jpg);">
				<!-- Add content to images (sample) -->
				
			</div>
			
			<div class="fs-slide" style="background-image: url(susan-yin-63089-unsplash.jpg);"></div>
		</div>

		<!-- Quick Navigation -->
		<div class="fs-quick-nav">
			<label class="fs-quick-btn" for="slide-1"></label>
			<label class="fs-quick-btn" for="slide-2"></label>
			<label class="fs-quick-btn" for="slide-3"></label>
		</div>
		
		<!-- Prev Navigation -->
		<div class="fs-prev-nav">
			<label class="fs-prev-btn" for="slide-1"></label>
			<label class="fs-prev-btn" for="slide-2"></label>
			<label class="fs-prev-btn" for="slide-3"></label>
		</div>
		
		<!-- Next Navigation -->
		<div class="fs-next-nav">
			<label class="fs-next-btn" for="slide-1"></label>
			<label class="fs-next-btn" for="slide-2"></label>
			<label class="fs-next-btn" for="slide-3"></label>
		</div>

	</div>
	
</div>
<div class="buttonlien">
	<button class="button1"><a class="lien" href="affiche_g.php"><img class="imgb" src="liste.png">Liste Des Gardiens </a></button>
	<button class="button2"><a class="lien" href="consult.php"><img class="imgb" src="roue.png">Les Ent&eacute;es/Sorties</a></button>
</div>
</body>
</html>