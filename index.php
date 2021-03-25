<!-- (C) Volynsky Alexander 2021  

 Fichier de blog principal (Fichier initial) 

-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="Description" content="Le blog d'Alexandre Volynsky" />
    <meta name="author" content="Volynsky Alexander" />
    <meta name="theme-color" content="#317EFB" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog d'Alexander Volybsky | Accueil </title>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<!-- CSS ici -->
	<link rel="stylesheet" href="assets/css/public_styling.css">
</head>

<body>
	<!-- conteneur - enveloppe toute la page  -->
	<div class="container">
		<!-- navbar -->
		<div class="navbar">
			<div class="logo_div">
				<a href="index.php"><h1>Blog d'Alexander Volynsky | Des articles</h1></a>
			</div>
		</div>
		<!-- // navbar -->
 
        

		<!-- Page content -->
		<div class="content">
			<?php
				//Nous connectons la base de données 
				require_once("database.php");
				
				//Nous connectons le fichier pour travailler avec des fonctions 
				require_once("models/articles.php");

				$link = db_connect ();

				$articles = articles_all($link);
				include("views/articles.php")
		    ?>
		</div>
		<!-- // Page content -->
        <br><br>
		<!-- footer -->
		<div class="footer">
			<p>Alexander Volynsky &copy; <?php echo date('Y'); ?></p>
		</div>
		<!-- // footer -->

	</div>
	<!-- // container -->
</body>
</html>