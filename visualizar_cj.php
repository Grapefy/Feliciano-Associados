<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Visualizar - Pessoa Jurídica</title>

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
    <h2 class="ls-title-3 ls-ico-eye">Visualizar - Pessoa Jurídica</h2>
  </header>

  <?php

include "include/conn.php";

$id = $_POST["id"];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM clientejuridica WHERE id = $id");
//echo $query;
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
      <b class="ls-label-text">Razão Social:</b>      
      <input type="text" name="" id="nome" value="<?php echo $linha['razaoSocial']?>">
    </label>
    
    <label class="ls-label col-md-3">
      <b class="ls-label-text">CNPJ:</b>      
      <input type="text" name="" id="nome" value=<?=$linha['cnpj']?>>
    </label>
    
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Endereço:</b>      
      <input type="text" name="" id="nome" value="<?php echo $linha['endereco']?>">
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">E-mail:</b>      
      <input type="text" name="" id="email" value=<?=$linha['email']?>>
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Telefone:</b>
      <input type="text" id="telefone" name="" value=<?=$linha['telefone']?>>
    </label>

</form>
    <a href="clientejuridico.php"><button class="ls-btn ls-ico-chevron-left">Voltar</a>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>