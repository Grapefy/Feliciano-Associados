<?php

session_start();
include "conn.php";

$id = $_POST["id"];
$idLogin = $_SESSION['idLogin'];

$razaoSocial = $_POST['razaoSocial'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone= $_POST['telefone'];
$end = $_POST['endereco'];
//$password = crypt($password, $hashF_and_text);



$sql = ("UPDATE clientejuridica SET razaoSocial = '$razaoSocial', email = '$email', senha = '$senha', endereco = '$end',cnpj = '$cnpj',telefone = '$telefone' WHERE id = '$id' ");

$sql2 = ("UPDATE login SET indetificacao = '$email', senha = '$senha' WHERE idLogin = $idLogin ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());
$dados2 = mysqli_query($conn,$sql2) or die(mysqli_error());

header("Location:../perCj.php"); 


?>