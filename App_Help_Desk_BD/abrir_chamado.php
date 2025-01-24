<?php
require 'conexao.php';
require_once "validador_acesso.php";
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="IMG/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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

            <div class="card-abrir-chamado">
                <div class="card">
                    <div class="card-header">
                        Abertura de chamado
                        <?php
                        if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
                            <div style="color: green;">
                                <script>
                                    alert('Chamado cadastrado com sucesso!')
                                    if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
                                </script>
                            </div>
                        <?php } else if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'falha') { ?>
                            <div style="color: red;">
                                <script>
                                    alert('Erro de inserção de chamado no banco, contate o administrador!')
                                    if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
                                </script>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="registra_chamados.php">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" placeholder="Título" name="titulo" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select class="form-control" name="categoria" required>
                                            <option>Criação Usuário</option>
                                            <option>Impressora</option>
                                            <option>Hardware</option>
                                            <option>Software</option>
                                            <option>Rede</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" rows="3" name="descricao" required maxlength="50"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-lg btn-info btn-block" type="submit" id="btn-abrir">Abrir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>