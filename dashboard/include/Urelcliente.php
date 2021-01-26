<?php
 
include "conn.php";

$idRelatorioCliente = $_POST['idRelatorioCliente'];

//variáveis do Formulário
  
$pasta =     			$_POST["pasta"];




 
$sql = ("UPDATE relatoriocliente SET nome_pasta = '$pasta' WHERE idRelatorioCliente = '$idRelatorioCliente' ");

$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../index_relatorio.php");



?>