<?php
class Conexao {

    private $servidor_mysql = 'localhost';
    private $nome_banco = 'colaborega';
    private $usuario = 'root';
    private $senha = '';
    private $con;

    public function getConexao() {
        try{
        $this->con = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco", "$this->usuario", "$this->senha");
        }catch (PDOException $e)
        {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
        }
        return $this->con;
    }
}

?>