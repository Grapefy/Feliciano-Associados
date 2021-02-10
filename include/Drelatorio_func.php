<?php

include "conn.php";

$idRelatorioFunc = $_POST['idRelatoriofunc'];
//$assunto = $_POST['assunto'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM relatoriofunc WHERE idRelatoriofunc = $idRelatorioFunc");
//$query2 = sprintf("DELETE FROM arqFunc WHERE relatorio = '$assunto'");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
//$dados2 = mysqli_query($conn,$query2) or die(mysqli_error());



header("Location:../relatorios_func.php");



?>