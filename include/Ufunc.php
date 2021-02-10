<?php

include "conn.php";

$idFuncionario = $_POST["idFuncionario"];
 
//variáveis do Formulário
  
$nome =     			$_POST["nome"];
$telefone = 			$_POST["telefone"];
$endereco = 			$_POST["endereco"];
$cpf = 					$_POST["cpf"];
$dataNascimento = 		$_POST["dataNascimento"];
$dataNascimento =  		date("Y-m-d",strtotime(str_replace('/','-',$dataNascimento)));         
$setor = 				$_POST["setor"];

 
$sql = ("UPDATE funcionarios SET  nome = '$nome'  , telefone = '$telefone' , endereco = '$endereco' , cpf = '$cpf' , dataNascimento = '$dataNascimento' , setor = '$setor' WHERE idFuncionario = $idFuncionario ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());

header("Location:../funcionarios.php"); 

?>
 
 