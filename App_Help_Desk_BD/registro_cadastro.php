<?php
require 'conexao.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['select'];

        // Verificar se o e-mail já existe no banco
        $query = "SELECT email FROM tb_usuarios WHERE email = '$email'";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) > 0) {
            header('Location: cadastro.php?cadastro=erro&motivo=email');
            exit();
        }

        // Inserir o registro
        mysqli_query($link, "INSERT INTO tb_usuarios (nome, email, senha, perfil) VALUES ('$nome', '$email', '$senha', '$perfil')");
        
        $_sucesso = true;
        header('Location: index.php?cadastro=sucesso');
        
        exit();
}
?>
