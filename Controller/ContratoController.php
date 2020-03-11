<?php
require_once('../Model/DAO/ContratoDAO.php');
require_once('../Model/Contrato.php');

$opcao = $_REQUEST['opcao'];

switch ($opcao) {
    case 1:
    $contrato = new Contrato();
    $contrato->setContrato($_REQUEST['numContrato'], $_REQUEST['Objeto_contrato'], $_REQUEST['data_inicio'], $_REQUEST['data_fim'], $_REQUEST['num_ano'], $_REQUEST['modalidade'], $_REQUEST['documentos'], $_REQUEST['links'], $_REQUEST['situacao'], $_REQUEST['valor']);
    
    $contratoDao = new ContratoDAO();

    $contratoDao->ContratoDAO();
    $contratoDao->incluirContrato($contrato);
    header("Location:ContratoController.php?opcao=6&pagina=1");
    break;

    case 2:
    $contratoDao = new ContratoDAO();
    $lista = $contratoDao->getContratos();
    session_start();
    $_SESSION['contratos'] = $lista;
    header("Location:Contratoontroller.php?opcao=6&pagina=1");
    break;

    case 3:
    $id = $_REQUEST['id'];
    $contratoDao = new ContratoDAO();

    $contrato = $contratoDao->getContrato($id);
    session_start();
    $_SESSION['contrato'] = $contrato;
    header('Location:../View/Contrato/atualizarContrato.php');
    break;

    case 4:
    $id = (int) $_REQUEST['id'];
    $contratoDao = new ContratoDAO();
    $contratoDao->deletaContrato($id);
    header("Location:ContratoController.php?opcao=6&pagina=1");
    break;

    case 5:
    session_start();
    
    $contrato = new Contrato();
    $contrato->setContrato($_REQUEST['numContrato'], $_REQUEST['Objeto_contrato'], $_REQUEST['data_inicio'], $_REQUEST['data_fim'], $_REQUEST['num_ano'], $_REQUEST['modalidade'], $_REQUEST['documentos'], $_REQUEST['links'], $_REQUEST['situacao'], $_REQUEST['valor']);
    $contrato->setId($_REQUEST['id']);

    $contratoDao = new ContratoDAO();
    $contratoDao->atualizaContrato($contrato);
        header("Location:ContratoController.php?opcao=6&pagina=1");
    break;

    case 6:
    $pagina = (int) $_REQUEST['pagina'];

    $contratoDao = new ContratoDAO();

    $lista = $contratoDao->getContratosPaginacao($pagina);
    $numpaginas = $contratoDao->getPagina();

    session_start();

    $_SESSION['contratos'] = $lista;

    header("Location:../View/Contrato/exibirContratos.php?paginas=$numpaginas&pagina=$pagina");
    break;

    case 7:
        $contratoDao = new ContratoDAO();
    
        $lista = $contratoDao->ContratosAVencer();
    
        session_start();
    
        $_SESSION['contratos_vencer'] = $lista;
    
        header("Location:../View/Home/home.php");
        break;
}
?>

    