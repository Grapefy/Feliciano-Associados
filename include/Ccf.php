<?php

include "conn.php";

    $text = "youdontknowthepassowrd07";
    $hashFormat = "$2a$10$";
    $hashF_and_text = $hashFormat . $text;
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $password = "cf123";
    $cpf = $_POST["cpf"];
    $dataNasc = $_POST["dataNasc"];
    $dataNasc = date("Y-m-d",strtotime(str_replace('/','-',$dataNasc)));
    $telefone= $_POST["telefone"];
    $sexo = $_POST["sexo"];
    $end = $_POST["endereco"];
    $num = $_POST["numero"];
    $comp = $_POST["complemento"];
    $end = $end . " " . $num . " - " . $comp;
    
    $tipoc = 1;

    $pastas = $_POST['pastas'];

    include "emailexiste.php";

    if ($z != 1){
    //$password = crypt($password, $hashF_and_text);
    $query = "INSERT INTO clientefisica(nome, sobrenome, dataNascimento,email,senha,sexo,endereco,cpf,telefone) ";
    $query .= "VALUES ('$nome','$sobrenome','$dataNasc','$email', '$password','$sexo','$end','$cpf','$telefone')";
    $query2 = ("INSERT INTO login VALUES ('0','$email','$password', '1')");
    //echo $query;
    
    $nome = $nome . " " . $sobrenome;
    $senha = $password;

    
    
    $result = mysqli_query($conn,$query);
    $ultimo_id = mysqli_insert_id($conn);
    $result2 = mysqli_query($conn,$query2);
    if(!$result){
            die("Não foi possível criar o usuário");
    }	
    
    
foreach ($pastas as $pasta){

    $sql = sprintf("INSERT INTO pastas (nome_pasta,id_responsavel,tipocliente) VALUES ('$pasta',$ultimo_id,$tipoc)");

    $dados = mysqli_query($conn,$sql);

    if (!$dados){
        header("Location: oi.php");
    }else {
        header("Location: index.php");
    }
}

mysqli_close($conn);

//include "../../enviadoremail/emailcadastro.php";

header("Location:../clientefisico.php");

} else {
    header("Location:../cadastro_clientefisico.php");
}



?>