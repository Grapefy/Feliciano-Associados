<?php

include "conn.php";

// cria a instrução SQL que vai selecionar os dados
if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){

    $query = sprintf("SELECT  * FROM relatoriocliente WHERE autor = '$nome' ORDER BY dataEnvio DESC ");
    
}

if ($_SESSION['tipoCliente'] == 3 or $_SESSION['tipoCliente'] == 4){

    $nome = $_SESSION['setor'];
    $pasta = $_POST['pastas'];

    $query = sprintf("SELECT  * FROM relatoriocliente WHERE setor = '$nome' AND nome_pasta = '$pasta' ORDER BY dataEnvio DESC ");

}
// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);


// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);


?> 