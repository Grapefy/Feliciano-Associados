<?php

include "conn.php";

$idServico = $_POST['idServico'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM servico WHERE idServico = $idServico");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());


header("Location:../servico.php");



?>