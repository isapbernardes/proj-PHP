<?php 

$db_name = 'teste';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

//Conectando ao banco de dados

$pdo = new PDO ("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

//CRUD 

// C -> CREATE, R-> READ, U -> UPDATE, D -> DELETE 

