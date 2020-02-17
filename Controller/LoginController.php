<?php


require_once('../Model/DAO/Conexao.php');
require_once('../Model/DAO/ParticipanteDAO.php');
require_once('../Model/Participante.php');

$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];
$opcao = $_REQUEST['opcao'];

switch ($opcao) {
    case 1: {
        $user = new Participante();
        $ParticipanteDao = new ParticipanteDAO();
        $user = $ParticipanteDao->efetuarLogin($email, $senha);
        
        if ($user == false) {
            $erro = "Login ou senha incorretos, tente novamente!";
            header("Location:../login.php?erro=" . $erro);
        } else {
                session_start();
                $_SESSION['Logado'] = true;
                $_SESSION['usuario'] = $user;
                header("Location:../index.php");
        }
    }
    break;

    case 2: {
        session_start();
        session_destroy();
        header("Location:../View/login.php");
    }
    break;
}
?>