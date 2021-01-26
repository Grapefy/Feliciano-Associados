<?php
 
include "conn.php";

 
//variáveis do Formulário
$setor =     			$_POST["setor"];    
$responsavelSetor =     $_POST["responsavelSetor"]; 
$empresa =              $_POST["empresa"];
 
$sql = ("INSERT INTO setor VALUES ('0','$setor','$responsavelSetor','$empresa')");

$dados = mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location:../setor.php");



?>