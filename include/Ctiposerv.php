<?php
 
include "conn.php";

 
//variáveis do Formulário
  
$servico =     			$_POST["servico"];    
$fornecedor =     			$_POST["fornecedor"]; 
$descricao = 			$_POST["descricao"];




 
$sql = ("INSERT INTO tiposervico VALUES ('0','$servico','$fornecedor', '$descricao', NOW())");


$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../tipos_servicos.php");



?>