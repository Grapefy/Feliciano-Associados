<?php

include "conn.php";

session_start();

    $username = $_POST['username'];
    $password = $_POST['senha'];

    $query = "SELECT * FROM login WHERE indetificacao ='$username' and senha ='$password' ";
    //echo $query;
    $select_user_query = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($select_user_query)){
        
        $idCliente = $row['tipoCliente'];
        $idLogin = $row['idLogin'];
        $db_username = $row['indetificacao'];
        $db_password = $row['senha'];

    }

    if ($idCliente == 1){
        $query2 = "SELECT * FROM clientefisica WHERE email ='$username' and senha ='$password' ";
        $select_user_query2 = mysqli_query($conn,$query2);
        while ($row = mysqli_fetch_array($select_user_query2)){
        
            $db_nome = $row['nome'];
            $db_sobrenome = $row['sobrenome'];
            $db_id = $row['id'];
    
        }
    } else if ($idCliente == 2){
        $query2 = "SELECT * FROM clientejuridica WHERE email ='$username' and senha ='$password' ";
        $select_user_query2 = mysqli_query($conn,$query2);
        while ($row = mysqli_fetch_array($select_user_query2)){
        
            $db_nome = $row['razaoSocial'];
            $db_id = $row['id'];
    
        }
    } else if ($idCliente == 3){
        $query2 = "SELECT * FROM funcionarios WHERE email ='$username' and senha ='$password' ";
        $select_user_query2 = mysqli_query($conn,$query2);
        while ($row = mysqli_fetch_array($select_user_query2)){
        
            $db_nome = $row['nome'];
            $db_id = $row['idFuncionario'];
            $db_setor = $row['setor'];
    
        }
    } else if ($idCliente == 4){
        $query2 = "SELECT * FROM administrador WHERE email ='$username' and senha ='$password' ";
        $select_user_query2 = mysqli_query($conn,$query2);
        while ($row = mysqli_fetch_array($select_user_query2)){
        
            $db_id = $row['idAdministrador'];
            $db_nome = $row['nomeEmpresa'];
            $db_setor = $row['setor'];
    
        }
    }

    if ($db_username == $username && $db_password == $password){

        $_SESSION['tipoCliente'] = $idCliente;
        $_SESSION['idLogin'] = $idLogin;
        $_SESSION['indetificacao'] = $db_username;
        $_SESSION['senha'] = $db_password;

        if ($idCliente == 1){

            $_SESSION['nome'] = $db_nome;
            $_SESSION['sobrenome'] = $db_sobrenome;
            $_SESSION['id'] = $db_id;

        } else if ($idCliente == 2){

            $_SESSION['nome'] = $db_nome;
            $_SESSION['id'] = $db_id;

        } else if ($idCliente == 3){

            $_SESSION['nome'] = $db_nome;
            $_SESSION['idFunc'] = $db_id;
            $_SESSION['setor'] = $db_setor;

        } else if ($idCliente == 4){

            $_SESSION['idAdministrador'] = $db_id;
            $_SESSION['nome'] = $db_nome;
            $_SESSION['setor'] = $db_setor;
        }
        
        header("Location: ../dashboard.php");
    } else  {
        session_start();
        $_SESSION['msg'] = '<div class="ls-alert-danger ls-dismissable">
        <span data-ls-module="dismiss" class="ls-dismiss" >&times;</span>
            Senha ou Email inválidos.
        </div>';
        header("Location: ../index.php");
    }
    
?>