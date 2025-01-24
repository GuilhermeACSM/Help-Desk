<?php
session_start();

if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'sim') {
    header('location: index.php?login=erro2');

    echo '<div class="text-danger"> Usuário ou senha inválido(s)!</div>';
}

// IF PARA MOSTAR O ID DO USUARIO LOGADO
/*
if (isset($_SESSION['id_usuario'])) {
    echo "ID do usuário logado: " . $_SESSION['id_usuario'];
} else {
    echo "Usuário não está autenticado.";
}
*/

?>