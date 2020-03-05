<?php
require_once('../Model/DAO/ParticipanteDAO.php');
require_once('../Model/Participante.php');

$opcao = $_REQUEST['opcao'];

switch ($opcao) {
    case 1:
    $participante = new Participante();
    $participante->setParticipante($_REQUEST['nome'], $_REQUEST['matricula'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['setor'], $_REQUEST['cargo'], $_REQUEST['funcao'], $_REQUEST['tipo'], $_REQUEST['email'], md5($_REQUEST['password']), $_REQUEST['status'], $_REQUEST['data_nascimento']);

    $participanteDao = new ParticipanteDAO();

    $participanteDao->ParticipanteDAO();
    $participanteDao->incluirParticipante($participante);
    header("Location:ParticipanteController.php?opcao=6&pagina=1");
    break;

    case 2:
    $participanteDao = new ParticipanteDAO();
    $lista = $participanteDao->getParticipantes();
    session_start();
    $_SESSION['participantes'] = $lista;
    header("Location:ParticipanteController.php?opcao=6&pagina=1");
    break;

    case 3:
    $id = $_REQUEST['id'];
    $participanteDao = new ParticipanteDAO();

    $participante = $participanteDao->getParticipante($id);
    session_start();
    $_SESSION['participante'] = $participante;
    header('Location:../View/Participante/atualizarParticipante.php');
    break;

    case 4:
    $id = (int) $_REQUEST['id'];
    $participanteDao = new ParticipanteDAO();
    $participanteDao->deletaParticipante($id);
    header("Location:ParticipanteController.php?opcao=6&pagina=1");
    break;

    case 5:
    session_start();
    $user = $_SESSION['usuario'];
    $participante = new Participante();
    $participante->setParticipante($_REQUEST['nome'], $_REQUEST['matricula'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['setor'], $_REQUEST['cargo'], $_REQUEST['funcao'], $_REQUEST['tipo'], $_REQUEST['email'], md5($_REQUEST['password']), $_REQUEST['status'], $_REQUEST['data_nascimento']);
    $participante->setIdParticipante($_REQUEST['id']);

    $participanteDao = new ParticipanteDAO();
    $participanteDao->atualizaParticipante($participante);
    if ($user->Tipo_user == 0) {
        header("Location:ParticipanteController.php?opcao=6&pagina=1");
    } elseif ($user->Tipo_user == 1) {
        header("Location:../index.php");
    }
    break;

    case 6:
    $pagina = (int) $_REQUEST['pagina'];

    $participanteDao = new ParticipanteDAO();

    $lista = $participanteDao->getParticipantesPaginacao($pagina);
    $numpaginas = $participanteDao->getPagina();

    session_start();

    $_SESSION['participantes'] = $lista;

    header("Location:../View/Participante/exibirParticipantes.php?paginas=$numpaginas&pagina=$pagina");
    break;
}
?>

    