<?php
class Contrato {

    public $numContrato;
    public $Objeto_contrato;
    public $data_inicio;
    public $data_fim;
    public $num_ano;
    public $modalidade;
    public $documentos;
    public $links;
    public $id;
    public $situacao;

    public function setContrato($numContrato, $Objeto_contrato, $data_inicio, $data_fim, $num_ano, $modalidade, $documentos, $links, $id, $situacao) {
        $this->numContrato = $numContrato;
        $this->Objeto_contrato = $Objeto_contrato;
        $this->data_inicio = strtotime(str_replace('/', '-', $data_inicio));
        $this->data_fim = strtotime(str_replace('/', '-', $data_fim));
        $this->num_ano = $num_ano;
        $this->modalidade = $modalidade;
        $this->documentos = $documentos;
        $this->links = $links;
        $this->id = $id;
        $this->situacao = $situacao;
    }

    public function getContrato($numContrato, $Objeto_contrato, $data_inicio, $data_fim, $num_ano, $modalidade, $documentos, $links, $id, $situacao) {
        $this->numContrato = $numContrato;
        $this->Objeto_contrato = $Objeto_contrato;
        $this->data_inicio = strtotime(str_replace('/', '-', $data_inicio));
        $this->data_fim = strtotime(str_replace('/', '-', $data_fim));
        $this->num_ano = $num_ano;
        $this->modalidade = $modalidade;
        $this->documentos = $documentos;
        $this->links = $links;
        $this->id = $id;
        $this->situacao = $situacao;
    }

    
    public function getNumContrato()
    {
        return $this->numContrato;
    }

    public function setNumContrato($numContrato)
    {
        $this->numContrato = $numContrato;

        return $this;
    }

    public function getObjeto_contrato()
    {
        return $this->Objeto_contrato;
    }

    public function setObjeto_contrato($Objeto_contrato)
    {
        $this->Objeto_contrato = $Objeto_contrato;

        return $this;
    }

    public function getData_inicio()
    {
        return $this->data_inicio;
    }

    public function setData_inicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;

        return $this;
    }

    public function getData_fim()
    {
        return $this->data_fim;
    }

    public function setData_fim($data_fim)
    {
        $this->data_fim = $data_fim;

        return $this;
    }

    public function getNum_ano()
    {
        return $this->num_ano;
    }

    public function setNum_ano($num_ano)
    {
        $this->num_ano = $num_ano;

        return $this;
    }

    public function getModalidade()
    {
        return $this->modalidade;
    }

    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;

        return $this;
    }

    public function getDocumentos()
    {
        return $this->documentos;
    }

    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;

        return $this;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }
}
?>