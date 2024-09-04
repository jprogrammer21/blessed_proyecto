<?php
require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class connection {
    private $c;
    private $usuario;
    private $password;
    private $host;

    public function __construct(){
        $this->usuario=$_ENV['USER'];
        $this->password=$_ENV['pass'];
        $this->host=$_ENV['host'];
        try{
            
            $this->c = new PDO($this->host,$this->usuario,$this->password);
            $this->c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "error".$e->getMessage();
        }
    }
    public function getconnection(){
        return $this->c;
    }
}