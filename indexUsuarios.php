<?php
include 'classes/usuarios.class.php';
include 'inc/header.inc.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
$usuarios = new Usuarios();
$usuarios->setUsuario($_SESSION['logado']);

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
      z-index: -1; /* Coloca a imagem de fundo atrás do conteúdo */
    }
</style>

<div class="container">
<div class="jumbotron mt-3 bg-dark">
    <div class="mx-auto text-white" style="width: 90%;">
        <hr>
        <h1 class="display-4">GERENCIAMENTO DE USUÁRIOS</h1>
        <?php if ($usuarios->temPermissoes('add')) : ?><button type="button" class="btn btn-primary mb-1"><a href="adicionarUsuario.php" class="text-light">ADICIONAR USUARIOS</a></button><?php endif; ?>
    </div>
    <br>
    <div class="mx-auto" style="width: 90%;">
        <table class="table table-bordered table-dark">
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Permissões</th>
                <th></th>


            </tr>
            <?php
            $lista = $usuarios->listar();
            foreach ($lista as $item) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo '*****'; ?></td>
                        <td><?php echo $item['permissoes']; ?></td>


                        <td>
                            <?php if ($usuarios->temPermissoes('super')) : ?><button type="button" class="btn btn-info"><a class="text-light" href="editarUsuario.php?id=<?php echo $item['id']; ?>">EDITAR</a><?php endif; ?></button>

                                <?php if ($usuarios->temPermissoes('super')) : ?><button type="button" class="btn btn-danger"><a class="text-light" href="excluirUsuario.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza disso?')">EXCLUIR</a><?php endif; ?></button>
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