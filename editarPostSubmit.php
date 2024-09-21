<?php
include 'classes/posts.class.php';
$posts = new Posts(); 

$id_post = $_POST['id_post'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$autor = $_POST['autor'];
$topico = $_POST['topico'];

$posts->editar($titulo, $conteudo, $autor, $topico, $id_post); // Corrigido para chamar o método na instância $posts
header('Location: indexPosts.php');
?>
