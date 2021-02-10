<?php
 
include "conn.php";

 
//variáveis do Formulário
  
$nomeEmpresa =     		$_POST["empresa"];    
$email =     			$_POST["email"]; 
$senha =                "adm123";
$telefone = 			$_POST["telefone"]; 			
$setor = 			    $_POST["setor"]; 

include "emailexiste.php";


if ($z != 1){

    $sql = ("INSERT INTO administrador VALUES ('0','$nomeEmpresa','$setor', '$email','$senha', '$telefone')");
    $sql2 = ("INSERT INTO login VALUES ('0','$email','$senha', '4')");
    
    $nome = $nomeEmpresa;


    $dados = mysqli_query($conn, $sql);
    $dados2 = mysqli_query($conn, $sql2);


    mysqli_close($conn);
    
    include "../../enviadoremail/emailaf.php";

    header("Location:../adm.php");

} else {
    header("Location:../cadastro_adm.php");
}



?>