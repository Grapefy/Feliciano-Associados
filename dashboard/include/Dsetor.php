<?php

include "conn.php";
$idSetor = $_POST['idsetor'];


// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM setor WHERE idSetor = $idSetor");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());

header("Location:../setor.php");

?>