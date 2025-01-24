<?php
require_once "validador_acesso.php";
require "../App_Help_Desk_BD/conexao.php";

try {
    $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
    $user = 'root';
    $pass = '';

    $link = new PDO($dsn, $user, $pass);

    // Consulta ao banco de dados
    $query =  "SELECT TB_CHAMADOS.*, TB_USUARIOS.nome 
               FROM TB_CHAMADOS 
               INNER JOIN TB_USUARIOS ON TB_CHAMADOS.id_usuario = TB_USUARIOS.id_usuario";

    $res = $link->prepare($query);
    $res->execute();
    $chamados = $res->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'ERRO' . $e->getCode() . ' falha na conexão: ' . $e->getMessage();
    exit();
}

// Verificação de sessão
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['perfil'])) {
    header('Location: login.php');
    exit();
}

$usuarioId = $_SESSION['id_usuario'];
$usuarioPerfil = $_SESSION['perfil'];
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <div class="ml-auto">
            <a href="home.php">
                <button class="btn-voltar">Voltar</button>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="card-consultar-chamado">
                <div class="card" style="width: 100%;">
                    <div class="card-header">Consulta de chamado</div>

                    <div class="card-body" id="card-body-gui">
                        <?php if (empty($chamados)) { ?>
                            <p>Nenhum chamado encontrado.</p>
                        <?php } else { ?>
                            <?php foreach ($chamados as $chamado) { 
                                if ($usuarioPerfil != 'administrador' && $chamado['id_usuario'] != $usuarioId) {
                                    continue;
                                }
                            ?>
                                <div class="card mb-3 bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $chamado['titulo'] ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria'] ?></h6>
                                        <p class="card-text"><?php echo $chamado['descricao'] ?></p>
                                        <p class="card-text"><strong>Status:</strong> <?php echo $chamado['status'] ?></p>
                                        <?php if ($usuarioPerfil == 'administrador') { ?>
                                            <p class="card-text"><strong>Usuário:</strong> <?php echo $chamado['nome'] ?></p>
                                        <?php } ?>
                                        <p class="card-text"><strong>Data de Criação:</strong> <?php echo $chamado['data_criacao'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
