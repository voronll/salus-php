<?php
    include 'inc/header.inc.php';
    include 'classes/usuarios.class.php';
 
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
            <h1 class="text-center">ADICIONAR/EDITAR USUARIO</h1>
<div class="row justify-content-center">
    <form method="POST" action="adicionarUsuarioSubmit.php" class="d-fluid c">
        Nome: <br>
        <input type="text" name="nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
        Email: <br>
        <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>
        Senha: <br>
        <input type="password" name="senha" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/><br><br>


        <label for="permissoes">Permissões:</label><br>
        <input type="checkbox" id="add" name="permissoes[]" value="add">
        <label for="add">ADICIONAR</label><br>
        <input type="checkbox" id="edit" name="permissoes[]" value="edit">
        <label for="edit">EDITAR</label><br>
        <input type="checkbox" id="del" name="permissoes[]" value="del">
        <label for="del">DELETAR</label><br>
        <input type="checkbox" id="super" name="permissoes[]" value="super">
        <label for="super">SUPER</label><br>

 
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