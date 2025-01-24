<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8" />
<title>App Help Desk</title>

<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
<?php if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') { ?>
        <div>
            <script>
                alert('Usuario deletado com sucesso!')
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
                alert('Usuario editado com sucesso!')
                if (history.replaceState) {
                    const url = window.location.href.split('?')[0];
                    history.replaceState(null, null, url);
                }
            </script>
        </div>
    <?php } ?>
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
    $resultado = mysqli_query($link, 'SELECT * FROM tb_usuarios');
    ?>

    <div class="container">
        <table class='table table-hover table-bordered'>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Editar</th>
            </tr>
            <?php
            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $dados['id_usuario'] . "</td>";
                echo "<td>" . $dados['nome'] . "</td>";
                echo "<td>" . $dados['email'] . "</td>";
                echo "<td>" . $dados['perfil'] . "</td>";
                echo "<td>
                <a href='Edição_Exclusão_Usuarios/edit.php?id_usuario=" . $dados['id_usuario'] . "&acao=editar'><button id='gerenciarBtn'  class='btn btn-success'>Editar</button></a>
                <a href='Edição_Exclusão_Usuarios/delete.php?id_usuario=" . $dados['id_usuario'] . "&acao=excluir'><button id='gerenciarBtn'  class='btn btn-danger'>Deletar</button></a>
            </td>";
                echo "</tr>";
            }


            
        echo "</table>";
        ?>
    </div>


</body>

</html>