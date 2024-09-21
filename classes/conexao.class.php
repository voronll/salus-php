<?php
// Fábrica de conexões (connection factory).
 
class Connect{
    private $user;
    private $password;
    private $db;
    private $server;
    private static $pdo;
 
    public function __construct(){
        $this->server = "localhost";
        $this->db = "salusdef";
        $this->user = "root";
        $this->password = "";
    }
 
    public function connection(){
        try{
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->password);
            }
           
            //echo "conectou";

            return self::$pdo;
        }
        catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
}

?>