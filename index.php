<?php 
  session_start();
  ?>
<!DOCTYPE html>
<html class="ls-theme-indigo">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="text/css" href="img/02.png">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Login</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link href="https://opensource.locaweb.com.br/locawebstyle/assets/stylesheets/locastyle.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

      <script type="text/javascript">


function recuperar_senha(){
var element = document.getElementById('element');
        $.ajax({
            method: "post",
            url: "tu vai colocar o diretorio do botão do envio do email",
            data: $("#form_recupera").serialize(),
        success: function(data){
 
       document.getElementById("alertconfirmacao").classList.remove('ls-display-none');
       document.getElementById("modalSmall").classList.add('ls-display-none');

        }

    });
    } 
</script>


</head>

<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">
    

<div class="ls-login-parent">
    
  <div class="ls-login-inner">
      
    <div class="ls-login-container">
      <div class="ls-login-box">

  <center><img src='img/02.png'/></center><br><br>

  <?php
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
?>



  <form  class="ls-form ls-login-form" action="include/login.php" method="POST">
    <fieldset>


      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Usuário</b>
        <input class="ls-login-bg-user ls-field-lg" type="text" placeholder="Usuário" name="username" required autofocus>
      </label>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Senha</b>
        <div class="ls-prefix-group ls-field-lg">
          <input id="password_field" class="ls-login-bg-password" type="password" placeholder="Senha" name="senha" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
        </div>
      </label><br>

      
      

      <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
      <a href="../"><p class="ls-btn ls-btn-block ls-ico-chevron-left" >Voltar</p></a>
      
    </fieldset>
 
    <div id="alertconfirmacao" class="ls-alert-success ls-md-space ls-display-none">Dados enviados!</div>
    <center><p><a data-ls-module="modal" data-target="#modalSmall" class="ls-login-forgot" style="cursor: pointer;">Esqueci minha senha</a></p>
  </center>
  </form>


</div>

<center><p style="color: #8a9178; margin-top: 20px;">Versão 1.1</p></center>
  </div>
</div>


<div class="ls-modal" id="modalSmall">
  <div class="ls-modal-small">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Recuperação de senha</h4>
    </div>
    <div class="ls-modal-body">
    <label class="ls-label col-md">
     <form method="POST" action="../enviadoremail/recuperarsenha.php" name="form_recupera" >
       <input type="text" name="email" placeholder="Digite o email cadastrado">
       <input type="hidden" name="assunto" value="Recuperação de senha">
    
     </label>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Close</button>
      <button type="submit" class="ls-btn-primary">Enviar</button>
    </div>
 </form>  </div>
</div>

<script src="https://opensource.locaweb.com.br/locawebstyle/assets/javascripts/locastyle.js" type="text/javascript"></script>


</body>
</html>
