<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";


?>
<head>
<!DOCTYPE html>
<html lang="pt-br">
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

    <?php

    // READ
$resultado = mysqli_query($link, 'SELECT * FROM tb_usuarios where perfil =  "adm"');

    if (isset($_GET['id_usuario']) && $_GET['id_usuario'] == 'administrador') { ?>
        <script>
            alert('Usuário atribuido como Administrador')
            if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
        </script><?php
                } else if (isset($_GET['id_usuario']) && $_GET['id_usuario'] == 'usuario') { ?>
        <script>
            alert('Usuário atribuido como Usuário')
            if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
        </script><?php
    }?>

    <div class="container">
        <table class='table table-hover table-bordered'>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Autorizar</th>
            </tr>
            <?php
            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $dados['id_usuario'] . "</td>";
                echo "<td>" . $dados['nome'] . "</td>";
                echo "<td>" . $dados['email'] . "</td>";
                echo "<td>" . $dados['perfil'] . "</td>";
                echo "<td>
                <a href='autorizacaoRequerimento.php?id_usuario=" . $dados['id_usuario'] . "&autorizar=sim'><button id='gerenciarBtn'  class='btn btn-success'>S</button></a>
                <a href='autorizacaoRequerimento.php?id_usuario=" . $dados['id_usuario'] . "&autorizar=nao'><button id='gerenciarBtn'  class='btn btn-danger'>N</button></a>
            </td>";
                echo "</tr>";
            }


            
        echo "</table>";
        ?>
    </div>


</body>

</html>