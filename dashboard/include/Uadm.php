<?php

include "conn.php";

$idAdministrador = $_POST["idAdministrador"];
 
//variáveis do Formulário
  
$nomeEmpresa =     		$_POST["nomeEmpresa"]; 
$setor =     		$_POST["setor"]; 
$telefone = 			$_POST["telefone"];


 
$sql = ("UPDATE administrador SET  nomeEmpresa = '$nomeEmpresa', setor = '$setor' , telefone = '$telefone' WHERE idAdministrador = $idAdministrador ");

//$sql2 = ("UPDATE login SET username = '$email' WHERE idAdministrador = $idAdministrador ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());
//$dados2 = mysqli_query($conn,$sql2) or die(mysqli_error());

header("Location:../adm.php"); 

?>
 
 