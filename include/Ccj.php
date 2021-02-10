<?php

include "conn.php";

    $text = "youdontknowthepassowrd07";
    $hashFormat = "$2a$10$";
    $hashF_and_text = $hashFormat . $text;
    
    $razaoSocial = $_POST['razaoSocial'];
    $email = $_POST['email'];
    $password = "cj123";
    $cnpj = $_POST['cnpj'];
    $telefone= $_POST['telefone'];
    $end = $_POST['endereco'];
    $num = $_POST['numero'];
    $comp = $_POST['complemento'];
    $end = $end . " " . $num . " " . $comp;
    $tipoc = 2;

    $pastas = $_POST['pastas'];


include "emailexiste.php";

if ($z != 1){
    //$password = crypt($password, $hashF_and_text);
    $query = "INSERT INTO clientejuridica(razaoSocial,email,senha,endereco,cnpj,telefone) ";
    $query .= "VALUES ('$razaoSocial','$email', '$password','$end','$cnpj','$telefone')";
    $query2 = ("INSERT INTO login VALUES ('0','$email','$password', '2')");
    
    $nome = $razaoSocial;
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

header("Location:../clientejuridico.php");

} else{
    //header("Location:../cadastro_clientejuridico.php");
}


?>