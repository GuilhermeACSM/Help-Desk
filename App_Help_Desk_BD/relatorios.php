<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";

$chamadosAbertos = mysqli_query($link, "SELECT COUNT(*) AS total FROM TB_CHAMADOS WHERE STATUS = 'aberto'");
$rowAb = mysqli_fetch_assoc($chamadosAbertos);
$totalAbertos = $rowAb['total'];

$chamadosAndamento = mysqli_query($link, "SELECT COUNT(*) AS total FROM TB_CHAMADOS WHERE STATUS = 'andamento'");
$rowAn = mysqli_fetch_assoc($chamadosAndamento);
$totalAndamento = $rowAn['total'];

$chamadosFinalizado = mysqli_query($link, "SELECT COUNT(*) AS total FROM TB_CHAMADOS WHERE STATUS = 'finalizado'");
$rowFi = mysqli_fetch_assoc($chamadosFinalizado);
$totalFinalizado = $rowFi['total'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="card-home">
                <div class="card">
                    <div class="card-header">
                        Relatórios
                    </div>

                    <a id="link" href="Relatorios/abertos.php">
                        <div class="container-card-gui">
                            <div class="card-gui card-header">
                                <div class="card-gui-img">
                                    <img src="./img/abertos.png" width="70" height="70">
                                </div>
                                <div class="card-gui-p">
                                    <p class='text-danger'>Abertos(<?php echo $totalAbertos;?>)</p>
                                </div>
                            </div>
                    </a>
                    <a id="link" href="Relatorios/andamento.php">
                        <div class="card-gui card-header">
                            <div class="card-gui-img">
                                <img src="./img/andamento.png" width="70" height="70">
                            </div>
                            <div class="card-gui-p">
                                <p id="p-andamento">Andamentos(<?php echo $totalAndamento;?>)</p>
                            </div>
                        </div>
                    </a>

                    <a id="link" href="Relatorios/finalizado.php">
                        <div class="card-gui card-header">
                            <div class="card-gui-img">
                                <img src="./img/finalizados.png" width="70" height="70">
                            </div>
                            <div class="card-gui-p">
                                <p id="p-finalizado">Finalizados(<?php echo $totalFinalizado;?>)</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>