<?php 
require 'config.php';
require 'UsuarioDaoMysql.php';


 $usuarioDao = new UsuarioDaoMysql ($pdo);

$name = filter_input (INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {
     
    $usuario = $usuarioDao -> findById($id);
    $usuario = new Usuario();
    $usuario -> setId ($id);
    $usuario -> setNome ($name);
    $usuario -> setEmail ($email);

    $usuarioDao -> update($usuario);
    
    header ("Location: index.php");
     exit;

} else {
    header ("Location: adicionar.php");
    exit;
}
