<?
require_once('../../Model/DAO/Conexao.php');


$con;
$c = new Conexao();
$con = $c->getConexao();

function getContratos($c)
    {
        $sql = $c->query("SELECT * FROM contrato");

        $lista = array();

        while ($contratos = $sql->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $contratos;
        }
        return $lista;
    }

    $contratos = getContratos($con);
    foreach ($contratos as $contrato) {
        $data_inicial = $contrato->data_inicio;
        $data_final = $contrato->data_fim;
        $data_atual = date("Y-m-d");
        // retorna número de dias entre a data inicial e final
        $dias_dtInicial_x_dtFinal = diferencaEmDias($data_inicial, $data_final);

        // retorna número de dias entre a data atual e final
        $dias_dtAtual_x_dtFinal = diferencaEmDias($data_atual, $data_final);

        // retorna número de dias entre a data atual e inicial
        $dias_dtAtual_x_dtInicial = diferencaEmDias($data_inicial, $data_atual);

        $porcentagem = 100 - (round((($dias_dtAtual_x_dtInicial / $dias_dtInicial_x_dtFinal) * 100), 2));
        $lista[] = $porcentagem;
     
        if ($porcentagem <= 30 && $porcentagem > 0) {
            $dl = $con->prepare("update contrato set situacao='A vencer' where id = :id");

            $dl->bindValue(':id', $contrato->id);
            $dl->execute();
        }
        else if ($porcentagem < 0) {
            $dl = $con->prepare("update contrato set situacao='Vencido' where id = :id");

            $dl->bindValue(':id', $contrato->id);
            $dl->execute();
        } else
            $dl = $con->prepare("update contrato set situacao='' where id = :id");

        $dl->bindValue(':id', $contrato->id);
        $dl->execute();
    }

function converter($segundos, $formato)
{
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$segundos");
    return $dtF->diff($dtT)->format($formato);
}
function diferencaEmDias($data1, $data2)
{
    $diferenca = strtotime($data2) - strtotime($data1);
    $segundos_de_um_dia = 60 * 60 * 24;
    $dias = intval($diferenca / $segundos_de_um_dia);

    return $dias;
}
