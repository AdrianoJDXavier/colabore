<?php
require_once('../Model/DAO/TorDAO.php');
require_once('../Model/Tor.php');

$opcao = $_REQUEST['opcao'];

switch ($opcao) {
    case 1:
    $tor = new Tor();

    $tor->setContrato($_REQUEST['tipo'], $_REQUEST['titulo'], $_REQUEST['acao'], $_REQUEST['componente'],$_REQUEST['entidade'], $_REQUEST['endereco'], $_REQUEST['nome'], $_REQUEST['telefone'], $_REQUEST['problema'], $_REQUEST['objetivo_geral'], $_REQUEST['objetivoEsp'], $_REQUEST['atividade'], $_REQUEST['produtos'], $_REQUEST['apresentacao'], $_REQUEST['inicio'], $_REQUEST['fim'], $_REQUEST['CustosContratado'], $_REQUEST['CustosContratante'], $_REQUEST['pagamento'], $_REQUEST['tor']);
    
    $torDao = new TorDAO();

    $torDao->TorDAO();
    $torDao->incluirTor($tor);
    header("Location:TorController.php?opcao=6&pagina=1");
    break;

    case 2:
    $torDao = new TorDAO();
    $lista = $torDao->getTors();
    session_start();
    $_SESSION['tors'] = $lista;
    header("Location:TorController.php?opcao=6&pagina=1");
    break;

    case 3:
    $id = $_REQUEST['id'];
    $torDao = new TorDAO();

    $tor = $torDao->getTor($id);
    session_start();
    $_SESSION['tor'] = $tor;
    header('Location:../View/Tor/atualizarTor.php');
    break;

    case 4:
    $id = (int) $_REQUEST['id'];
    $torDao = new TorDAO();
    $torDao->deletaTor($id);
    header("Location:TorController.php?opcao=6&pagina=1");
    break;

    case 5:
    session_start();
    $tor = new Tor();
    $tor->$tor->setContrato($_REQUEST['tipo'], $_REQUEST['titulo'], $_REQUEST['acao'], $_REQUEST['componente'],$_REQUEST['entidade'], $_REQUEST['endereco'], $_REQUEST['nome'], $_REQUEST['telefone'], $_REQUEST['problema'], $_REQUEST['objetivo_geral'], $_REQUEST['objetivoEsp'], $_REQUEST['atividade'], $_REQUEST['produtos'], $_REQUEST['apresentacao'], $_REQUEST['inicio'], $_REQUEST['fim'], $_REQUEST['CustosContratado'], $_REQUEST['CustosContratante'], $_REQUEST['pagamento'], $_REQUEST['tor']);

    $tor->setNumTor($_REQUEST['id']);

    $torDao = new TorDAO();
    $torDao->atualizaTor($tor);
        header("Location:TorController.php?opcao=6&pagina=1");
    break;

    case 6:
    $pagina = (int) $_REQUEST['pagina'];

    $torDao = new TorDAO();

    $lista = $torDao->getTorsPaginacao($pagina);
    $numpaginas = $torDao->getPagina();
    session_start();

    $_SESSION['tors'] = $lista;

    header("Location:../View/TermoReferencia/ListaTor.php?paginas=$numpaginas&pagina=$pagina");
    break;

}
?>

    