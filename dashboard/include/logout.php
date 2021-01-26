<?php

session_start();

if(isset($_SESSION['tipoCliente'])){
    session_destroy();
    session_start();
    $_SESSION['msg'] = '<div class="ls-alert-success ls-dismissable">
    <span data-ls-module="dismiss" class="ls-dismiss" >&times;</span>
                Logout realizado com sucesso.
    </div>';
    header('Location: ../index.php');
}