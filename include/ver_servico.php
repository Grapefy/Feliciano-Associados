<?php

include "conn.php";

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM servico");

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