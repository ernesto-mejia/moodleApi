<?php

$host = "localhost";
$usuario = "root";
$password = "";



try {
    $pdo = new PDO("mysql:host=$host;dbname=prueba", $usuario, $password);      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Conexión realizada Satisfactoriamente";
    }

catch(PDOException $e)
    {
    echo "La conexión ha fallado: " . $e->getMessage();
    }

$sql = "SELECT matricula,nombre,email FROM usuarios";

$st = $pdo->prepare($sql);
$st->execute();
?>
<table>
    <thead>
    <tr>

        <th>Matricula</th>
        <th>gmail</th>
        <th>nombre</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($st->fetchAll() as $row) {
        ?>
        <tr>
           
            <td><?php echo $row['matricula']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>