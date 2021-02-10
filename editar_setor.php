<?php
session_start();
include 'include/painel.php';
include 'include/menu.php';
?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Editar - Setor</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="https://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
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
    <h2 class="ls-title-3 ls-ico-edit-admin">Editar - Setor</h2>
  </header>

  <?php

include "include/conn.php";

$idSetor = $_POST["idsetor"];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM setor WHERE idSetor = $idSetor");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);

  ?>

  <form action="include/Usetor.php" method="post" class="ls-form ls-form-horizontal" data-ls-module="form">
  <fieldset id="fields-disabled" class="row ls-form-disable ls-form-text">

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Setor</b>      
      <input type="text" name="setor" id="nome" value="<?=$linha['setor']?>" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Responsável do setor</b>
      <input type="text" id="responsavelSetor" name="responsavelSetor" value="<?=$linha['responsavelSetor']?>">
    </label>

    
    <input type="hidden" name="idSetor" value=<?=$linha['idSetor']?>>


    <label class="ls-label col-md-4">
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

    

  </fieldset> 

 
    <button class="ls-btn-primary hidden-elements" data-toggle-class="ls-display-none"  data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled">Editar campos</button>
    <button class="ls-btn-primary ls-display-none hidden-elements" type="submit">Salvar</button>
    <button data-toggle-class="ls-display-none"  data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled" class="ls-btn-danger ls-display-none hidden-elements" type="">Cancelar</button>
 
</form>
<div class="ls-actions-btn">
    <a href="setor.php"><button class="ls-btn ls-ico-chevron-left">Voltar</button></a>
  </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>