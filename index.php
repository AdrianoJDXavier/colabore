<?php
session_start();
if(isset($_SESSION['usuario'])){
header('Location: View/Home/home.php');
}else{
    header('Location: login.php');
}
?>