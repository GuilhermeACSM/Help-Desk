<?php
if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
    $user = 'root';
    $pass = '';

    
    $emailUsuario = $_POST['email'];
    $senhaUsuario = md5($_POST['senha']);

try {

    $link = new PDO($dsn, $user, $pass);

        // Consulta ao banco de dados
        $query = "SELECT * FROM TB_USUARIOS WHERE email = :email AND senha = :senha";
        $res = $link->prepare($query);
        $res->bindValue(':email', $emailUsuario);
        $res->bindValue(':senha', $senhaUsuario);
        $res->execute();

        $usuario = $res->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Exibe mensagem de erro, apenas em ambiente de desenvolvimento
    echo 'ERRO' . $e->getCode() . 'falha na conexão: ' . $e->getMessage();
    exit();
    }
} 
?>
