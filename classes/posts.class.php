<?php
require_once 'conexao.class.php';

class Posts{
    private $con;

    private $id_post;
    private $titulo;
    private $conteudo;
    private $autor;
    private $topico;

    public function __construct(){
        $this->con = new Connect();
    }
    public function __set($atributo, $valor){
        $this->atributo = $valor;
    }
    public function __get($atributo){
        return $this->atributo;
    }

    public function adicionar($titulo, $conteudo, $autor, $topico){
        try{
            $this->titulo = $titulo;
            $this->conteudo = $conteudo;
            $this->autor = $autor;
            $this->topico = $topico;
           
            $sql = $this->con->connection()->prepare("INSERT INTO posts(titulo, conteudo, autor, topico)VALUES(:titulo, :conteudo, :autor, :topico)");
            $sql->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
            $sql->bindParam(":conteudo", $this->conteudo, PDO::PARAM_STR);
            $sql->bindParam(":autor", $this->autor, PDO::PARAM_STR);
            $sql->bindParam(":topico", $this->topico, PDO::PARAM_STR);
           
            $sql->execute();

            return TRUE;
        }catch(PDOException $ex){
            return 'ERRO: '.$ex->getMessage();
        }
    }

    public function listar(){
        try {
            $sql = $this->con->connection()->prepare("SELECT id_post, titulo, conteudo, autor, topico FROM posts");
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $ex){
            return 'ERRO: '.$ex->getMessage();
        }
    } 

    public function buscar($id_post){
        try{
            $sql = $this->con->connection()->prepare("SELECT * FROM posts WHERE id_post = :id_post");
            $sql->bindValue(':id_post', $id_post);
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

    public function editar($titulo, $conteudo, $autor, $topico, $id_post){
        try{
            $sql = $this->con->connection()->prepare("UPDATE posts SET titulo = :titulo, conteudo = :conteudo, autor = :autor, topico = :topico WHERE id_post = :id_post");
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':conteudo', $conteudo);
            $sql->bindValue(':autor', $autor);
            $sql->bindValue(':topico', $topico);
            $sql->bindValue(':id_post', $id_post);
            $sql->execute();
            return TRUE;
        } catch(PDOException $ex){
            return 'ERRO: '.$ex->getMessage();
        }
    }
    
    public function excluir($id_post){
        try {
            $sql = $this->con->connection()->prepare("DELETE FROM posts WHERE id_post = :id_post");
            $sql->bindValue(':id_post', $id_post);
            $sql->execute();
        } catch (PDOException $ex) {
            echo 'ERRO: '.$ex->getMessage();
        }
    }
    
    
















}


?>