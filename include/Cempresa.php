<?php
 
include "conn.php";

 
//variáveis do Formulário
$nomeEmpresa =     			$_POST["nomeEmpresa"];    
$responsavel =     			$_POST["responsavel"]; 
 
$sql = ("INSERT INTO empresa VALUES ('0','$nomeEmpresa','$responsavel')");

$dados = mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location:../empresas.php");



?>