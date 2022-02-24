<?php
$dsn = 'mysql:host=localhost; dbname=todolist';
$username = 'root';

try {
    $db =new PDO($dsn, $username);
}
catch(PDOException $e){
    $error_message= "Database Failed to connect!";
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>