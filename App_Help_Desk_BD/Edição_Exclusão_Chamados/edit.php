<?php
require_once "../validador_acesso.php";
require "../conexao.php";

$query = "SELECT * FROM TB_CHAMADOS where id_chamado = $_GET[id_chamado]";

$resultado = mysqli_query($link, $query);
$chamado = mysqli_fetch_assoc($resultado);


if($_POST) {
    $titulo = trim($_POST['titulo']);
    $categoria = trim($_POST['categoria']);
    $descricao = trim($_POST['descricao']);
    $status = trim($_POST['status']);

    mysqli_query($link, "UPDATE TB_CHAMADOS SET titulo='$titulo', categoria='$categoria', descricao='$descricao', status='$status' where id_chamado = $_GET[id_chamado]" );

    header('location:../editar_arquivo.php?acao=editado');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>App Help Desk</title>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="../home.php">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo App Help Desk">
            App Help Desk
        </a>

        <!-- Botão de sair posicionado no canto direito -->
        <div class="ml-auto">
            <a href="../editar_arquivo.php">
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
                        Editando chamado
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="titulo"  value="<?php echo trim($chamado['titulo']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select class="form-control" name="categoria" >
                                            <option value="<?php echo trim($chamado['categoria']);?>"><?php echo trim($chamado['categoria']);?></option>
                                            <option>Criação Usuário</option>
                                            <option>Impressora</option>
                                            <option>Hardware</option>
                                            <option>Software</option>
                                            <option>Rede</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="<?php echo trim($chamado['status']);?>"  selected><?php echo trim($chamado['status']);?></option>
                                            <option>Aberto</option>
                                            <option>Andamento</option>
                                            <option>Finalizado</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" rows="3" name="descricao" required value="<?php echo trim($chamado['descricao']); ?>"><?php echo trim($chamado['descricao']); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Data de Criação</label>
                                        <input class="form-control" rows="3" name="data" required value="<?php echo trim($chamado['data_criacao']);?>" disabled ></input>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <button class="btn btn-lg btn-info btn-block" type="submit">Editar</button>
                                        </div>
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