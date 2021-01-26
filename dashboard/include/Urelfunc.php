<?php
 
include "conn.php";

$idRelatoriofunc = $_POST['idRelatoriofunc'];

//variáveis do Formulário
  
$pasta =     			$_POST["pasta"];




 
$sql = ("UPDATE relatoriofunc SET nome_pasta = '$pasta' WHERE idRelatoriofunc = '$idRelatoriofunc' ");

$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../index_relatorio.php");



?>