<?php
require "../conexao.php";
require_once "../validador_acesso.php";
require_once "../validador_acessoADM.php";

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id_usuario = intval($_GET['id_usuario']);

    mysqli_query($link, "DELETE FROM tb_usuarios WHERE id_usuario = $id_usuario");


    
    header('location: ../usuarios.php?acao=excluir');
}


?>