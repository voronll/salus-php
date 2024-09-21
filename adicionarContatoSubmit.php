<?php
include 'classes/contatos.class.php';
$contato = new Contatos();

if(!empty($_POST['email'])){
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $profissao = $_POST ['profissao'];
    $telefone = $_POST ['telefone'];
    $numero = $_POST ['numero'];
    $rua = $_POST ['rua'];
    $bairro = $_POST ['bairro'];
    $cep = $_POST ['cep'];
    $cidade = $_POST ['cidade'];
    $foto = $_POST ['foto'];

    $contato->adicionar($email, $nome, $profissao, $telefone, $numero, $rua, $bairro, $cep, $cidade, $foto);
    header('Location: index.php');
}else{
    echo '<script type="text/javascript">alert("Email já cadastrado! (BURRO!)");</script>';
}
?>

