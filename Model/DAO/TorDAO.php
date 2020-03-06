<?php
require_once('Conexao.php');
require_once('../Model/Tor.php');

class TorDAO
{

    private $con;
    public $porPagina;

    function TorDao()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
        $this->porPagina = 10;
    }

    function converteDataMysql($data)
    {
        date('Y-m-d', strtotime($data));
    }

    public function incluirTor(Tor $tor)
    {
        $sql = $this->con->prepare("INSERT INTO tor
        (tipo, titulo, plano_trabalho, TituloComponente, entidade, endereco, nome, telefone, problema, objetivo_geral,  objetivo_especifico, Problema_atividade, objetivo_produto, objetivo_apresentacao, data_inicio, data_fim, custo_contratado,custo_contratante, forma_pagamento, tor) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);
        ");
        $sql->bindValue(1, $tor->getTipo());
        $sql->bindValue(2, $tor->getTitulo());
        $sql->bindValue(3, $tor->getPlano_trabalho());
        $sql->bindValue(4, $tor->getTituloComponente());
        $sql->bindValue(5, $tor->getEntidade());
        $sql->bindValue(6, $tor->getEndereco());
        $sql->bindValue(7, $tor->getNome());
        $sql->bindValue(8, $tor->getTelefone());
        $sql->bindValue(9, $tor->getProblema());
        $sql->bindValue(10, $tor->getObjetivo_geral());
        $sql->bindValue(11, $tor->getObjetivo_especifico());
        $sql->bindValue(12, $tor->getProblema_atividade());
        $sql->bindValue(13, $tor->getObjetivo_produto());
        $sql->bindValue(14, $tor->getObjetivo_apresentacao());
        $sql->bindValue(15, $tor->getData_inicio());
        $sql->bindValue(16, $tor->getData_fim());
        $sql->bindValue(17, $tor->getCusto_contratado());
        $sql->bindValue(18, $tor->getCusto_contratante());
        $sql->bindValue(19, $tor->getForma_pagamento());
        $sql->bindValue(20, $tor->getTor());

        $sql->execute();
    }


    public function getTors()
    {
        $sql = $this->con->query("SELECT * FROM contrato");

        $lista = array();

        while ($tors = $sql->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $tors;
        }
        return $lista;
    }

    public function getTor($id)
    {
        $sql = $this->con->prepare("SELECT *FROM tor WHERE numTor = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizaTor(Tor $tor)
    {
        $sql = $this->con->prepare("UPDATE tor 
                                    SET tipo = ?, titulo = ?, plano_trabalho = ?, TituloComponente = ?, entidade = ?, endereco = ?, nome = ?, telefone = ?, problema = ?, objetivo_geral = ?,  objetivo_especifico = ?, Problema_atividade = ?, objetivo_produto = ?, objetivo_apresentacao = ?, data_inicio = ?, data_fim = ?, custo_contratado = ?,custo_contratante = ?, forma_pagamento = ?, tor = ? WHERE numTor = ?;");

        $sql->bindValue(1, $tor->getTipo());
        $sql->bindValue(2, $tor->getTitulo());
        $sql->bindValue(3, $tor->getPlano_trabalho());
        $sql->bindValue(4, $tor->getTituloComponente());
        $sql->bindValue(5, $tor->getEntidade());
        $sql->bindValue(6, $tor->getEndereco());
        $sql->bindValue(7, $tor->getNome());
        $sql->bindValue(8, $tor->getTelefone());
        $sql->bindValue(9, $tor->getProblema());
        $sql->bindValue(10, $tor->getObjetivo_geral());
        $sql->bindValue(11, $tor->getObjetivo_especifico());
        $sql->bindValue(12, $tor->getProblema_atividade());
        $sql->bindValue(13, $tor->getObjetivo_produto());
        $sql->bindValue(14, $tor->getObjetivo_apresentacao());
        $sql->bindValue(15, $tor->getData_inicio());
        $sql->bindValue(16, $tor->getData_fim());
        $sql->bindValue(17, $tor->getCusto_contratado());
        $sql->bindValue(18, $tor->getCusto_contratante());
        $sql->bindValue(19, $tor->getForma_pagamento());
        $sql->bindValue(20, $tor->getTor());
        $sql->bindValue(20, $tor->getNumTor());
    }


    public function deletaTor($id)
    {
        $dl = $this->con->prepare("DELETE FROM tor WHERE numtor = :id");

        $dl->bindValue(':id', $id);
        $dl->execute();
    }

    public function getTorsPaginacao($pagina)
    {
        $init = ($pagina - 1) * $this->porPagina;

        $result = $this->con->query("SELECT * FROM tor limit $init, $this->porPagina");

        $lista = array();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function getPagina()
    {
        $result_total = $this->con->query("SELECT count(*) as total FROM tor")->fetch(PDO::FETCH_OBJ);

        $num_paginas = ceil($result_total->total / $this->porPagina);

        return $num_paginas;
    }
}
