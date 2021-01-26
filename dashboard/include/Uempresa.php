<?php

include "conn.php";
$idEmpresa = $_POST["idEmpresa"];
 
//variáveis do Formulário
  
$nome =     			    $_POST["nomeEmpresa"];    
$responsavel =     			$_POST["responsavel"];
 
$sql = ("UPDATE empresa SET  nome = '$nome' , responsavel = '$responsavel' WHERE idEmpresa = $idEmpresa ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());

header("Location:../empresas.php"); 

?>
 