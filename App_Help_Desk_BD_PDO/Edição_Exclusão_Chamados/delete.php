<?php
require "../conexao.php";
require_once "../validador_acesso.php";
require_once "../validador_acessoADM.php";

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id_chamado = intval($_GET['id_chamado']);

    try {
        $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
        $user = 'root';
        $pass = '';

        $link = new PDO($dsn, $user, $pass);

        // Verificar se o chamado existe antes de excluir
        $verificaQuery = "SELECT id_chamado FROM tb_chamados WHERE id_chamado = :id_chamado";
        $verificaStmt = $link->prepare($verificaQuery);
        $verificaStmt->bindParam(':id_chamado', $id_chamado, PDO::PARAM_INT);
        $verificaStmt->execute();

        if ($verificaStmt->rowCount() === 0) {
            die('Chamado não encontrado.');
        }

        // Excluir o chamado
        $deleteQuery = "DELETE FROM tb_chamados WHERE id_chamado = :id_chamado";
        $deleteStmt = $link->prepare($deleteQuery);
        $deleteStmt->bindParam(':id_chamado', $id_chamado, PDO::PARAM_INT);
        $deleteStmt->execute();

        
    } catch (PDOException $e) {
        echo 'ERRO' . $e->getCode() . 'falha na conexão: ' . $e->getMessage();
        exit();
    }




    header('location: ../editar_arquivo.php?acao=excluir');
}
