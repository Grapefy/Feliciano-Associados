<?php
 
include "conn.php";

 
//variáveis do Formulário
  
$nome =     			$_POST["nome"];    
$email =     			$_POST["email"]; 
$telefone = 			$_POST["telefone"];
$endereco = 			$_POST["endereco"];
$cpf = 					$_POST["cpf"];
$dataNascimento = 		$_POST["dataNascimento"];
$dataNascimento =  		date("Y-m-d",strtotime(str_replace('/','-',$dataNascimento)));         
$senha = 				"func123";
$setor = 				$_POST["setor"];



include "emailexiste.php";


if ($z != 1){
 
    $sql = ("INSERT INTO funcionarios VALUES ('0','$nome','$email', '$telefone','$endereco','$cpf','$dataNascimento','$senha','$setor')");
    $sql2 = ("INSERT INTO login VALUES ('0','$email','$senha', '3')");
    
    


    $dados = mysqli_query($conn, $sql);
    $dados2 = mysqli_query($conn, $sql2);


    mysqli_close($conn);
    //include "../../enviadoremail/emailaf.php";

    header("Location:../funcionarios.php");

} else {
    header("Location:../cadastro_funcionario.php");
}



?>