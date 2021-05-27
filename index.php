<?php
	include "db/db.php";
 	include "descarga.php";
 ?>

<!doctype html>
<html lang="es">
<head>

	<meta charset="utf-8"/>
	<meta name="description" content="Examen prueba">
	<meta name="keywords" content="lista, crud, examen, php">
	<meta name="author" content="Violeta de Azpiazu">

	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" href="css/style.css" type="text/css"/>

	<!-- Enllaç a Javascript Extern -->
		<script  type="text/javascript" src="js/javascript.js"></script>
		<script  type="text/javascript" src="js/checkuser.js"></script>
		<!--JQUERY -->
		<script type="text/javascript" src="js/jquery-3.6.0.min.js" ></script>

	<!-- Títol de la pàgina -->
	<title>Examen MF0492_3 Violeta</title>
</head>
<body>
	<header></header>
	<section>
		<article>
			<h2>EVALUACION MF0492_3 Violeta de Azpiazu</h2>
			<form onsubmit="return validate_producto();" action="action/action.php" method="POST">
				<label>Item 
					<input type="text" name="item" id="item" onblur="validate_item()" oninput="check()"> 
					<!--No entenc perquè no em funciona el Check i no em valida els elements duplicats-->
				</label>
				<p id="msn_item"></p>
				
				<span id="missatge"></span>

		    	<!--Imatge de waiting-->
				<p><img src="img/preloader.gif" id="preloader" style="display:none" ></p>

				<label>Stock
					<input type="text" name="stock" id="stock" onblur="validate_stock()">
				</label>
				<p id="msn_stock"></p>
				
				<input type="submit">
			</form>
			<div>
			<br>
			<br>

		<?php
			echo imprimir_taula();
		?>
		
		<?php
			if (descargar_taula()==true){
				echo descargar_taula();
			}
		?>
		
		</div>
		</article>
	</section>
	<footer></footer>
</body>
</html>
