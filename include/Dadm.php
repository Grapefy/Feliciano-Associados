<?php

include "conn.php";

$idAdministrador = $_POST['idAdministrador'];

$sql = sprintf("SELECT email FROM administrador WHERE idAdministrador = $idAdministrador ");

$result = mysqli_query($conn,$sql);

$linha = mysqli_fetch_assoc($result);
$del = $linha['email'];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE FROM administrador WHERE idAdministrador = $idAdministrador");
$query2 = sprintf("DELETE FROM login WHERE indetificacao = '$del' ");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
$dados2 = mysqli_query($conn,$query2);

header("Location:../adm.php");



?>