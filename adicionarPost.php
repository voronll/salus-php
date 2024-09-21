<?php
    include 'inc/header.inc.php';
    include 'classes/posts.class.php';
 
    session_start();
if(!isset($_SESSION['logado'])){
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
    }
</style>



<div class="mx-auto" style="width: 90%;"> 

<div class="container">
<div class="jumbotron mt-3 bg-dark">
<div class="mx-auto text-white" style="width: 90%;">
            <h1 class="text-center">Editar/Adicionar Post</h1>
<div class="row justify-content-center">
    <form method="POST" action="adicionarPostSubmit.php" class="d-fluid c">
        Titulo: <br>
        <input type="text" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
        Conteudo: <br>
        <input type="text" name="conteudo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
        Autor: <br>
        <input type="text" name="autor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
        Topico: <br>
        <input type="text" name="topico" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
 
        <input type="submit" name="btCadastrar" class="btn btn-success" value="ADICIONAR" />
 
    </form>
</div>
</div>
</div>
</div>
<div class="bg-image bg-dark"></div>
 
<?php
    //include 'inc/footer.inc.php';
?>