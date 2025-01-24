<?php
require_once "validador_acesso.php";
require "conexao.php";

$chamados = mysqli_query($link, "SELECT TB_CHAMADOS.*, TB_USUARIOS.nome 
                                  FROM TB_CHAMADOS 
                                  INNER JOIN TB_USUARIOS ON TB_CHAMADOS.id_usuario = TB_USUARIOS.id_usuario");
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
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
                        Consulta de chamado
                    </div>

                    <div class="card-body" id="card-body-gui">

                        <?php
                        $usuarioId = $_SESSION['id_usuario'];
                        $usuarioPerfil = $_SESSION['perfil'];

                        foreach ($chamados as $chamado) {
                            if ($usuarioPerfil != 'administrador' && $chamado['id_usuario'] != $usuarioId) {
                                continue;
                            }
                        ?>
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $chamado['titulo'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria'] ?></h6>
                                    <button popovertarget='my-popover' class="descricao-link">
                                        Descrição
                                    </button>
                                    <p class="card-text" id='my-popover' popover><?php echo $chamado['descricao'] ?></p>

                                    <p class="card-text"><strong>Status do Chamado:</strong> <?php echo $chamado['status'] ?></p>

                                    <?php if ($usuarioPerfil == 'administrador') { ?>
                                        <p class="card-text"><strong>Nome do usuário:</strong> <?php echo $chamado['nome'] ?></p>
                                        <p class="card-text"><strong>ID do usuário:</strong> <?php echo $chamado['id_usuario'] ?></p>
                                    <?php } ?>
                                    <p class="card-text"><strong>Data de Criação:</strong> <?php echo $chamado['data_criacao'] ?></p>
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