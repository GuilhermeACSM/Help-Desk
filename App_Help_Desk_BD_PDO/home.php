<?php
require_once "validador_acesso.php";
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <!-- Botão de sair posicionado no canto direito -->
        <div class="ml-auto">
            <a href="logout.php">
                <button class="btn-sair">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </button>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="card-home">
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>
                    <a id="link" href="abrir_chamado.php">
                        <div class="container-card-gui">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/formulario_abrir_chamado.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p>Abrir Chamado</p>
                                </div>
                            </div>
                    </a>
                    <a id="link" href="./consultar_chamado.php">
                        <div class="card-gui card-header">
                            <div class="card-gui-img">
                                <img src="./img/formulario_consultar_chamado.png" width="70" height="70">
                            </div>
                            <div class="card-gui-p">
                                <p>Consultar Chamado</p>
                            </div>
                        </div>
                    </a>
                    <?php
                    $usuarioPerfil = $_SESSION['perfil'];

                    if ($usuarioPerfil == 'administrador') { ?>
                        <a id="link" href="./editar_arquivo.php">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/editar-arquivo.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p>Editar Chamado</p>
                                </div>
                            </div>
                        </a>
                        <a id="link" href="./autorizacao.php">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/autorizacao.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p>Autorizar</p>
                                </div>
                            </div>
                        </a>
                        <a id="link" href="./usuarios.php">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/usuarios.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p>Usuários</p>
                                </div>
                            </div>
                        </a>
                        <a id="link" href="./relatorios.php">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/relatorio.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p>Relatórios</p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>