<?php

include "conn.php";

if($_SESSION['tipoCliente'] == 1){
    $nome = $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $ident = $nome . " " . $sobrenome;
} else if ($_SESSION['tipoCliente'] == 2){
    $ident = $_SESSION['nome'];
}

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM servico WHERE cliente = '$ident' ");

// executa a query
$dados = mysqli_query($conn,$query);
if(!$dados){
    die("Não foi possível criar o usuário");
}


// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);


// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);


?> 