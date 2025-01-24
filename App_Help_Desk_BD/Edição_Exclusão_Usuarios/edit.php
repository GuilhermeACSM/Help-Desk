<?php
require_once "../validador_acesso.php";
require "../validador_acessoADM.php";
require "../conexao.php";

$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = $_GET[id_usuario]";
$res = $link->query($sql);
$qtd = $res->num_rows;
$row = $res->fetch_object();


if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];
    $id_usuario = $_POST['id_usuario'];

    mysqli_query($link,  "UPDATE tb_usuarios SET nome = '$nome', email = '$email', perfil = '$perfil' WHERE id_usuario = $id_usuario");

    header('location:../usuarios.php?acao=editado');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <a href="../usuarios.php">
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
                        Editando usario
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <form method="POST" action="">
                                        <input name="id_usuario" type="hidden" class="form-control"
                                            value="<?php print $row->id_usuario; ?>" required>

                                        <div class="form-group">
                                            <label>ID: </label>
                                            <input name="id" type="text" class="form-control"
                                                value="<?php print $row->id_usuario; ?>" required disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Nome: </label>
                                            <input name="nome" type="text" class="form-control"
                                                value="<?php print $row->nome; ?>" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail:</label>
                                            <input name="email" type="text" class="form-control"
                                                value="<?php print $row->email; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Perfil</label>
                                            <select name="perfil" class="form-control" required>
                                                <option value="" disabled selected><?php  print $row->perfil; ?></option>
                                                <option value="usuario">Usuario</option>
                                                <option value="administrador">Administrador</option>
                                            </select>
                                        </div>


                                        <div class="row mt-5">
                                            <div class="col-6">
                                                <a class="btn btn-lg btn-warning btn-block" href="../usuarios.php">Cancelar</a>
                                            </div>

                                            <div class="col-6">
                                                <button class="btn btn-lg btn-info btn-block" type="submit">Salvar</button>
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