<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?> 
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Cadastro - Administrador</title>

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
    <h2 class="ls-title-3 ls-ico-user-add">Cadastro - Adminstrador</h2>
  </header>

<div>
    <?php 
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
</div>

  <form action="include/Cadm.php" method="post" class="ls-form-horizontal">
  <fieldset>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Empresa:</b>
      <div class="ls-custom-select">
      <select class="ls-select" name="empresa">
    <?php

    include "include/Rempresa.php";

    if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
    ?>

    <option value="<?php echo $linha['nome'] ?>"><?php echo $linha['nome'] ?></option>

    <?php
    // finaliza o loop que vai mostrar os dados
    }while($linha = mysqli_fetch_assoc($dados));

    // fim do if 
    }
    ?>

    </select>
      </div>
    </label>
    
    
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Setor:</b>
      <div class="ls-custom-select">
      <select class="ls-select" name="setor">
    <?php

    include "include/Rsetor.php";

    if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
    ?>

    <option value="<?php echo $linha['setor'] ?>"><?php echo $linha['setor'] ?></option>

    <?php
    // finaliza o loop que vai mostrar os dados
    }while($linha = mysqli_fetch_assoc($dados));

    // fim do if 
    }
    ?>

    </select>
      </div>
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">E-mail</b>      
      <input type="text" name="email" id="email" placeholder="exemplo@exemplo.com" required >
    </label>

    <label class="ls-label col-md-2">
      <b class="ls-label-text">Telefone</b>
      <input type="text" id="telefone" name="telefone" placeholder="(99) 99999-9999" >
    </label>

    <input type="hidden" name="senha"  value="adm123">

     
    
  </fieldset> 

  
    <button class="ls-btn" type="submit">Cadastrar</button>
  </form>
<div class="ls-actions-btn">
    <a href="adm.php"><button class="ls-btn ls-ico-chevron-left">Voltar</button></a>
  </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>