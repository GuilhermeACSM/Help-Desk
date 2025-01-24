<?php
session_start();
include 'conexao.php';

if ($usuario) {
    $_SESSION['autenticado'] = 'sim';
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['perfil'] = $usuario['perfil'];
    header('Location: home.php');
    exit();
} 

if (!$usuario) {
    $_SESSION['autenticado'] = 'nao';
    header('Location: index.php?login=erro');
    exit();
}

?>
