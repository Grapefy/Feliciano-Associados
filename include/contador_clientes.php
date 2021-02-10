<?php

include "conn.php";

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM clientefisica");
$query2 = sprintf("SELECT * FROM clientejuridica");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
$dados2 = mysqli_query($conn,$query2) or die(mysqli_error());

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
$total2 = mysqli_num_rows($dados2);
$total = $total + $total2;

?>