<?php
require_once "validador_acesso.php";

$_sucesso = false;

if ($_POST) {
    echo '<pre>';
    print_r($_POST);
    print_r($_SESSION);
    echo '</pre>';

    // Certificando-se de que o id_usuario está correto
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $id_usuario = $_SESSION['id_usuario'];

    try {
        $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
        $user = 'root';
        $pass = '';

        $link = new PDO($dsn, $user, $pass);
        // Inserir o chamado no banco de dados
        $query = "INSERT INTO tb_chamados (titulo, categoria, descricao, id_usuario) VALUES (:titulo, :categoria, :descricao, :id_usuario)";
        $res = $link->prepare($query);
        $res->bindParam(':titulo', $titulo);
        $res->bindParam(':categoria', $categoria);
        $res->bindParam(':descricao', $descricao);
        $res->bindParam(':id_usuario', $id_usuario);


        // Executa a query
        $resultado = $res->execute();        

        // Verificar se a inserção foi bem-sucedida
        if ($resultado) {
            header('Location: abrir_chamado.php?cadastro=efetuado');
        } else {
            header('Location: abrir_chamado.php?cadastro=falha');
        }
    } catch (PDOException $e) {
        echo 'ERRO' . $e->getCode() . 'falha na conexão: ' . $e->getMessage();
        exit();
    }
}
