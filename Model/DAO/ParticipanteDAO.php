<?php


require_once('Conexao.php');
require_once('../Model/Participante.php');

class ParticipanteDAO {

    private $con;
    public $porPagina;

    function ParticipanteDao() {
        $c = new Conexao();
        $this->con = $c->getConexao();
        $this->porPagina = 10;
    }

    function converteDataMysql($data) {
        date('Y-m-d', strtotime($data));
    }

    // Função para autentificar email e senha do usuario.
    public function efetuarLogin($email, $senha) {
        $senha = md5($senha);
        $sql = $this->con->prepare("SELECT *FROM participante WHERE email = :email AND password = :senha");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function incluirParticipante(Participante $participante) {
     $sql = $this->con->prepare("INSERT INTO participante (nome, matricula,cpf, rg, setor,cargo,funcao,tipo,email,password,status,data_nascimento) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);
          ");

        $sql->bindValue(1, $participante->getNome());
        $sql->bindValue(2, $participante->getMatricula());
        $sql->bindValue(3, $participante->getCpf());
        $sql->bindValue(4, $participante->getRg());
        $sql->bindValue(5, $participante->getSetor());
        $sql->bindValue(6, $participante->getCargo());
        $sql->bindValue(7, $participante->getFuncao());
        $sql->bindValue(8, $participante->getTipo());
        $sql->bindValue(9, $participante->getEmail());
        $sql->bindValue(10, $participante->getPassword());
        $sql->bindValue(11, $participante->getStatus());
        $sql->bindValue(12, $participante->getData_nascimento());

        $sql->execute();
    }


    public function getParticipantes() {
        $sql = $this->con->query("SELECT * FROM participante");

        $lista = array();

        while ($participantes = $sql->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $participantes;
        }
        return $lista;
    }

    public function getParticipante($id) {
        $sql = $this->con->prepare("SELECT *FROM participante WHERE idParticipante = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizaParticipante(Participante $participante) {
        $sql = $this->con->prepare("UPDATE participante SET nome = ?, matricula = ?, setor = ?,cargo = ?,funcao = ?,tipo = ?,email = ?,password = ?,status = ? WHERE idParticipante = ?");
        $sql->bindValue(1, $participante->getNome());
        $sql->bindValue(2, $participante->getMatricula());
        $sql->bindValue(5, $participante->getSetor());
        $sql->bindValue(3, $participante->getCargo());
        $sql->bindValue(4, $participante->getFuncao());
        $sql->bindValue(5, $participante->getTipo());
        $sql->bindValue(6, $participante->getEmail());
        $sql->bindValue(7, $participante->getPassword());
        $sql->bindValue(8, $participante->getStatus());
        $sql->bindValue(9, $participante->getIdParticipante());
        
        $sql->execute();
    }


    public function deletaParticipante($id) {
        $dl = $this->con->prepare("DELETE FROM participante WHERE idParticipante = :id");

        $dl->bindValue(':id', $id);
        $dl->execute();
    }

    public function getParticipantesPaginacao($pagina) {
        $init = ($pagina - 1) * $this->porPagina;

        $result = $this->con->query("SELECT * FROM participante limit $init, $this->porPagina");

        $lista = array();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function getPagina() {
        $result_total = $this->con->query("SELECT count(*) as total FROM participante")->fetch(PDO::FETCH_OBJ);

        $num_paginas = ceil($result_total->total / $this->porPagina);

        return $num_paginas;
    }

}
?>