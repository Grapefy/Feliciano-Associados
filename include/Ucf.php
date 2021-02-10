<?php
session_start();
include "conn.php";

$id = $_POST["id"];
$id2 = $_SESSION['idLogin'];
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $dataNasc = $_POST["dataNasc"];
    $telefone= $_POST["telefone"];
    $sexo = $_POST["sexo"];
    $end = $_POST["endereco"];
    //$password = crypt($password, $hashF_and_text);
    $query = ("UPDATE clientefisica SET nome = '$nome', sobrenome = '$sobrenome', dataNascimento = '$dataNasc', sexo = '$sexo',endereco = '$end',cpf = '$cpf',telefone = '$telefone' WHERE id = '$id' ");

    //echo $query;
    $result = mysqli_query($conn,$query);
    if(!$result){
            die("Não foi possível editar o usuário");
    }		

mysqli_close($conn);

header("Location:../clientefisico.php");



?>