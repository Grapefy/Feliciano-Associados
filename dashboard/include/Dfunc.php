<?php

include "conn.php";

$idFuncionario = $_POST['idFuncionario'];

$sql = sprintf("SELECT email FROM funcionarios WHERE idFuncionario = $idFuncionario ");

$result = mysqli_query($conn,$sql);

$linha = mysqli_fetch_assoc($result);
$del = $linha['email'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM funcionarios WHERE idFuncionario = $idFuncionario");
$query2 = sprintf("DELETE FROM login WHERE indetificacao = '$del' ");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
$dados2 = mysqli_query($conn,$query2);


header("Location:../funcionarios.php");



?>