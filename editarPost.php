<?php
include 'inc/header.inc.php';
include 'classes/usuarios.class.php';
include 'classes/posts.class.php';
$usuarios = new Usuarios();
$posts = new Posts();
session_start();

if (!empty($_GET['id_post'])) {
    $id_post = $_GET['id_post'];
    $info = $posts->buscar($id_post); // Alterado para buscar informações do post
    if (empty($info['id_post'])) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
?>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('./img/nebula_blur_opacity.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -1;
        /* Coloca a imagem de fundo atrás do conteúdo */
    }
</style>

<div class="container">
    <div class="jumbotron mt-3 bg-dark">
        <div class="mx-auto text-white" style="width: 90%;">
            <h1 class="text-center">EDITAR POST</h1>
            <div class="row justify-content-center">
                <form method="POST" action="editarPostSubmit.php">
                    <input type="hidden" name="id_post" class="form-control" value="<?php echo $info['id_post']; ?>" />
                    Titulo: <br>
                    <input type="text" name="titulo" class="form-control" value="<?php echo $info['titulo']; ?>" /><br><br>
                    Conteudo: <br>
                    <input type="text" name="conteudo" class="form-control" value="<?php echo $info['conteudo']; ?>" /><br><br>
                    Autor: <br>
                    <input type="text" name="autor" class="form-control" value="<?php echo $info['autor']; ?>" /><br><br>
                    Topico: <br>
                    <input type="text" name="topico" class="form-control" value="<?php echo $info['topico']; ?>" /><br><br>
                    <input type="submit" class="btn btn-success" name="btCadastrar" value="Alterar" />
                </form>
            </div>
        </div>
    </div>
    <div class="bg-image bg-dark"></div>
    <?php
    //include 'inc/footer.inc.php';
    ?>
</div>