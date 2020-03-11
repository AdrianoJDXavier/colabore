<?php
require_once('../../Model/DAO/Conexao.php');
require_once('../../Model/Contrato.php');
$con;
$c = new Conexao();
$con = $c->getConexao();

for($i = 0; $i < 1000; $i++){

    $sql = $con->prepare("INSERT INTO 
    contrato
    (numContrato,Objeto_contrato,data_inicio,data_fim,num_ano,modalidade,documentos,links,situacao,valor)
    VALUES
    (?,?,?,?,?,?,?,?,?,?);
    ");

    $sql->bindValue(1, $i."".$i);
    $sql->bindValue(2, "Objeto".$i);
    $sql->bindValue(3, '2018-01-01');
    $sql->bindValue(4, '2020-01-01');
    $sql->bindValue(5, $i.'2018');
    $sql->bindValue(6, 'Modalidade_'.$i);
    $sql->bindValue(7, 'Documento_'.$i);
    $sql->bindValue(8, 'Link_'.$i);
    $sql->bindValue(9, 'Em Andamento');
    $sql->bindValue(10, $i.''.$i);
    $sql->execute();
        if($sql->execute() === false){
            echo "<pre>";
            print_r($sql->errorInfo());
        }
        
}   