<?php

//dades de connexió

  $servidor = "localhost";
  $usuari = "pruebapractica";
  $password = "pruebapractica";
  $basededades = "pruebapractica";
  $taula = "items_compra";
  
  //comprobació per a saber si l'usuari no ha pasat pel formulari i poderlo xutar
  if ($_POST == null){
    header("Location: ../index.php");
    die();
  }

    //Llistem les variables amb les que treballarem per a poder afegir pelicules a la DB
    $item = $_POST["item"];
    $stock = $_POST["stock"];
  

//escribim la consulta que voldrem executar
$sql = "INSERT INTO $taula (item, stock) VALUES ('$item','$stock')";

//fem la connexió
$conn = new mysqli($servidor, $usuari, $password, $basededades);

// comprovem la connexió
if ($conn->connect_error) { //si falla
echo "Fallada en la connexió: ".$conn->connect_error;
die();
}else{ //tot ok
 echo "ok <br>";
}

//fem consulta per afegir un nou item a la llista
if ($conn ->query($sql) === TRUE){
  echo "OK!";
}else {
  echo "Error: ".$sql."<br>".$conn->error; 
}

$conn->close();


header("Location: ../index.php");
  die(); 


?>
