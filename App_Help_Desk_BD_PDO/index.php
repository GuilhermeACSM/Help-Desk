<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
    </nav>

    <div class="container">
        <div class="row">

            <div class="card-login">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <form action="valida_login.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                            </div>

                            <?php
                            //VALIDA SE O PARÂMETRO LOGIN EXISTE E SE FOI AUTENTICADO
                            if (isset($_GET['login']) && $_GET['login'] === 'erro') { ?>
                                <div class="text-danger"> Usuário ou senha inválido(s)!</div>
                            <?php } ?>

                            <?php
                            //VALIDA SE O PARÂMETRO LOGIN EXISTE E SE FOI AUTENTICADO
                            if (isset($_GET['login']) && $_GET['login'] === 'erro2') { ?>
                                <div class="text-danger"> Insira o login!</div>
                            <?php } ?>

                                <div class="cadastro_link-div">
                                    <p><a href="cadastro.php" class="cadastro_link">Novo? Cadastre-se aqui!</a></p>
                                </div>
                            <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>
                <script>
                    alert('Cadastrado com sucesso!')
                    window.history.replaceState(null, null, window.location.pathname);
                </script>
        <?php } ?>
</body>
</html>