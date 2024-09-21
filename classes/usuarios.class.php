<?php
require_once 'conexao.class.php';

class Usuarios {
    private $con;
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $permissoes;

    public function __construct(){
        $this->con = new Connect();
    }
    public function __set($atributo, $valor){
        $this->atributo = $valor;
    }
    public function __get($atributo){
        return $this->atributo;
    }
    
    //INÍCIO DO CRUD
    private function existeEmail($email){
            $sql = $this->con->connection()->prepare("SELECT id FROM users WHERE email = :email");
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->execute();
           
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }else{
                $array = array();
            }
            return $array;
        }
        public function adicionar($email, $nome, $senha, $permissoes){
            $emailExistente = $this->existeEmail($email);
            if(count($emailExistente) == 0){
                try{
                    $this->nome = $nome;
                    $this->email = $email;
                    $this->senha = $senha;
                    $this->permissoes = $permissoes;
                   
                    $sql = $this->con->connection()->prepare("INSERT INTO users(nome, email, senha, permissoes)VALUES(:nome, :email, :senha, :permissoes)");
                    $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $sql->bindParam(":senha", md5($this->senha), PDO::PARAM_STR);
                    $sql->bindParam(":permissoes", $this->permissoes, PDO::PARAM_STR);
                   
                    $sql->execute();
   
                    return TRUE;
                }catch(PDOException $ex){
                    return 'ERRO: '.$ex->getMessage();
                }
            }else{
                return FALSE;
            }
        }
        public function listar(){
            try {
                $sql = $this->con->connection()->prepare("SELECT id, nome, email, senha, permissoes FROM users");
                $sql->execute();
                return $sql->fetchAll();
            }catch(PDOException $ex){
                return 'ERRO: '.$ex->getMessage();
            }
        }
        public function buscar($id){
            try{
                $sql = $this->con->connection()->prepare("SELECT * FROM users WHERE id = :id");
                $sql->bindValue(':id', $id);
                $sql->execute();
                if($sql->rowCount() > 0){
                    return $sql->fetch();
                }else{
                    return array();
                }
            }catch(PDOException $ex){
                echo "ERRO: " .$ex->getMessage();
            }
        }
        public function editar($nome, $email, $senha, $permissoes, $id){
         
            $emailExistente = $this->existeEmail($email);
            if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
                return FALSE;
            }
            else {
                try{
                    $sql = $this->con->connection()->prepare("UPDATE users SET nome = :nome, email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id");
                    $sql->bindValue(':nome', $nome);
                    $sql->bindValue(':email', $email);
                    $sql->bindValue(':senha', md5($senha));
                    $sql->bindValue(':permissoes', $permissoes);
                    $sql->bindValue(':id', $id);
                    $sql->execute();
                    return TRUE;
                }
                catch(PDOException $ex){
                    echo 'ERRO: '.$ex->getMessage();
                }
            }
        }
        public function excluir($id){
            $sql = $this->con->connection()->prepare("DELETE FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        }


    //FIM DO CRUD
    public function fazerLogin($email, $senha){
        $sql = $this->con->connection()->prepare("SELECT * FROM users WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['logado'] = $sql['id'];
            
            return TRUE;
        }
        return FALSE;
    } 
    public function setUsuario($id){
        $this->id = $id;
        $sql = $this->con->connection()->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $this->permissoes = explode(',', $sql['permissoes']);
        }
    }
    public function getPermissoes(){
        return $this->permissoes;
    }
    public function temPermissoes($p){
        if(in_array($p, $this->permissoes)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //validador de permissões em checkboxes
    public function buscaPermissaoSuper($arrayperm){
        foreach($arrayperm as $item){
            if($item == "super"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoAdd($arrayperm){
        foreach($arrayperm as $item){
            if($item == "add"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoEdit($arrayperm){
        foreach($arrayperm as $item){
            if($item == "edit"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoDel($arrayperm){
        foreach($arrayperm as $item){
            if($item == "del"){
                return TRUE;
            }
        }
    }

}

?>