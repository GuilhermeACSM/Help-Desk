<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";

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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>App Help Desk</title>
</head>

<body>
    <?php if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') { ?>
        <div>
            <script>
                alert('Chamado excluido com sucesso!')
                if (history.replaceState) {
                    const url = window.location.href.split('?')[0];
                    history.replaceState(null, null, url);
                }
            </script>
        </div>
    <?php } ?>
    <?php if (isset($_GET['acao']) && $_GET['acao'] === 'editado') { ?>
        <div>
            <script>
                alert('Chamado editado com sucesso!')
                if (history.replaceState) {
                    const url = window.location.href.split('?')[0];
                    history.replaceState(null, null, url);
                }
            </script>
        </div>
    <?php } ?>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <!-- Botão de sair posicionado no canto direito -->
        <div class="ml-auto">
            <a href="home.php">
                <button class="btn-voltar">
                    <i class="fas fa-sign-out-alt"></i> Voltar
                </button>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="card-consultar-chamado">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        Editar chamado
                    </div>

                    <div class="card-body" id="card-body-gui">

                        <?php
                        foreach ($chamados as $chamado) {
                            if ($usuarioPerfil != 'administrador' && $chamado['id_usuario'] != $usuarioId) {
                                continue;
                            }
                        ?>
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $chamado['titulo'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria'] ?></h6>
                                    <p class="card-text"><?php echo $chamado['descricao'] ?></p>

                                    <?php if ($usuarioPerfil == 'administrador') { ?>
                                        <p class="card-text"><strong>ID do chamado:</strong> <?php echo $chamado['id_chamado'] ?></p>
                                        <p class="card-text"><strong>Nome do usuário:</strong> <?php echo $chamado['nome'] ?></p>
                                        <p class="card-text"><strong>ID do usuário:</strong> <?php echo $chamado['id_usuario'] ?></p>
                                        <p class="card-text"><strong>Status do Chamado:</strong> <?php echo $chamado['status'] ?></p>
                                        <p class="card-text"><strong>Data de Criação:</strong> <?php echo $chamado['data_criacao'] ?></p>
                                    <?php } ?>

                                    <div class="button-container">
                                        <a href="../App_Help_Desk_BD/Edição_Exclusão_Chamados/edit.php?id_chamado=<?php echo $chamado['id_chamado'] ?>"><button type="button" class="btn btn-success">Editar</button></a>
                                        <a href="../App_Help_Desk_BD/Edição_Exclusão_Chamados/delete.php?acao=excluir&id_chamado=<?php echo $chamado['id_chamado'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                                    </div>


                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>