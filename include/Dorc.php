<?php

include "conn.php";

$idOrcamento = $_POST['idOrcamento'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM orcamento WHERE idOrcamento = $idOrcamento");

// executa a query
$dados = mysqli_query($conn,$query);
if(!$dados){
    die("Não foi possível deletar o orçamento");
}


header("Location:../orcamento.php");



?>