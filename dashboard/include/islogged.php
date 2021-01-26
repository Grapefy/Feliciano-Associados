<?php

include "conn.php";

session_start();

if (!isset($_SESSION['tipoCliente'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    session_start();
    $_SESSION['msg'] = '<div class="ls-alert-danger ls-dismissable">
    <span data-ls-module="dismiss" class="ls-dismiss" >&times;</span>
    Você precisa estar logado.
    </div>';
    header("Location: index.php"); exit;
}


?>