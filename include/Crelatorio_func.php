<?php
session_start();
include "conn.php";
require_once("zipar.class.php");

 
//variáveis do Formulário
  
$autor =     			$_SESSION['nome'];    
$destinatario =     	$_POST["id"]; 
$assunto = 				$_POST["assunto"];
$conteudo = 			$_POST["conteudo"];
$nome_pasta = 			$_POST["id_pasta"];

$num = substr($destinatario,0,-1);
$letra = substr($destinatario,-1);

if ($letra == "F"){

	$sql_nome_cliente = sprintf("SELECT * FROM clientefisica WHERE id = $num ");

	$resultado = mysqli_query($conn, $sql_nome_cliente);

	$linha = mysqli_fetch_assoc($resultado);

	$destinatario = $linha['nome'] . " " . $linha['sobrenome'];

} else if ($letra == "J"){

	$sql_nome_cliente = sprintf("SELECT * FROM clientejuridica WHERE id = $num ");

	$resultado = mysqli_query($conn, $sql_nome_cliente);

	$linha = mysqli_fetch_assoc($resultado);

	$destinatario = $linha['razaoSocial'];
	
}

//$arquivos_permitidos = ['jpg','jpeg','png','txt','pdf','csv','jar','html','php','css','js','xlsx'];

//$arquivos = $_FILES['arquivos'];

//$nomes = $arquivos['name'];


 
$sql = ("INSERT INTO relatoriofunc VALUES ('0','$autor','$destinatario', '$assunto','$conteudo','$nome_pasta',NOW(),'N')");
$dados = mysqli_query($conn, $sql);
$ultimo_id = mysqli_insert_id($conn);

$nome = $assunto;
$nome_imagem = $_FILES['imagem']['name'];

$control = 0;

foreach ($nome_imagem as $imagem){

	$query = ("INSERT INTO arquivos_func(assunto,arquivo,relatorio_id) VALUES ('$nome','$imagem','$ultimo_id') ");
    $dados2 = mysqli_query($conn, $query);

if($dados2){

	$diretorio = '../arquivos/Funcionarios/' . $ultimo_id . '/';

	mkdir($diretorio, 0755);

	if(move_uploaded_file($_FILES['imagem']['tmp_name'][$control], $diretorio . $imagem)){
			$zip = new Zipar();
			$zip->ziparArquivos($imagem,$imagem . ".zip", $diretorio);
			unlink($diretorio."/".$imagem);
		header("Location: ../dashboard.php");
	}
} else {
	echo "PUTS";
}

	$control = $control + 1;
}




/*for ($i=0; $i < count($nomes); $i++) { 
	$extensao = explode('.', $nomes[$i]);
	$extensao = end($extensao);

	if (in_array($extensao, $arquivos_permitidos)) {
			$sql2 = ("INSERT INTO arqcliente VALUES ('0', '$nomes[$i]','$assunto', NOW())");

			$dados2 = mysqli_query($conn, $sql2);
	}
}*/

mysqli_close($conn);

header("Location:../relatorios_clientes.php");



?>