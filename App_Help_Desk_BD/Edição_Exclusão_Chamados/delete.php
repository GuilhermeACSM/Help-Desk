<?php
require "../conexao.php";
require_once "../validador_acesso.php";
require_once "../validador_acessoADM.php";

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id_chamado = intval($_GET['id_chamado']);

    mysqli_query($link, "DELETE FROM tb_chamados WHERE id_chamado = $id_chamado");


    
    header('location: ../editar_arquivo.php?acao=excluir');
}

?>

