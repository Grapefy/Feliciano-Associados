<?php

include "conn.php";

$idRelatorioCliente = $_POST['idRelatorioCliente'];
//$assunto = $_POST['assunto'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM relatoriocliente WHERE idRelatorioCliente = $idRelatorioCliente");
//$query2 = sprintf("DELETE FROM arqcliente WHERE relatorio = '$assunto'");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
//$dados2 = mysqli_query($conn,$query2) or die(mysqli_error());



header("Location:../relatorios_clientes.php");



?>