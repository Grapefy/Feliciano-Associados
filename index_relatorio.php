<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
include 'include/Rpastas.php';

if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){
  $redirect = "relatorios_func.php";
} else {
  $redirect = "relatorios_clientes.php";
}
?> 

<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Feliciano Associados - Dashboard Relatórios</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link rel="stylesheet" href="css/cor.css">
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
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
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
    <script>
$(document).ready( function () {
var currentDate = new Date()
var day = currentDate.getDate()
var month = currentDate.getMonth() + 1
var year = currentDate.getFullYear()

var d = day + "-" + month + "-" + year;

$(document).ready(function() {
    $('#tabela').DataTable( {
      paging: false,
      dom: 'Bfrtip',
      buttons: [
        { extend: 'copy', className: 'ls-btn' },
        { extend: 'csv', className: 'ls-btn' },
        { extend: 'pdf', className: 'ls-btn-pdf', orientation: 'landscape',  pageSize: 'A4', filename:'Feliciano Associados - Relatorios'+d, title:' ',exportOptions: {columns: [0, 1, 2] },},
        { extend: 'print', className: 'ls-btn' },            
          ],

        "language": {
               "searchPlaceholder": "Pesquisar ",
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
                    },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
                }
                    }
    } );
} );
 });
</script>
  </head>
  <body>

    <main class="ls-main ">
      <div class="container-fluid">
      <div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3 ls-ico-folder-open">Suas Pastas</h2>
  </header>

<?php if ($_SESSION['tipoCliente'] == 3 or $_SESSION['tipoCliente'] == 4){ ?>
  <div class="ls-list">
  <header class="ls-list-header">
    <div class="ls-list-title col-md-9">
      <a href="#" >Caixa de Entrada</a>
      <small>Relatórios Recebidos</small>
    </div>
    <div class="col-md-3 ls-txt-right">
    <form action=<?php echo $redirect ?> method="POST">
      <input type="hidden" name="pastas" value="Caixa de Entrada">
      <input type="submit" class="ls-btn-primary" value="Administrar">
    </form>
    </div>

  </header>
  <div class="ls-list-content ">
    <div class="col-xs-12 col-md-6">
      <span class="ls-list-label">Total de Relatorios</span>
      <strong>--</strong>
    </div>
    <div class="col-xs-12 col-md-6">
      <span class="ls-list-label">Status</span>
      <strong>--</strong>
    </div>
  </div>
</div>

<?php } ?>

  <?php

    if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {

  ?>
  

  <div class="ls-list">
  <header class="ls-list-header">
    <div class="ls-list-title col-md-9">
      <a href="#" ><?php echo $linha['nome_pasta']?></a>
      <small><?php echo $_SESSION['nome']?></small>
    </div>
    <div class="col-md-3 ls-txt-right">
    <form action=<?php echo $redirect ?> method="POST">
      <input type="hidden" name="pastas" value="<?php echo $linha['nome_pasta']?>">
      <input type="submit" class="ls-btn-primary" value="Administrar">
    </form>
    </div>
  </header>
  <div class="ls-list-content ">
    <div class="col-xs-12 col-md-5">
      <span class="ls-list-label">Total de Relatorios</span>
      <strong>--</strong>
    </div>
    <div class="col-xs-12 col-md-5">
      <span class="ls-list-label">Status</span>
      <strong>--</strong>
    </div>
  </div>
</div>

<?php 
    
  }while($linha = mysqli_fetch_assoc($dados));

  // fim do if 
  
  } ?>


<div class="ls-list" data-ls-module="collapse" data-target="0">
  <header class="ls-list-header ls-collapse-header">
    <div class="ls-list-title col-md-9">
      <a href="#" >Adicionar pasta</a>
      <!-- <small>Fake Product Name  </small> -->
    </div>
    <div class="col-md-3 ls-txt-right">
      <!-- <a href="#" class="ls-btn-primary">Administrar</a> -->
    </div>
  </header>

  <div class="ls-collapse-body" id="0">
      
    <!-- <hr><br> -->

    <form action="include/Cpasta.php" method="POST">
        
      <b class="ls-label-text col-md-9">Nome da Pasta</b> <br><br><br>&nbsp;&nbsp;
      <input type="text" name="nome_pasta" id="nome_pasta" placeholder="Nome" required >
      <br><br><br>&nbsp;&nbsp;

      <input type="submit" class="ls-btn" value="Adicionar">

    </form>



    </div>
</div>
</div>


    </main>

   

    <!-- We recommended use jQuery 1.10 or up -->
    
  </body>
</html>