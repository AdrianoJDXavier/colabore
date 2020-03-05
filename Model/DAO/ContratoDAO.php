<?php


require_once('Conexao.php');
require_once('../Model/Contrato.php');

class ContratoDAO
{

    private $con;
    public $porPagina;

    function ContratoDao()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
        $this->porPagina = 10;
    }

    function converteDataMysql($data)
    {
        date('Y-m-d', strtotime($data));
    }

    public function incluirContrato(Contrato $contrato)
    {
        $sql = $this->con->prepare("INSERT INTO 
        contrato
        (numContrato,Objeto_contrato,data_inicio,data_fim,num_ano,modalidade,documentos,links,situacao,valor)
        VALUES
        (?,?,?,?,?,?,?,?,?,?);
        ");

        $sql->bindValue(1, $contrato->getNumContrato());
        $sql->bindValue(2, $contrato->getObjeto_contrato());
        $sql->bindValue(3, $contrato->getData_inicio());
        $sql->bindValue(4, $contrato->getData_fim());
        $sql->bindValue(5, $contrato->getNum_ano());
        $sql->bindValue(6, $contrato->getModalidade());
        $sql->bindValue(7, $contrato->getDocumentos());
        $sql->bindValue(8, $contrato->getLinks());
        $sql->bindValue(9, $contrato->getSituacao());
        $sql->bindValue(10, $contrato->getValor());
        $sql->execute();
    }


    public function getContratos()
    {
        $sql = $this->con->query("SELECT * FROM contrato");

        $lista = array();

        while ($contratos = $sql->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $contratos;
        }
        return $lista;
    }

    public function getContrato($id)
    {
        $sql = $this->con->prepare("SELECT *FROM contrato WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizaContrato(Contrato $contrato)
    {
        $sql = $this->con->prepare("UPDATE contrato 
                                    SET 
                                    numContrato = ?,
                                    Objeto_contrato = ?,
                                    data_inicio = ?,
                                    data_fim = ?,
                                    num_ano = ?,
                                    modalidade = ?,
                                    documentos = ?,
                                    links = ?,
                                    situacao = ?
                                    WHERE id = ?;");
        $sql->bindValue(1, $contrato->getNumContrato());
        $sql->bindValue(2, $contrato->getObjeto_contrato());
        $sql->bindValue(3, $contrato->getData_inicio());
        $sql->bindValue(4, $contrato->getData_fim());
        $sql->bindValue(5, $contrato->getNum_ano());
        $sql->bindValue(6, $contrato->getModalidade());
        $sql->bindValue(7, $contrato->getDocumentos());
        $sql->bindValue(8, $contrato->getLinks());
        $sql->bindValue(9, $contrato->getSituacao());
        $sql->bindValue(10, $contrato->getId());
        $sql->execute();
    }


    public function deletaContrato($id)
    {
        $dl = $this->con->prepare("DELETE FROM contrato WHERE id = :id");

        $dl->bindValue(':id', $id);
        $dl->execute();
    }

    public function getContratosPaginacao($pagina)
    {
        $init = ($pagina - 1) * $this->porPagina;

        $result = $this->con->query("SELECT * FROM contrato limit $init, $this->porPagina");

        $lista = array();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function getPagina()
    {
        $result_total = $this->con->query("SELECT count(*) as total FROM contrato")->fetch(PDO::FETCH_OBJ);

        $num_paginas = ceil($result_total->total / $this->porPagina);

        return $num_paginas;
    }

    public function diferencaEmDias($data1, $data2)
    {
        $diferenca = strtotime($data2) - strtotime($data1);
        $segundos_de_um_dia = 60 * 60 * 24;
        $dias = intval($diferenca / $segundos_de_um_dia);

        return $dias;
    }

    public function ContratosAVencer()
    {
        $contratoDAO = new ContratoDAO();
        $contratos = $contratoDAO->getContratos();
        foreach ($contratos as $contrato) {
            $data_inicial = $contrato->data_inicio;
            $data_final = $contrato->data_fim;
            $data_atual = date("Y-m-d");
            // retorna número de dias entre a data inicial e final
            $dias_dtInicial_x_dtFinal = $this->diferencaEmDias($data_inicial, $data_final);

            // retorna número de dias entre a data atual e final
            $dias_dtAtual_x_dtFinal = $this->diferencaEmDias($data_atual, $data_final);

            // retorna número de dias entre a data atual e inicial
            $dias_dtAtual_x_dtInicial = $this->diferencaEmDias($data_inicial, $data_atual);

            $porcentagem = 100 - (round((($dias_dtAtual_x_dtInicial / $dias_dtInicial_x_dtFinal) * 100), 2));
            $lista[] = $porcentagem;
            if ($porcentagem <= 30) {
                $dl = $this->con->prepare("update contrato set situacao='A vencer' where id = :id");

                $dl->bindValue(':id', $contrato->id);
                $dl->execute();
            } else
                $dl = $this->con->prepare("update contrato set situacao='' where id = :id");

            $dl->bindValue(':id', $contrato->id);
            $dl->execute();
        }
        $dl = $this->con->prepare("select *from contrato where situacao = 'A vencer'");
        $dl->execute();
        $lista = array();
        while ($row = $dl->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function converter($segundos, $formato)
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$segundos");
        return $dtF->diff($dtT)->format($formato);
    }

    public function venceContrato()
    {
        $contratoDAO = new ContratoDAO();
        $contratos = $contratoDAO->getContratos();
        foreach ($contratos as $contrato) {
            $data_inicial = $contrato->data_inicio;
            $data_final = $contrato->data_fim;
            $data_atual = date("Y-m-d");
            $diffInicioFim = strtotime($data_final) - strtotime($data_inicial);
            $diffInicioAgora = strtotime($data_atual) - strtotime($data_inicial);
            $porcentagem = $diffInicioAgora / $diffInicioFim * 100;
            $lista[] = $porcentagem;
            if ($porcentagem >= 70 && $porcentagem < 100) {
                $contrato = $this->con->prepare("update contrato set situacao='A vencer' where id = :id");

            $contrato->bindValue(':id', $contrato->id);
            $contrato->execute();
            } elseif ($porcentagem >= 100) {
                $contrato = $this->con->prepare("update contrato set situacao='Vencido' where id = :id");

            $contrato->bindValue(':id', $contrato->id);
            $contrato->execute();
            } else
            $contrato = $this->con->prepare("update contrato set situacao='' where id = :id");

            $contrato->bindValue(':id', $contrato->id);
            $contrato->execute();
        }
        $contrato = $this->con->prepare("select *from contrato where situacao = 'A vencer'");

            $contrato->execute();
            $lista = array();
        while ($row = $contrato->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }
}
