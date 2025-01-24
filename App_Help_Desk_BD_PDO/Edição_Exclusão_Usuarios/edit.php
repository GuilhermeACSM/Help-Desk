<?php
require_once "../validador_acesso.php";
require "../conexao.php";

try {
    // Conexão com o banco de dados
    $dsn = 'mysql:host=localhost;dbname=db_helpdesk';
    $user = 'root';
    $pass = '';
    $link = new PDO($dsn, $user, $pass);

    // Validação do ID do usuário
    if (!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])) {
        die('ID do usuário não fornecido.');
    }

    $id_usuario = (int)$_GET['id_usuario'];

    // Obter os dados do usuário
    $query = "SELECT * FROM tb_usuarios WHERE id_usuario = :id_usuario";
    $stmt = $link->prepare($query);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die('Usuário não encontrado.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitização e validação dos dados do formulário
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $perfil = trim($_POST['perfil']);

        if (empty($nome) || empty($email) || empty($perfil)) {
            die('Por favor, preencha todos os campos.');
        }

        // Atualizar os dados no banco de dados
        $updateQuery = "UPDATE tb_usuarios 
                        SET nome = :nome, email = :email, perfil = :perfil 
                        WHERE id_usuario = :id_usuario";

        $updateStmt = $link->prepare($updateQuery);
        $updateStmt->bindParam(':nome', $nome);
        $updateStmt->bindParam(':email', $email);
        $updateStmt->bindParam(':perfil', $perfil);
        $updateStmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        // Executa a query
        $resultado = $updateStmt->execute();

        // Redireciona com base no resultado
        if ($resultado) {
            header('location:../usuarios.php?acao=editado');
            exit();
        } else {
            header('location:../usuarios.php?acao=falha');
            exit();
        }
    }
} catch (PDOException $e) {
    // Exibe uma mensagem de erro
    echo 'ERRO ' . $e->getCode() . ' falha na conexão: ' . $e->getMessage();
    exit();
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
                        Editando usuário
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input name="id_usuario" type="hidden" value="<?php echo $usuario['id_usuario']; ?>">

                            <div class="form-group">
                                <label>ID: </label>
                                <input type="text" class="form-control" value="<?php echo $usuario['id_usuario']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Nome: </label>
                                <input name="nome" type="text" class="form-control" value="<?php echo $usuario['nome']; ?>" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>E-mail:</label>
                                <input name="email" type="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Perfil</label>
                                <select name="perfil" class="form-control" required>
                                    <option value="" disabled>Selecione</option>
                                    <option value="usuario" <?php echo $usuario['perfil'] === 'usuario' ? 'selected' : ''; ?>>Usuário</option>
                                    <option value="administrador" <?php echo $usuario['perfil'] === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
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
</body>

</html>
