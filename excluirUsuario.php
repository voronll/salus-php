<?php
include 'classes/usuarios.class.php';
$usuarios = new Usuarios();
 
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $usuarios->excluir($id);
    header("Location: indexUsuarios.php");
 
}
else{
    echo '<script type="text/javascript">alert("Erro ao excluir contato!");</script>';
    header("Location: /AgendaSenac");
}