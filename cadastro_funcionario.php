<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?> 
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Cadastro - Funcionários</title>

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
        $('#telefone').mask('(00)00000-0000'); //Telefone
      });
    </script>
    <script type="text/javascript">
      (function() {
    // Inicia a função de Modal manualmente
    locastyle.modal.init();
  })();
    </script>
  </head>
  <body>
    <main class="ls-main ">
 
      <div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3 ls-ico-user-add">Cadastro - Funcionários</h2>
  </header>

<div>
    <?php 
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
</div>

  <form action="include/Cfunc.php" method="post" class="ls-form-horizontal">
  <fieldset>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Nome</b>      
      <input type="text" name="nome" id="nome" placeholder="Joao da Silva" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">E-mail</b>      
      <input type="text" name="email" id="email" placeholder="exemplo@exemplo.com" required >
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Telefone</b>
      <input type="text" id="telefone" name="telefone" placeholder="(99) 99999-9999" >
    </label>

      <label class="ls-label col-md-4">
        <b class="ls-label-text">Endereço:</b>      
        <input type="text" name="endereco" id="endereco" placeholder="Rua...,000,Centro" required >
      </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">CPF</b>
      <input type="text" id="cpf" name="cpf" placeholder="00000000000" >
      <p>Apenas números</p>
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Data de Nascimento</b>
      <input type="text" name="dataNascimento" id="dataNascimento" class="datepicker" placeholder="dd/mm/aaaa">
    </label>

    <input type="hidden" name="senha"  value="funcionario123">

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Setor</b>
      <input type="text" name="setor" id="setor" placeholder="Assessoria Trabalhista" required >
    </label>
    
  </fieldset> 

  
    <button class="ls-btn" type="submit">Cadastrar</button>
  </form>
<div class="ls-actions-btn">
    <a href="funcionarios.php"><button class="ls-btn ls-ico-chevron-left">Voltar</button></a>
  </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>