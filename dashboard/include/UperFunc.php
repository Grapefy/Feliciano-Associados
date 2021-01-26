<?php

session_start();
include "conn.php";

$idFuncionario = $_POST["idFuncionario"];
$idLogin = $_SESSION['idLogin'];
 
//variáveis do Formulário


$nome =     			$_POST["nome"];
$endereco = 			$_POST["endereco"];
$cpf = 					$_POST["cpf"];
$dataNascimento = 		$_POST["dataNascimento"];
$dataNascimento =  		date("Y-m-d",strtotime(str_replace('/','-',$dataNascimento))); 
$email =     			$_POST["email"]; 
$senha =                $_POST["senha"];
$telefone = 			$_POST["telefone"];


 
$sql = ("UPDATE funcionarios SET  nome = '$nome', email = '$email' , telefone = '$telefone' , endereco = '$endereco' , cpf = '$cpf' , dataNascimento = '$dataNascimento' , senha = '$senha' WHERE idFuncionario = $idFuncionario ");

$sql2 = ("UPDATE login SET indetificacao = '$email', senha = '$senha' WHERE idLogin = $idLogin ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());
$dados2 = mysqli_query($conn,$sql2) or die(mysqli_error());

header("Location:../perFunc.php"); 

?>
 
 