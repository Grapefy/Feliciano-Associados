<?php //session_start();
if ($_SESSION['tipoCliente'] == 1){

  $redirect = "perCf.php";
  $quem = "Cliente";
  $nome = $_SESSION['nome'];

} else if ($_SESSION['tipoCliente'] == 2){

  $redirect = "perCj.php";
  $quem = "Cliente";
  $nome = $_SESSION['nome'];

} else if ($_SESSION['tipoCliente'] == 4){

  $redirect = "perAdm.php";
  $quem = "Administrador";

} else if ($_SESSION['tipoCliente'] == 3){

  $redirect = "perFunc.php";
  $quem = "Funcionário";
  $nome = $_SESSION['nome'];

}
?>

<head>
<link rel="icon" type="text/css" href="img/02.png">
</head>
  
  <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

<div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <?php
           if ($_SESSION['tipoCliente'] == 4) { ?>
        <span class="ls-name">Admin</span>
        <?php } else { ?>
          <span class="ls-name"><?php echo $nome; ?></span>
          <?php } ?>
      </a>
      <!--Menu abaixo de perfil-->
      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href=<?php echo $redirect ?>>Perfil</a></li>
          <li><a href="include/logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  <a onClick="JavaScript: window.history.back();"  class="ls-go-next"><span class="ls-text">Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="dashboard.php">
        <small>Feliciano associados</small>
        Área do <?php echo $quem; ?>
      </a>
    </h1>
</div>