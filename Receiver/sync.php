<?php

$data = file_get_contents('php://input');
$productsArray = json_decode($data, true );
var_dump($productsArray);
$host = "localhost";
$usuario = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=registro", $usuario, $password);      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Conexión realizada Satisfactoriamente";
    }

catch(PDOException $e)
    {
    echo "La conexión ha fallado: " . $e->getMessage();
    }
   
   
    $sql = "INSERT INTO usuarios (matricula,nombre,email) VALUES (?, ?,?)";
$st = $pdo->prepare($sql);
foreach ($productsArray as $productArray) {
  
  $st->execute([$productArray['matricula'], $productArray['email'],$productArray['nombre']]);
}

if ($st) {
  echo "datos enviados a la base 2: puerto=8080";
}

else{
    echo "no se hizo nada hermano->";
}
