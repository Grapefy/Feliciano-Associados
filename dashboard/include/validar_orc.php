<?php 
 
include "conn.php";

$idOrcamento = $_POST['idOrcamento'];
 
$sql = ("UPDATE orcamento SET status = 'ativo' WHERE idOrcamento = '$idOrcamento' ");

$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../orcamento.php");



?>