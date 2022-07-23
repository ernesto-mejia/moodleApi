<?php

$servidor = "localhost";
$usuario = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=registro", $usuario, $password);      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Conexión realizada Satisfactoriamente";
    }

catch(PDOException $e)
    {
    echo "La conexión ha fallado: " . $e->getMessage();
    }


    ?>
   