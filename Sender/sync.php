<?php
require_once dirname(__FILE__) . '/autoload.php';
define('ENDPOINT', 'http://34.133.150.120/webservice/rest/server.php?wstoken=70ac31662a4bc9e66d66bb2526cafa2b&wsfunction=core_user_create_users&moodlewsrestformat=json/sync.php');

include ("index.php");
$sql = "SELECT matricula as username, password, nombre as firstname,apellido as lastname, email   FROM usuarios" ;

$resultado=$pdo->query($sql) or die("No puedo realizar la consulta");

$i=0;
while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
    $MoodleRest = new MoodleRest('http://34.133.150.120/webservice/rest/server.php', '70ac31662a4bc9e66d66bb2526cafa2b');

    $new_group = array('users' => array(array(
        'username' => $__POST['username'],
        'password' => $row['password'],
        'firstname' => $row['firstname'],
        'lastname' => $row['lastname'],
        'email' => $row['email']
        ),
    ));
    
    $return = $MoodleRest->request('core_user_create_users', $new_group, MoodleRest::METHOD_POST);
    
    $payload = $MoodleRest->getUrl();
    
    echo "Conecte <pre>$payload</pre>";

    $i++;


   
}
