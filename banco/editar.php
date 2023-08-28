<?php 
 require 'config.php';
require 'UsuarioDaoMysql.php';


 $usuarioDao = new UsuarioDaoMysql ($pdo);
  $usuario = false;

 $id = filter_input (INPUT_GET, 'id');
 if ($id) {
     $usuario = $usuarioDao -> findById($id);

 }
  if ($usuario=== false) {
    header ("Location: index.php");
    exit;
  }
    $sql = $pdo -> prepare ("SELECT * FROM usuarios WHERE id = :id");
    $sql -> bindValue (':id', $id);
    $sql -> execute();

    if ($sql -> rowCount()>0){
        $info = $sql -> fetchAll(PDO:: FETCH_ASSOC);
    }

        else {
    header ("Location: index.php");
    exit;
 }
?>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $usuarios->getId(); ?>"/>

    <h1>EDITAR USUARIO</h1>
    <label>
        Nome: <br/>
        <input type="text" name="name" value="<?= $usuarios->getNome(); ?>"/>
    </label>
    <label>
        Email: <br/>
        <input type="text" name="email" value="<?= $usuarios->getEmail(); ?>" />
    </label><br/>

    <input type="submit" value="Editar">

</form>
