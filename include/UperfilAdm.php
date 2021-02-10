<?php

session_start();
include "conn.php";

$idAdministrador = $_POST["idAdministrador"];
$idLogin = $_SESSION['idLogin'];
 
//variáveis do Formulário
  
$nomeEmpresa =     		$_POST["nomeEmpresa"];    
$email =     			$_POST["email"]; 
$senha =                $_POST["senha"];
$telefone = 			$_POST["telefone"];


 
$sql = ("UPDATE administrador SET  nomeEmpresa = '$nomeEmpresa' , email = '$email' ,senha = '$senha', telefone = '$telefone' WHERE idAdministrador = $idAdministrador ");

$sql2 = ("UPDATE login SET indetificacao = '$email', senha = '$senha' WHERE idLogin = $idLogin ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());
$dados2 = mysqli_query($conn,$sql2) or die(mysqli_error());

header("Location:../perAdm.php"); 

?>
 
 