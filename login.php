<?php
session_start();
include 'inc/header.inc.php';
require 'classes/usuarios.class.php';
?>
<?php
if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuarios = new Usuarios();
    if($usuarios->fazerLogin($email, $senha)){
        header("Location: admHome.php");
        exit;
    }else{
        echo '<span style="color: red">'."VOCÊ ERROU! NÃO EXISTE ESSE USUÁRIO OU SENHA!".'</span>';
    }
}
?>
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
  
<section class="">
<form method="POST" class="form-group">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">                       
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase login-text">Login</h2>
              <p class="text-white-50 mb-5">Insira seus dados.</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input placeholder="E-mail" type="email" name="email" class="form-control form-control-lg"/>
                <!--<label class="form-label email-text" for="typeEmailX">Email</label>-->
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input placeholder="Senha" type="password" name="senha" class="form-control form-control-lg"/>
                <!--<label class="form-label password-text" for="typePasswordX">Senha</label>-->
                
              </div>
              <button class="btn btn-outline-warning btn-lg px-5" type="submit" value="Entrar">Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-image"></div>
</form>
</section>

<?php
//include 'inc/footer.inc.php'
?>
