<?php
session_start();
include 'conexao.php';


$resultado = mysqli_query($link, 'SELECT * FROM TB_USUARIOS');


if (!$resultado) {
    die('Erro ao executar a consulta: ' . mysqli_error($link));
} 


$usuarioAutenticado = false;
// Recebendo os dados via POST
$emailUsuario = $_POST['email'];
$senhaUsuario = md5($_POST['senha']);

// Autenticando o usuário

foreach ($resultado as $usuario) {
    if ($emailUsuario == $usuario['email'] && $senhaUsuario == $usuario['senha']) {
        $usuarioAutenticado = true;
        $_SESSION['autenticado'] = 'sim';
        $_SESSION['id_usuario'] = $usuario['id_usuario']; 
        $_SESSION['perfil'] = $usuario['perfil']; 
        header('Location: home.php');
        exit();
    }
}

if (!$usuarioAutenticado) {
    $_SESSION['autenticado'] = 'nao';
    header('Location: index.php?login=erro');
    exit();
}
?>
