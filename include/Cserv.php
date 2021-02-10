<?php
 
include "conn.php";

 
//variáveis do Formulário

$cliente =     			$_POST["cliente"];
$servico =     			$_POST["servico"];    
$data =     			$_POST["data"];
$data =  			    date("Y-m-d",strtotime(str_replace('/','-',$data)));
$valor = 			    $_POST["valor"];




 
$sql = ("INSERT INTO servico VALUES ('0','$servico','$data', '$valor','$cliente')");


$dados = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location:../servico.php");



?>