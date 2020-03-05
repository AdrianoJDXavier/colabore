<?php
require_once('../../Model/DAO/autentificar.php');

if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../asset/img/logo.png">

    <title>ColaboreGA</title>

    <!-- Bootstrap CSS -->

    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../../asset/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../../asset/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../../asset/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet"/>
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    -->
    <link href="../../asset/css/style.css" rel="stylesheet">
    <link href="../../asset/css/style-responsive.css" rel="stylesheet" />
    <link href="../../asset/css/xcharts.min.css" rel=" stylesheet">
    <link href="../../asset/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="../../asset/css/abaStyle.css" rel="stylesheet">

</head>

<body>
    <!-- container section start -->
    <section id="container" class="">


        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
                    <i class="icon_menu"></i>
                </div>
            </div>

            <!--logo start-->
            <a href="../../Controller/ContratoController.php?opcao=7" class="logo">Colabore
                <span class="lite">GA</span>
            </a>
            <!--logo end-->

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right/ top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="">
                            </span>
                            <span class="username">Bem Vindo:
                                <strong><?= $user->nome ?></strong>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#">
                                    <i class="icon_profile"></i> Meu Perfil</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon_mail_alt"></i> Mensagens</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon_clock_alt"></i> Linha do Tempo</a>
                            </li>
                            <li>
                                <a href="../../Model/DAO/sair.php">
                                    <i class="icon_key_alt"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="/">
                            <i class="icon_house_alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Contratos</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="../Contrato/cad_contrato.php">Cadastrar Contrato</a>
                            </li>
                            <li>
                                <a class="" href="../../Controller/ContratoController.php?opcao=6&pagina=1">Listar contratos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class=" icon_profile"></i>
                            <span>Participantes</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="../Participante/cad_participante.php">Cadastrar Participantes</a>
                            </li>
                            <li>
                                <a class="" href="../../Controller/ParticipanteController.php?opcao=6&pagina=1">Listar Participantes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_documents"></i>
                            <span>TOR</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="../TermoReferencia/TORpessoafisica.php">TOR Pessoa Fisica</a>
                            </li>
                            <li>
                                <a class="" href="../TermoReferencia/TORpessoaJuridica.php">TOR Pessoa Juridica</a>
                            </li>
                            <li>
                                <a class="" href="Eventos">TOR Eventos</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <section class="content" id="main-content">
            <section class="wrapper">