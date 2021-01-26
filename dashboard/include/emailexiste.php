<?php

include "conn.php";

$querylog = sprintf("SELECT * FROM login");

$dadoslog = mysqli_query($conn,$querylog);

// transforma os dados em um array
$linhalog = mysqli_fetch_assoc($dadoslog);


// calcula quantos dados retornaram
$total_log = mysqli_num_rows($dadoslog);

$cont = 0;

$z = 0;

if ($total_log > 0){
    do {
        $i = $linhalog['indetificacao'];
        if ($email == $i){
            session_start();
            $_SESSION['msg'] = '<div class="ls-alert-danger ls-dismissable ls-xs-space">
            <span data-ls-module="dismiss" class="ls-dismiss" >&times;</span>
            <center> Esse Email já foi cadastrado </center>
            </div>';
            $z=1;
            //header("Location:../cadastro_clientejuridico.php");
            
        }
    } while($linhalog = mysqli_fetch_assoc($dadoslog));
}


?>