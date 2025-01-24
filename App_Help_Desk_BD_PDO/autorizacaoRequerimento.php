<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";

if ($_GET['autorizar'] == 'sim') {
    $resultado = mysqli_query($link, "UPDATE tb_usuarios SET perfil = 'administrador' WHERE id_usuario = {$_GET['id_usuario']}");
    header('location: autorizacao.php?id_usuario=administrador');
} else if($_GET['autorizar'] == 'nao'){
    $resultado = mysqli_query($link, "UPDATE tb_usuarios SET perfil = 'usuario' WHERE id_usuario = {$_GET['id_usuario']}");
    header('location: autorizacao.php?id_usuario=usuario');
    }


?>