<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?> 
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Cadastro - Serviços</title>

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
    <h2 class="ls-title-3 ls-ico-lamp">Cadastro - Serviços</h2>
  </header>

  <form action="include/Cserv.php" method="post" class="ls-form-horizontal">
  <fieldset>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Cliente</b> 
      <div class="ls-custom-select">
      <select class="ls-select" name="cliente" id="servico">
      <option value="" name="cliente">Selecionar</option>
        <?php 

            include "include/ver_cf.php";
    
            if($total > 0) {
            // inicia o loop que vai mostrar todos os dados
            do {
            
            $nome = $linha['nome'];
            $sobrenome = $linha['sobrenome'];
            $nome = $nome . " " . $sobrenome;
            ?>

            <option value="<?php echo $nome ?>"><?php echo $nome ?></option>

            <?php
            // finaliza o loop que vai mostrar os dados
            }while($linha = mysqli_fetch_assoc($dados));

            // fim do if 
            }
            ?>

        <?php 

          include "include/ver_cj.php";

          if($total > 0) {
          // inicia o loop que vai mostrar todos os dados
          do {
          ?>

          <option value="<?php echo $linha['razaoSocial'] ?>"><?php echo $linha['razaoSocial'] ?></option>

          <?php
          // finaliza o loop que vai mostrar os dados
          }while($linha = mysqli_fetch_assoc($dados));

          // fim do if 
          }
        ?>

      </select>     
      </div>
    </label>
    
    <label class="ls-label col-md-3 col-sm-10">
    <div class="ls-prefix-group">
        <b class="ls-label-text">Data de Adesão</b>
      <span data-ls-module="popover" data-content="Escolha o período desejado e clique em 'Filtrar'."></span>
      <input type="date" name="dataAdesao" class="datepicker ls-daterange" placeholder="<?php echo date("d/m/Y"); ?>" id="datepicker1" data-ls-daterange="#datepicker2">
    </div>
  </label>

  <label class="ls-label col-md-3 col-sm-10">
    <div class="ls-prefix-group">
        <b class="ls-label-text">Data de Vencimento</b>
      <span data-ls-module="popover" data-content="Clique em 'Filtrar' para exibir  o período selecionado."></span>
      <input type="date" name="data" class="datepicker ls-daterange" placeholder="dd/mm/aaaa" id="datepicker2">
    </div>
  </label>
    
   
    <label class="ls-label col-md-2">
      <b class="ls-label-text">Valor</b>
      <input type="text"  class="ls-mask-money"  id="valor" name="valor" placeholder="0,00">
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Serviços</b> 
      <div class="ls-custom-select">
      <select class="ls-select" name="servico" id="servico">
      <option value="" name="servico">Selecionar</option>
        <?php 

            include "include/ver_tipo_servico.php";
    
            if($total > 0) {
            // inicia o loop que vai mostrar todos os dados
            do {
            ?>

            <option value="<?php echo $linha['servico'] ?>"><?php echo $linha['servico'] ?></option>

            <?php
            // finaliza o loop que vai mostrar os dados
            }while($linha = mysqli_fetch_assoc($dados));

            // fim do if 
            }
            ?>
      </select>     
      </div>
    </label>
    
  </fieldset> 

  
    <button class="ls-btn" type="submit">Cadastrar</button>
  </form>
<div class="ls-actions-btn">
    <a href="servico.php"><button class="ls-btn ls-ico-chevron-left">Voltar</button></a>
  </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>