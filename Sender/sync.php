<?php

//define('ENDPOINT', 'http://34.133.150.120/webservice/rest/server.php?wstoken=d3f123abcdb8a7032a9c7421460a5799&&moodlewsrestformat=json&wsfunction=core_user_create_users&moodlewsrestformat=json&users[2][username]=testuser&users[1][firstname]=Anne&users[0][lastname]/sync.php',true);
define('ENDPOINT', 'http://34.133.150.120/webservice/rest/server.php?wstoken=c20cab833d8e924ed7584f8c6d4da71b&wsfunction=core_user_create_users&moodlewsrestformat=json/sync.php');
//"...&moodlewsrestformat=json&wsfunction=core_user_create_users&moodlewsrestformat=json&users[0][username]=testuser&users[0][firstname]=Anne&users[0][lastname]=Ejemplo.
//define('ENDPOINT', 'http://localhost:8080/sync.php');
$ch = curl_init(ENDPOINT);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, [
    'Content-Type: application/json',
]);
include ("index.php");
$sql = "SELECT matricula as username,email,nombre as name FROM usuarios" ;
$st = $pdo->prepare($sql);
$st->execute();
$payload=json_encode($st->fetchAll(),true);
echo "Proceso..... <pre>$payload</pre><br/>";
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "Conecte <pre>$response</pre> back<br/>";
