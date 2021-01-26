<?php
 
include "conn.php";

$idServicos = $_POST['idServicos'];

//variáveis do Formulário
  
$servico =     			$_POST["servico"];    
$fornecedor =     			$_POST["fornecedor"]; 
$descricao = 			$_POST["descricao"];




 
$sql = ("UPDATE tiposervico SET servico = '$servico', fornecedor = '$fornecedor', descricao = '$descricao' WHERE idServicos = '$idServicos' ");


$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../tipos_servicos.php");



?>