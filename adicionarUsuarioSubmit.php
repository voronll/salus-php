<?php
include 'classes/usuarios.class.php';
$usuarios = new Usuarios();
 
if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $permissoes = implode (',' , $_POST['permissoes']);
   
 
    $usuarios->adicionar($email, $nome, $senha, $permissoes);
 
    header('Location:indexUsuarios.php');
}
else{
    echo '<script type="text/javascript">alert("Email já cadastrado!");</script>';
}
 
?>