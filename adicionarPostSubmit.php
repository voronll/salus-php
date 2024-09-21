<?php
include 'classes/posts.class.php';
$post = new Posts();


    $titulo = $_POST ['titulo'];
    $conteudo = $_POST ['conteudo'];
    $autor = $_POST ['autor'];
    $topico = $_POST ['topico'];


    $post->adicionar($titulo, $conteudo, $autor, $topico);
    header('Location: indexPosts.php');

?>

