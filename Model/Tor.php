<?php
class Tor {
    public $numTor;
    public $tipo;
    public $titulo;
    public $plano_trabalho;
    public $TituloComponente;
    public $entidade;
    public $endereco;
    public $nome;
    public $telefone;
    public $problema;
    public $objetivo_geral;
    public $objetivo_especifico;
    public $Problema_atividade;
    public $objetivo_produto;
    public $objetivo_apresentacao;
    public $data_inicio;
    public $data_fim;
    public $custo_contratado;
    public $custo_contratante;
    public $forma_pagamento;
    public $tor;

    public function setContrato($tipo, $titulo, $plano_trabalho, $TituloComponente, $entidade, $endereco,$nome, $telefone, $problema, $objetivo_geral, $objetivo_especifico, $Problema_atividade, $objetivo_produto, $objetivo_apresentacao, $data_inicio, $data_fim, $custo_contratado, $custo_contratante, $forma_pagamento, $tor) {
        $this->tipo = $tipo;
        $this->titulo = $titulo;
        $this->plano = $plano_trabalho;
        $this->TituloComponente = $TituloComponente;
        $this->entidade =$entidade;
        $this->endereco = $endereco;
        $this->nome = $nome;
        $this->telefone =  $telefone;
        $this->problema = $problema;
        $this->objetivo_geral = $objetivo_geral;
        $this->objetivo_especifico = $objetivo_especifico;
        $this->Problema_atividade = $Problema_atividade;
        $this->objetivo_produto = $objetivo_produto;
        $this->objetivo_apresentacao = $objetivo_apresentacao;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->custo_contratado = $custo_contratado;
        $this->custo_contratante = $custo_contratante;
        $this->forma_pagamento = $forma_pagamento;
        $this->tor = $tor;
    }

    public function getContrato($numTor, $tipo, $titulo, $plano_trabalho, $TituloComponente, $entidade, $endereco,$nome, $telefone, $problema, $objetivo_geral, $objetivo_especifico, $Problema_atividade, $objetivo_produto, $objetivo_apresentacao, $data_inicio, $data_fim, $custo_contratado, $custo_contratante, $forma_pagamento, $tor) {
        $this->numTor = $numTor;
        $this->tipo = $tipo;
        $this->titulo = $titulo;
        $this->plano = $plano_trabalho;
        $this->TituloComponente = $TituloComponente;
        $this->entidade =$entidade;
        $this->endereco = $endereco;
        $this->nome = $nome;
        $this->telefone =  $telefone;
        $this->problema = $problema;
        $this->objetivo_geral = $objetivo_geral;
        $this->objetivo_especifico = $objetivo_especifico;
        $this->Problema_atividade = $Problema_atividade;
        $this->objetivo_produto = $objetivo_produto;
        $this->objetivo_apresentacao = $objetivo_apresentacao;
        $this->data_inicio = strtotime(str_replace('/', '-',$data_inicio));
        $this->data_fim = strtotime(str_replace('/', '-',$data_fim));
        $this->custo_contratado = $custo_contratado;
        $this->custo_contratante = $custo_contratante;
        $this->forma_pagamento = $forma_pagamento;
        $this->tor = $tor;
    }

    public function getNumTor()
    {
        return $this->numTor;
    }

    public function setNumTor($numTor)
    {
        $this->numTor = $numTor;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getPlano_trabalho()
    {
        return $this->plano_trabalho;
    }

    public function setPlano_trabalho($plano_trabalho)
    {
        $this->plano_trabalho = $plano_trabalho;

        return $this;
    }

    public function getTituloComponente()
    {
        return $this->TituloComponente;
    }

    public function setTituloComponente($TituloComponente)
    {
        $this->TituloComponente = $TituloComponente;

        return $this;
    }

    public function getEntidade()
    {
        return $this->entidade;
    }

    public function setEntidade($entidade)
    {
        $this->entidade = $entidade;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getProblema()
    {
        return $this->problema;
    }

    public function setProblema($problema)
    {
        $this->problema = $problema;

        return $this;
    }

    public function getObjetivo_geral()
    {
        return $this->objetivo_geral;
    }

    public function setObjetivo_geral($objetivo_geral)
    {
        $this->objetivo_geral = $objetivo_geral;

        return $this;
    }

    public function getObjetivo_especifico()
    {
        return $this->objetivo_especifico;
    }

    public function setObjetivo_especifico($objetivo_especifico)
    {
        $this->objetivo_especifico = $objetivo_especifico;

        return $this;
    }

    public function getProblema_atividade()
    {
        return $this->Problema_atividade;
    }

    public function setProblema_atividade($Problema_atividade)
    {
        $this->Problema_atividade = $Problema_atividade;

        return $this;
    }

    public function getObjetivo_produto()
    {
        return $this->objetivo_produto;
    }

    public function setObjetivo_produto($objetivo_produto)
    {
        $this->objetivo_produto = $objetivo_produto;

        return $this;
    }

    public function getObjetivo_apresentacao()
    {
        return $this->objetivo_apresentacao;
    }

    public function setObjetivo_apresentacao($objetivo_apresentacao)
    {
        $this->objetivo_apresentacao = $objetivo_apresentacao;

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

    public function getCusto_contratado()
    {
        return $this->custo_contratado;
    }

    public function setCusto_contratado($custo_contratado)
    {
        $this->custo_contratado = $custo_contratado;

        return $this;
    }

    public function getCusto_contratante()
    {
        return $this->custo_contratante;
    }

    public function setCusto_contratante($custo_contratante)
    {
        $this->custo_contratante = $custo_contratante;

        return $this;
    }

    public function getForma_pagamento()
    {
        return $this->forma_pagamento;
    }

    public function setForma_pagamento($forma_pagamento)
    {
        $this->forma_pagamento = $forma_pagamento;

        return $this;
    }

    public function getTor()
    {
        return $this->tor;
    }

    public function setTor($tor)
    {
        $this->tor = $tor;

        return $this;
    }
}
?>