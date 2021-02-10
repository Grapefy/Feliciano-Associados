<?php
include 'include/islogged.php';
include 'include/painel.php'; 
include 'include/menu.php';
?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Visualizar - Orçamento</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
  </head>
  <body>
    <main class="ls-main ">
 
      <div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3 ls-ico-eye">Visualizar - Orçamento</h2>
  </header>

  <?php

include "include/conn.php";

$idOrcamento = $_POST["idOrcamento"];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM orcamento WHERE idOrcamento = $idOrcamento");

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

  <form action="" class="ls-form ls-form-text ls-form ls-form-disable" data-ls-module="form">
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Nome</b>      
      <input type="text" name="" id="tipoServico" value="<?=$linha['nome']?>">
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Email</b>      
      <input type="text" name="" id="data" value=<?=$linha['email']?>>
    </label>

    <label class="ls-label col-md-6">
      <b class="ls-label-text">Serviço</b>
      <input type="text" id="servico" name="" value="<?=$linha['servico']?>">
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Necessidade</b>
      <input type="text" id="necessidade" name="" value="<?=$linha['necessidade']?>" >
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Status</b>
      <input type="text" id="status" name="" value=<?=$linha['status']?> >
    </label>

</form>
    <a href="orcamento.php"><button class="ls-btn ls-ico-chevron-left">Voltar</a>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>