<?php
include 'classes/posts.class.php';
include 'classes/usuarios.class.php';
include 'inc/header.inc.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
$usuarios = new Usuarios();
$usuarios->setUsuario($_SESSION['logado']);

$posts = new Posts(); 
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

<div class="container">
<div class="jumbotron mt-3 bg-dark">
    <div class="mx-auto text-white" style="width: 90%;">
        <hr>
        <h1 class="display-4">GERENCIAMENTO DE POSTS</h1>
        <?php if ($usuarios->temPermissoes('add')) : ?>
            <button type="button" class="btn btn-primary mb-1">
                <a href="adicionarPost.php" class="text-light">ADICIONAR POST</a>
            </button>
        <?php endif; ?>
    </div>
    <br>
    <div class="mx-auto" style="width: 90%;">
        <table class="table table-bordered table-dark">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Conteudo</th>
                <th>Autor</th>
                <th>Topico</th>
                <th></th>
            </tr>
            <?php
            $lista = $posts->listar();
            foreach ($lista as $item) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $item['id_post']; ?></td>
                        <td><?php echo $item['titulo']; ?></td>
                        <td><?php echo $item['conteudo']; ?></td>
                        <td><?php echo $item['autor']; ?></td>
                        <td><?php echo $item['topico']; ?></td>
                        <td>
                            <?php if ($usuarios->temPermissoes('super')) : ?>
                                <button type="button" class="btn btn-info">
                                    <a class="text-light" href="editarPost.php?id_post=<?php echo $item['id_post']; ?>">EDITAR</a>
                                </button>
                            <?php endif; ?>
                            <?php if ($usuarios->temPermissoes('super')) : ?>
                                <button type="button" class="btn btn-danger">
                                    <a class="text-light" href="excluirPost.php?id_post=<?php echo $item['id_post'] ?>" onclick="return confirm('Você tem certeza disso?')">EXCLUIR</a>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            <?php
            endforeach;
            ?>
        </table>
    </div>
 </div>
</div>
<div class="bg-image bg-dark"></div>

<?php
//include 'inc/footer.inc.php';
?>
