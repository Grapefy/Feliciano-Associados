<?php

include "conn.php";
$idSetor = $_POST["idSetor"];
 
//variáveis do Formulário
$setor =     			$_POST["setor"];    
$responsavelSetor =     $_POST["responsavelSetor"]; 
$empresa =              $_POST["empresa"];
 
 
$sql = ("UPDATE setor SET  setor = '$setor' , responsavelSetor = '$responsavelSetor', empresa = '$empresa' WHERE idSetor = $idSetor ");

$dados = mysqli_query($conn,$sql) or die(mysqli_error());

header("Location:../setor.php"); 

?>
 