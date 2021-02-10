<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?> 
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Visualizar - Relatório</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="https://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
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
    <h2 class="ls-title-3 ls-ico-eye">Visualizar - Relatório</h2>
  </header>
    <?php

include "include/conn.php";

$idRelatorioCliente = $_POST["idRelatorioCliente"];
$dataEnvio = $_POST["dataEnvio"];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT  * FROM relatoriocliente WHERE idRelatorioCliente = $idRelatorioCliente");
//$query2 = sprintf("SELECT  * FROM arqcliente WHERE dataEnvio = $dataEnvio");

// executa a query
$dados = mysqli_query($conn,$query) or die(mysqli_error());
//$dados2 = mysqli_query($conn,$query2) or die(mysqli_error());


// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
//$linha_arq = mysqli_fetch_assoc($dados2);

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);

  ?>


  <form action="" class="ls-form ls-form-text ls-form-horizontal ls-form-disable" data-ls-module="form">
  <label class="ls-label col-md-3">
      <b class="ls-label-text">Autor</b>      
      <input type="text" name="" id="autor" value="<?=$linha['autor']?>">
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Setor</b>      
      <input type="text" name="" id="destinatario" value="<?=$linha['setor']?>" >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Assunto</b>      
      <input type="text" name="" id="destinatario" value="<?=$linha['assunto']?>" >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Descricao</b>      
      <input type="text" name="" id="destinatario" value="<?=$linha['descricao']?>" >
    </label>

   <!-- <label class="ls-label col-md-3">
      <b class="ls-label-text">Arquivos</b>      
      <input type="text" name="" id="destinatario" value= >
    </label>-->
</form>


<?php 
    if($_SESSION['tipoCliente'] == 3 or $_SESSION['tipoCliente'] == 4){
        
        $pasta = $_POST["pegar"];
?>
<form action="relatorios_clientes.php" method="POST">
    <input type="hidden" value="<?php echo $pasta ?>" name="pastas">
    <button class="ls-btn ls-ico-chevron-left">Voltar</button>
</form>

</main>

<?php } else { ?>


 <a href="relatorios_clientes.php"><button class="ls-btn ls-ico-chevron-left">Voltar</button></a>
    </main>
    
<?php } ?>

   

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="mask.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    
  </body>
</html>