<?php
include 'conexao.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['select'];

    try {
        // Verificar se o e-mail já existe no banco
        $query = "SELECT email FROM tb_usuarios WHERE email = :email";
        $res = $link->prepare($query);
        $res->bindParam(':email', $email);
        $res->execute();

        if ($res->rowCount() > 0) {
            header('Location: cadastro.php?cadastro=erro&motivo=email');
            exit();
        }

        // Inserir o registro no banco de dados
        $query = "INSERT INTO tb_usuarios (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";
        $res = $link->prepare($query);
        $res->bindParam(':nome', $nome);
        $res->bindParam(':email', $email);
        $res->bindParam(':senha', $senha);
        $res->bindParam(':perfil', $perfil);

        if ($res->execute()) {
            $_sucesso = true;
            header('Location: index.php?cadastro=sucesso');
        }
    } catch (PDOException $e) {
        echo 'ERRO' . $e->getCode() . 'falha na conexão: ' . $e->getMessage();
        exit();
    }
}
?>
