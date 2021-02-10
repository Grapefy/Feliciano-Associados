<aside class="ls-sidebar">

<div class="ls-sidebar-inner">
    <a href="index.php"  class="ls-go-prev"><span class="ls-text">Voltar</span></a>

    <nav class="ls-menu">
      <ul>
         <li><a href="dashboard.php" class="ls-ico-dashboard" title="Dashboard">Dashboard</a></li>
         <?php if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2) { ?>

         <li><a href="meusserv.php" class="ls-ico-tree" title="Relatórios da revenda">Meus Serviços</a></li>

         <li>
            <a href="#" class="ls-ico-chart-bar-up" title="Configurações">Meus Relatórios</a><!--Clientes-->
            <ul>
              <li><a href="cadastro_relatorio_cliente.php">Novo</a></li>
              <li><a href="relatorios_clientes.php">Enviados</a></li>
              <li><a href="index_relatorio.php">Recebidos</a></li>
            </ul>
          </li>

         <?php } ?>
         
         <?php if ($_SESSION['tipoCliente'] == 4 or $_SESSION['tipoCliente'] == 3) {?>

         <li>
          <a href="#" class="ls-ico-users" title="Clientes">Clientes</a>
            <ul>
              <li><a href="clientefisico.php">Físico</a></li>
              <li><a href="clientejuridico.php">Jurídico</a></li>
            </ul>
          </li>
          <?php
          if ($_SESSION['tipoCliente'] == 4) { ?>
         <li><a href="funcionarios.php" class="ls-ico-tree" title="Funcionários">Funcionários</a></li>
         <?php } ?>
         <li><a href="servico.php" class="ls-ico-lamp" title="Serviços">Serviços</a></li>
         <li><a href="orcamento.php" class="ls-ico-panel-emkt" title="Orçamentos">Orçamentos</a></li>
         <li>
          <a href="#" class="ls-ico-chart-bar-up" title="Relatórios">Relatórios</a>
          <ul>
            <li><a href="cadastro_relatorio_func.php">Novo</a></li>
            <li><a href="relatorios_func.php" >Enviados</a></li>
            <li><a href="index_relatorio.php" >Recebidos</a></li>
          </ul>
        </li>

          <?php } ?>
          
          
          <?php
          if ($_SESSION['tipoCliente'] == 4) { ?>
         <li>
          <a href="#" class="ls-ico-cog" title="Relatórios">Configurações Gerais</a>
          <ul>
            <li><a href="tipos_servicos.php">Tipos de Serviços</a></li>
            <li><a href="setor.php" >Setores</a></li>
            <li><a href="empresas.php" >Empresas</a></li>
            <li><a href="adm.php" >Administradores</a></li>
          </ul>
        </li>
        
        <?php } ?>

      </ul>
    </nav>
</div>
</aside>