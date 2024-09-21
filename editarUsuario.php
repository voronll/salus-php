<?php
include 'inc/header.inc.php';
include 'classes/usuarios.class.php';
$usuarios = new Usuarios();
session_start();


if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $usuarios->buscar($id);
    if (empty($info['email'])) {
        header("Location: /AgendaSenac");
        exit;
    }
    $arrayperm = explode(",", $info['permissoes']);
} else {
    header("Location: /AgendaSenac");
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
            <h1 class="text-center">EDITAR USUARIO</h1>
            <div class="row justify-content-center">
                <form method="POST" action="editarUsuarioSubmit.php">
                    <input type="hidden" name="id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $info['id'] ?>" />
                    Nome: <br>
                    <input type="text" name="nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $info['nome'] ?>" /><br><br>
                    Email: <br>
                    <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $info['email'] ?>" /><br><br>
                    Senha: <br>
                    <input type="password" name="senha" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $info['senha'] ?>" /><br><br>

                    <label for="permissoes">Permissões:</label><br>
                    <?php if ($usuarios->buscaPermissaoAdd($arrayperm)) : ?>
                        <input type="checkbox" id="add" name="permissoes[]" value="add">
                        <label for="add">ADICIONAR</label><br>
                    <?php endif ?>


                    <input type="checkbox" id="edit" name="permissoes[]" value="edit">
                    <label for="edit">EDITAR</label><br>
                    <input type="checkbox" id="del" name="permissoes[]" value="del">
                    <label for="del">DELETAR</label><br>
                    <input type="checkbox" id="super" name="permissoes[]" value="super">
                    <label for="super">SUPER</label><br>

                    <input type="submit" class="btn btn-success" name="btCadastrar" value="Alterar" />
                </form>
            </div>
        </div>
    </div>
    <div class="bg-image bg-dark"></div>
    <?php
    //include 'inc/footer.inc.php';
    ?>