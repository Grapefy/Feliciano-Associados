<?php
include 'include/islogged.php';
include 'include/painel.php';
include 'include/menu.php';
?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Feliciano Associados - Tipos de Serviços</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
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
        { extend: 'pdf', className: 'ls-btn-pdf', orientation: 'landscape',  pageSize: 'A4', filename:'Feliciano Associados - Tipos de Servico'+d, title:' ',exportOptions: {columns: [0, 1, 2] },},
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
    <!--icone no titulo -->
    <h2 class="ls-title-3 ls-ico-lamp">Tipos de Serviços</h2>
    <?php if ($_SESSION['tipoCliente'] == 4){ ?>
    <a href="cadastro_tipo_servico.php" class="ls-btn ">Adicionar Tipo de Serviço</a>
    <?php } ?>
  </header>



<table  class="ls-table ls-table-striped display" id="tabela" style="width:100%">
  <thead>
    <tr>
      <th class="ls-data-descending">Serviço</th>
      <th class="hidden-xs ls-data-descending">Fornecedor</th>
      <th class="hidden-xs ls-data-descending">Data de Cadastro</th>
      <th class="ls-data-descending">Ações</th>

    </tr>
  </thead>


  <tbody>

    <tr>
      <?php

        include "include/ver_tipo_servico.php";

        if($total > 0) {
        // inicia o loop que vai mostrar todos os dados
        do {
      ?>

      <td><?=$linha['servico']?></td>
      <td class="hidden-xs"><?=$linha['fornecedor']?></td>
      <td class="hidden-xs"><?=date("d/m/Y",strtotime(str_replace('-','/',$linha["dataCadastro"])));?></td>
      <td>

        
        

        <form action="visualizar_tipo_servico.php" method="POST" enctype="multiparty/form-data">
        <input type="hidden" name="idServicos" id="idServicos" value=<?=$linha['idServicos']?>> 
        <button type="submit" class="ls-btn ls-ico-eye espacobtn" title="Ver"></button>
        </form>
        <form action="editar_tipo_servico.php" method="POST" enctype="multiparty/form-data">
        <input type="hidden" name="idServicos" id="idServicos" value=<?=$linha['idServicos']?>>
        <button  type="submit" class="ls-btn ls-ico-pencil espacobtn" title="Visualizar informações"></button>
        </form>
        <form action="include/Dtiposerv.php" method="POST" enctype="multiparty/form-data">
        <input type="hidden"name="idServicos" id="idServicos" value=<?=$linha['idServicos']?>>
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