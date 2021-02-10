<?php
session_start();
include 'include/painel.php';
include 'include/menu.php';
?> 
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Setores</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="https://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <style>
      .espacobtn{
      float: left;
      margin-right: 10px;
    }
    /*css da barra de pesquisa*/
    div.dataTables_wrapper  div.dataTables_filter {
    width: auto;
    float: right; 
    text-align: center;
    margin-top:
    }

    </style>
  </head>
  <body>
    <main class="ls-main ">
      <div class="container-fluid">
        <div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <!--icone no titulo -->
    <h2 class="ls-ico-ftp">Setores</h2>
    <a href="cadastro_setor.php" class="ls-btn ">Adicionar Setor</a>
  </header>



<table  class="ls-table ls-table-striped display" id="tabela" style="width:100%">
  <thead>
  
    <tr>
      <th class="ls-data-descending">Setor</th>
      <th class="hidden-xs ls-data-descending">Responsável do setor</th>
      <th class="hidden-xs ls-data-descending">Empresa</th>
      <th class="ls-data-descending">Ações</th>

    </tr>
  </thead>


  <tbody>

    <tr>
      <?php

        include "include/Rsetor.php";

        if($total > 0) {
        // inicia o loop que vai mostrar todos os dados
        do {
      ?>

      <td class="hidden-xs"><?=$linha['setor']?></td>
      <td class="hidden-xs"><?=$linha['responsavelSetor']?></td>
      <td class="hidden-xs"><?=$linha['empresa']?></td>
      <td>

        <form action="editar_setor.php" method="POST" enctype="multiparty/form-data">
        <input type="hidden" name="idsetor" id="idsetor" value=<?=$linha['idSetor']?>>
        <button type="submit" class="ls-btnr ls-ico-pencil espacobtn" title="Alterar"></button>
        </form>
        <form action="include/Dsetor.php" method="POST" enctype="multiparty/form-data">
        <input type="hidden" name="idsetor" id="idsetor" value=<?=$linha['idSetor']?>>
        <button type="submit" class="ls-btn-primary-danger ls-ico-remove espacobtn" title="Alterar"></button>
        </form>
        


           </tr>
           <?php
            // finaliza o loop que vai mostrar os dados
            }while($linha = mysqli_fetch_assoc($dados));

            // fim do if 
            }?>

           

         
 </tbody>
</table>


      </div>
    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->
    
  </body>
</html>