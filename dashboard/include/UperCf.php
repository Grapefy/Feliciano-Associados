<?php

session_start();
include "conn.php";

$id = $_POST["id"];
$idLogin = $_SESSION['idLogin'];

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$dataNasc = $_POST["dataNasc"];
$dataNasc =  date("Y-m-d",strtotime(str_replace('/','-',$dataNasc)));
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone= $_POST["telefone"];
$sexo = $_POST["sexo"];
$end = $_POST["endereco"];
//$password = crypt($password, $hashF_and_text);


$sql = ("UPDATE clientefisica SET nome = '$nome', sobrenome = '$sobrenome', dataNascimento = '$dataNasc', email = '$email', senha = '$senha', sexo = '$sexo',endereco = '$end',cpf = '$cpf',telefone = '$telefone' WHERE id = '$id' ");

$sql2 = ("UPDATE login SET indetificacao = '$email', senha = '$senha' WHERE idLogin = $idLogin ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());
$dados2 = mysqli_query($conn,$sql2) or die(mysqli_error());

header("Location:../perCf.php"); 


?>