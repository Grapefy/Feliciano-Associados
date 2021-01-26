<?php

session_start();

include "conn.php";

$del = $_POST['del'];
$nome_pasta = $_POST['pastas'];

if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){

    $query = ("UPDATE relatoriofunc SET nome_pasta = '$del' WHERE nome_pasta = '$nome_pasta' ");

} 

if ($_SESSION['tipoCliente'] == 3 or $_SESSION['tipoCliente'] == 4){

    $query = ("UPDATE relatoriocliente SET nome_pasta = '$del' WHERE nome_pasta = '$nome_pasta' ");

}

$sql = ("DELETE FROM pastas WHERE nome_pasta = '$nome_pasta' ");

$result = mysqli_query($conn,$query);

$result2 = mysqli_query($conn,$sql);

mysqli_close($conn);

header("Location:../index_relatorio.php");

?>
