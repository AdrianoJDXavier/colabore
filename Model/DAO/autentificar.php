<?php

session_start();
$estado = $_SESSION['Logado'];
if (!$estado || !isset($_SESSION['Logado'])) {
    header("Location:../../login.php?erro=Você precisa logar para ter acesso ao sistema!");
}
?>