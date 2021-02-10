<?php

include "conn.php";

$id = $_POST["id"];
    
    $razaoSocial = $_POST['razaoSocial'];
    $cnpj = $_POST['cnpj'];
    $telefone= $_POST['telefone'];
    $end = $_POST['endereco'];
    //$password = crypt($password, $hashF_and_text);
    $query = ("UPDATE clientejuridica SET razaoSocial = '$razaoSocial',endereco = '$end',cnpj = '$cnpj',telefone = '$telefone' WHERE id = '$id' ");
    //echo $query;
    $result = mysqli_query($conn,$query);
    if(!$result){
            die("Não foi possível editar o usuário");
    }		

mysqli_close($conn);

header("Location:../clientejuridico.php");



?>