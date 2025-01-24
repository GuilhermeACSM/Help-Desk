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
                        Cadastre-se
                    </div>
                    <div class="card-body" >
                        <form action="registro_cadastro.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome Completo" name="nome" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                            </div>
                            <div class="form-group">
                                <select name="select" id="select" class="form-control" required>
                                    <option value="" disabled selected>Selecionar Item</option>
                                    <option value="adm">Administrador</option>
                                    <option value="tecnico">Técnico</option>
                                    <option value="usuario">Usuario</option>
                                </select>
                            </div>

                            <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'erro') { ?>
                                <div style="color: red;">
                                    <?php echo('E-mail já existente!')?>
                                </div>
                            <?php } ?>

                            <button class="btn btn-lg btn-info btn-block" type="save">Salvar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>


</body>

</html>