<?php
require_once('../../Model/DAO/Conexao.php');
require_once('../../Model/Participante.php');
$con;
$c = new Conexao();
$con = $c->getConexao();

for($i = 0; $i < 1000; $i++){

$sql = $con->prepare("INSERT INTO participante (nome, matricula,cpf, rg, setor,cargo,funcao,tipo,email,password,status,data_nascimento) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);");

        $sql->bindValue(1, 'Nome'.$i);
        $sql->bindValue(2,  $i);
        $sql->bindValue(3, 'Cpf'.$i);
        $sql->bindValue(4, 'Rg'.$i);
        $sql->bindValue(5, 'Setor'.$i);
        $sql->bindValue(6, 'Cargo'.$i);
        $sql->bindValue(7, 'Funcao'.$i);
        $sql->bindValue(8, 'Tipo'.$i);
        $sql->bindValue(9, 'Email'.$i);
        $sql->bindValue(10, 'Password'.$i);
        $sql->bindValue(11, '1');
        $sql->bindValue(12, '2020-01-01');
        if($sql->execute() === false){
            echo "<pre>";
            print_r($sql->errorInfo());
        }
        
}   