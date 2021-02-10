<?php
 
include "conn.php";

$idServico = $_POST['idServico'];

//variáveis do Formulário
  
$servico =     			$_POST["servico"];    
$data =     			$_POST["data"]; 
$valor = 			$_POST["valor"];
$cliente =     			$_POST["cliente"];




 
$sql = ("UPDATE servico SET tipoServico = '$servico', dataVencimento = '$data', valor = '$valor', cliente = '$cliente' WHERE idServico = '$idServico' ");

$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../servico.php");



?>