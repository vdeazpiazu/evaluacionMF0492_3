<!doctype html>
<html lang="es">
<head>
	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>

<?php

//dades de connexió
function descargar_taula(){
  $servidor = "localhost";
  $usuari = "pruebapractica";
  $password = "pruebapractica";
  $basededades = "pruebapractica";
  $taula = "items_compra";
  
$download_taula = "";  
//consulta
  $sql = "SELECT * FROM `$taula` ORDER BY `id` ASC";

//fem la connexió
  $conn = new mysqli($servidor, $usuari, $password, $basededades);

// comprovem la connexió
  if ($conn->connect_error) { //si falla
  echo "Fallada en la connexió: ".$conn->connect_error;
  die();
}

  $resultat = $conn->query($sql); //executem la consulta
  
  if ($resultat->num_rows > 0) { //comprovem que el resultat no és 0

  while($fila = $resultat->fetch_assoc()) { //imprimim les files
    
      $download_taula = $download_taula." ".$fila['id']." ".$fila['item']." ".$fila['stock']."<br>";
    }
    

  $filename = date("d-m-Y-h-i-s");
  // marcamos la ruta en la que se generara este archivo
  $arxiu = "files/".$filename.".txt";
  // situamos el puntero, abriendo el archivo y en modo escritura.
  $fp = fopen($arxiu, "w");
  //Escribimos el contenido de printlorem
  fwrite($fp, $download_taula);
  //cerramos el archivo.
  fclose($fp);  
 
  $fitxer_descarregar = " <p><br><a href='$arxiu'>Descarrega el fitxer</a></p>";


} else {
  echo "<p>Sense resultats...</p>"; //la taula no te registres
}

$conn->close(); //tanquem la connexió amb la base de dades

return $fitxer_descarregar;
}
?>

</html>
  
