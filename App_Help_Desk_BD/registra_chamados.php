<?php
require 'conexao.php';
require_once "validador_acesso.php";

$_sucesso = false;

if ($_POST) {
    // Certificando-se de que o id_usuario está correto
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $usuario = $_SESSION['id_usuario'];


    // Inserir o chamado no banco de dados
    $sql = mysqli_query($link, "INSERT INTO `tb_chamados`(`titulo`, `categoria`, `descricao`, `id_usuario` ) VALUES ('$titulo','$categoria','$descricao', '{$_SESSION['id_usuario']}');");


    // Verificar se a inserção foi bem-sucedida
    if($sql){
        header('Location: abrir_chamado.php?cadastro=efetuado');
    } else {
        header('Location: abrir_chamado.php?cadastro=falha');
    }
}
