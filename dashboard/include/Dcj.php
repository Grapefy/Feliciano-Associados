<?php

include "conn.php";

$id = $_POST['id'];

$sql = sprintf("SELECT email FROM clientejuridica WHERE id = $id ");

$result = mysqli_query($conn,$sql);

$linha = mysqli_fetch_assoc($result);
$del = $linha['email'];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM clientejuridica WHERE id = $id");
$query2 = sprintf("DELETE FROM login WHERE indetificacao = '$del' ");

// executa a query
$dados = mysqli_query($conn,$query);
$dados2 = mysqli_query($conn,$query2);
if(!$dados){
    die("Não foi possível deletar o usuário");
}


header("Location:../clientejuridico.php");



?>