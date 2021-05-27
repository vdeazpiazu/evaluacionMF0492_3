<!doctype html>
<html lang="es">
<head>

	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" href="css/style.css" type="text/css"/>


</head>

<?php
//dades de connexió

$servidor = "localhost";
  $usuari = "pruebapractica";
  $password = "pruebapractica";
  $basededades = "pruebapractica";
  $taula = "items_compra";

$id = $_GET["id"];
$sql = "DELETE FROM $taula WHERE id = '$id'";
  


//fem la connexió
$conn = new mysqli($servidor, $usuari, $password, $basededades);

// comprovem la connexió
if ($conn->connect_error) { //si falla
echo "Fallada en la connexió: ".$conn->connect_error;
die();
}


//fem la consulta per a poder eliminar la pelicula
if ($conn ->query($sql) === TRUE){ // es a dir si hi ha conexio a la db seguim endevant.
  echo "<p>OK! Element eliminat.</p>";
  echo 	"<a href='index.php' class='nav-item'><p>Tornar a l'inici</p></a>";
}else {
  echo "Error: ".$sql."<br>".$conn->error; 
}

$conn->close();
?>

</html>