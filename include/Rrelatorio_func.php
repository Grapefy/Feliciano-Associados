<?php

include "conn.php";

$nome = $_SESSION['nome'];

if ($_SESSION['tipoCliente'] == 1) {
    $nome = $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $nome = $nome . " " . $sobrenome;
}

// cria a instrução SQL que vai selecionar os dados
if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){

    $pasta = $_POST['pastas'];
    $query = sprintf("SELECT  * FROM relatoriofunc WHERE destinatario = '$nome' AND nome_pasta = '$pasta' ORDER BY dataEnvio DESC ");
    
}

if ($_SESSION['tipoCliente'] == 3 or $_SESSION['tipoCliente'] == 4){

    $query = sprintf("SELECT  * FROM relatoriofunc WHERE autor = '$nome' ORDER BY dataEnvio DESC ");

}

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);


// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);


?> 