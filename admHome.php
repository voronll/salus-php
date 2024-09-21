<?php
include 'inc/header.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
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
        <div class="jumbotron mt-5 bg-dark">
            <h1 class="display-4 text-white">Bem-vindo ao Painel Administrativo da Salus!</h1>

            <hr class="my-4">   
            <a class="btn btn-primary btn-lg" href="logout.php" role="button">Sair</a>
            <a class="btn btn-primary btn-lg" href="indexUsuarios.php" role="button">Gerenciar Usuários</a>
            <a class="btn btn-primary btn-lg" href="indexPosts.php" role="button">Gerenciar posts</a>
                 
        </div>
    </div>
    <div class="bg-image bg-dark"></div>
    
</html>