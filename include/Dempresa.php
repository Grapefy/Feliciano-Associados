<?php

include "conn.php";
$idEmpresa = $_POST['idEmpresa'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM empresa WHERE idEmpresa = $idEmpresa");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());

header("Location:../empresas.php");

?>