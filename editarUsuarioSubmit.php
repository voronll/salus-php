<?php
include 'classes/usuarios.class.php';
$usuarios = new Usuarios();
 
if(!empty ($_POST['id'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $permissoes = implode (',' , $_POST['permissoes']);
    $id = $_POST['id'];
   
    if(!empty($email)){
        $usuarios->editar($nome, $email, $senha, $permissoes, $id);
    }
    header("Location: indexUsuarios.php");
}
 
?>