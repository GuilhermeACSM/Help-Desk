<?php
require_once "../validador_acesso.php";
require_once "../validador_acessoADM.php";
require "../conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="../home.php">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <!-- Botão de sair posicionado no canto direito -->
        <div class="ml-auto">
            <a href="../relatorios.php">
                <button class="btn-voltar">
                    <i class="fas fa-sign-out-alt"></i> Voltar
                </button>
            </a>
        </div>
    </nav>

    <?php
    try {
        // Consulta utilizando PDO
        $stmt = $link->prepare("
            SELECT TB_CHAMADOS.*, TB_USUARIOS.nome 
            FROM TB_CHAMADOS 
            INNER JOIN TB_USUARIOS ON TB_CHAMADOS.id_usuario = TB_USUARIOS.id_usuario 
            WHERE status = 'finalizado'
        ");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro na consulta ao banco de dados: " . $e->getMessage());
    }
    ?>

    <div class="container">
        <table class='table table-hover table-bordered'>
            <tr>
                <th>Chamado</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Usuário</th>
            </tr>
            <?php
            foreach ($resultados as $dados) {
                echo "<tr>";
                echo "<td>" . ($dados['id_chamado']) . "</td>";
                echo "<td>" . ($dados['titulo']) . "</td>";
                echo "<td>" . ($dados['categoria']) . "</td>";
                echo "<td>" . ($dados['descricao']) . "</td>";
                echo "<td>" . ($dados['nome']) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
