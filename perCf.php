<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Seu Perfil</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="https://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="jquery.mask.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true}); //CPF
        $('#telefone').mask('(00) 00000-0000'); //Telefone
      });
    </script>
    <script type="text/javascript">
      (function() {
    // Inicia a função de Modal manualmente
    locastyle.modal.init();
  })();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("img").hover(function(){
        $("img").css("opacity: 0.1;");
      });
      $("img").mouseout(function(){
        $("img").css("opacity: 1;");
      });
    });
    </script>
    <style>
    form{
        margin: 0 auto;
        width: 60%;
    }
    .divImg{
      margin: 0 auto;
      margin-bottom: 5%;
      width: 20%;
      text-align: center;
        
    }
    img{
      border-radius: 50%;
    }
    fieldset{
      margin: 0 auto;
    }

    </style>
  </head>
  <body>
    <main class="ls-main ">
 
      <div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3 ls-ico-user">Perfil - Cliente</h2>
  </header>


  <?php

include "include/conn.php";

$id = $_SESSION['id'];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM clientefisica WHERE id = $id");

// executa a query
$dados = mysqli_query($conn,$query);
if(!$dados){
  die("Não foi possível criar o usuário");
}

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);

  ?>

  <div class="form">
    <form action="include/UperCf.php" method="post" class="ls-form-horizontal " data-ls-module="form">
      <fieldset id="fields-disabled" class="row ls-form-disable ls-form-text">

      <label class="ls-label col-md-3">
      <b class="ls-label-text">Nome</b>      
      <input type="text" name="nome" id="nome" value="<?=$linha['nome']?>" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Sobrenome</b>      
      <input type="text" name="sobrenome" id="sobrenome" value="<?=$linha['sobrenome']?>" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Data de Nascimento</b>      
      <input type="text" class="datepicker" name="dataNasc" value=<?=date("d/m/Y",strtotime(str_replace('-','/',$linha["dataNascimento"])));?> required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">E-mail</b>      
      <input type="text" name="email" id="email" value=<?=$linha['email']?> required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Sexo</b>      
      <input type="text" name="sexo" id="sexo" value=<?=$linha['sexo']?> required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Endereço</b>      
      <input type="text" name="endereco" id="endereco" value="<?=$linha['endereco']?>" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">CPF</b>      
      <input type="text" name="cpf" id="cpf" value=<?=$linha['cpf']?> required >
    </label>
    
        <label class="ls-label col-md-3">
          <b class="ls-label-text">Senha</b>
          <div class="ls-prefix-group">
            <input type="password" maxlength="45" id="senha" name="senha" value=<?=$linha['senha']?>>
              <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha" href="#">
              </a>
          </div>
        </label>
    
        <label class="ls-label col-md-3">
          <b class="ls-label-text">Telefone</b>
          <input type="text" id="telefone" name="telefone" value="<?=$linha['telefone']?>" >
        </label>

        <input type="hidden" name="id" value=<?=$linha['id']?>>
         <input type="hidden" name="idLogin" value='1'>    
      </fieldset> 

    <div class="ls-actions-btn">
        <button class="ls-btn-primary hidden-elements" data-toggle-class="ls-display-none"  data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled">Editar campos</button>
        <button class="ls-btn-primary ls-display-none hidden-elements" type="submit">Salvar</button>
        <button data-toggle-class="ls-display-none"  data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled" class="ls-btn-danger ls-display-none hidden-elements" type="submit">Cancelar</button>
    </div>
    </form>
  </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html> 