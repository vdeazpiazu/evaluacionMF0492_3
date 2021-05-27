<?php

//dades de connexió
function imprimir_taula(){
  $servidor = "localhost";
  $usuari = "pruebapractica";
  $password = "pruebapractica";
  $basededades = "pruebapractica";
  $taula = "items_compra";
  
  $print_taula = "<table border='1px'>
                  <tr>
                    <th><p>id</p></th>
                    <th><p>item</p></th>
                    <th><p>stock</p></th>
                    <th><p>eliminar</p></th>
                  </tr>";
  
//consulta
  $sql = "SELECT * FROM `$taula` ORDER BY `id` ASC";

//fem la connexió
  $conn = new mysqli($servidor, $usuari, $password, $basededades);

// comprovem la connexió
  if ($conn->connect_error) { //si falla
  echo "Fallada en la connexió: ".$conn->connect_error;
  die();
// }else{ //tot ok
//   echo "ok<br>";
}

  $resultat = $conn->query($sql); //executem la consulta
  
  if ($resultat->num_rows > 0) { //comprovem que el resultat no és 0

  while($fila = $resultat->fetch_assoc()) { //imprimim les files
    
      $print_taula = $print_taula."<tr>
      <td><p>".$fila['id']."</p></td>
      <td><p>".$fila['item']."</p></td>
      <td><p>".$fila['stock']."</p></td>
      <td><a href=delete.php?id=$fila[id]>Eliminar item</a>";
    }
    
  $print_taula = $print_taula."</table>";


}

$conn->close(); //tanquem la connexió amb la base de dades

return $print_taula;
}
?>