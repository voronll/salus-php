<?php
include 'classes/posts.class.php';
$posts = new Posts();

if (!empty($_GET['id_post'])) {
    $id_post = $_GET['id_post'];
    $posts->excluir($id_post); 

    header("Location: indexPosts.php");
} else {
    var_dump('socorro');
}
?>
