<?php
require "../conexao.php";
require_once "../validador_acesso.php";
require_once "../validador_acessoADM.php";

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id_usuario = intval($_GET['id_usuario']);

    try {
        $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
        $user = 'root';
        $pass = '';

        $link = new PDO($dsn, $user, $pass);

        // Verificar se o chamado existe antes de excluir
        $verificaQuery = "SELECT id_usuario FROM tb_usuarios WHERE id_usuario = :id_usuario";
        $verificaStmt = $link->prepare($verificaQuery);
        $verificaStmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $verificaStmt->execute();

        if ($verificaStmt->rowCount() === 0) {
            die('Chamado não encontrado.');
        }

        // Excluir o chamado
        $deleteQuery = "DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario";
        $deleteStmt = $link->prepare($deleteQuery);
        $deleteStmt->bindParam(':id_usuario', $id_usuario);
        $deleteStmt->execute();

        
    } catch (PDOException $e) {
        echo 'ERRO' . $e->getCode() . 'falha na conexão: ' . $e->getMessage();
        exit();
    }




    header('location: ../usuarios.php?acao=excluir');
}
