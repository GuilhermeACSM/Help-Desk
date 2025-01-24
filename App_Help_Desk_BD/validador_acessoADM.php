<?php

if(!isset($_SESSION['perfil']) || ($_SESSION['perfil']) != 'administrador') {
    header('location: home.php?acessoNegado=perfilUsuario');
}

?>