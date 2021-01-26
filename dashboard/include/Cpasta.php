<?php
session_start();
include "conn.php";

if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){
    $id_responsavel = $_SESSION['id'];
} else if ($_SESSION['tipoCliente'] == 3){
    $id_responsavel = $_SESSION['idFunc'];
} else if ($_SESSION['tipoCliente'] == 4){
    $id_responsavel = $_SESSION['idAdministrador'];
}

$nome_pasta = $_POST['nome_pasta'];
$tipo = $_SESSION['tipoCliente'];



// cria a instrução SQL que vai selecionar os dados
$query = sprintf("INSERT INTO pastas VALUES ('0','$nome_pasta','$id_responsavel','$tipo')");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());


header("Location: ../index_relatorio.php");


?>