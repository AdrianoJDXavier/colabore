<?php
class Participante {

public $idParticipante;
public $nome;
public $matricula;
public $cpf;
public $rg;
public $setor;
public $cargo;
public $funcao;
public $tipo;
public $email;
public $password;
public $status;
public $data_nascimento;

    public function setParticipante($nome, $matricula, $cpf, $rg, $setor, $cargo, $funcao, $tipo, $email, $password, $status, $data_nascimento) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->setor = $setor;
        $this->cargo = $cargo;
        $this->funcao = $funcao;
        $this->tipo = $tipo;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->data_nascimento = $data_nascimento;
    }

    public function getParticipante($nome, $matricula, $cpf, $rg, $setor, $cargo, $funcao, $tipo, $email, $password, $status, $data_nascimento) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->setor = $setor;
        $this->cargo = $cargo;
        $this->funcao = $funcao;
        $this->tipo = $tipo;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->data_nascimento = strtotime(str_replace('/', '-', $data_nascimento));
    }




public function getIdParticipante()
{
return $this->idParticipante;
}

public function setIdParticipante($idParticipante)
{
$this->idParticipante = $idParticipante;

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

public function getMatricula()
{
return $this->matricula;
}

public function setMatricula($matricula)
{
$this->matricula = $matricula;

return $this;
}

public function getCpf()
{
return $this->cpf;
}

public function setCpf($cpf)
{
$this->cpf = $cpf;

return $this;
}

public function getRg()
{
return $this->rg;
}

public function setRg($rg)
{
$this->rg = $rg;

return $this;
}

public function getSetor()
{
return $this->setor;
}

public function setSetor($setor)
{
$this->setor = $setor;

return $this;
}

public function getCargo()
{
return $this->cargo;
}

public function setCargo($cargo)
{
$this->cargo = $cargo;

return $this;
}

public function getFuncao()
{
return $this->funcao;
}

public function setFuncao($funcao)
{
$this->funcao = $funcao;

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

public function getEmail()
{
return $this->email;
}

public function setEmail($email)
{
$this->email = $email;

return $this;
}

public function getPassword()
{
return $this->password;
}

public function setPassword($password)
{
$this->password = $password;

return $this;
}

public function getStatus()
{
return $this->status;
}

public function setStatus($status)
{
$this->status = $status;

return $this;
}

public function getData_nascimento()
{
return $this->data_nascimento;
}

public function setData_nascimento($data_nascimento)
{
$this->data_nascimento = $data_nascimento;

return $this;
}
}
