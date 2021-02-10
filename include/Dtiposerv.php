<?php

include "conn.php";

$idServicos = $_POST['idServicos'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM tiposervico WHERE idServicos = $idServicos");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());


header("Location:../tipos_servicos.php");



?>