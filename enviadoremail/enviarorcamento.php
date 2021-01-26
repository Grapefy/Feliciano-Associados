<?php

include "include/conn.php";

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = $_POST['nome'];
$email = $_POST['email'];
$servico = $_POST['servico'];
$necessidades = $_POST['necessidades'];
$status = "pendente";

$query = "INSERT INTO orcamento(nome,email,servico,necessidade,status) ";
$query .= "VALUES ('$nome','$email','$servico','$necessidades','$status')";

$result = mysqli_query($conn,$query);

if(!$result){
        die("Não foi possível criar o usuário");
}

$mailfa = new PHPMailer(true);
$mail = new PHPMailer(true);

$mail->CharSet = 'UTF-8';
$mailfa->CharSet = 'UTF-8';

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Padrões de envio para email do usuário
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'felicianoassociado@gmail.com';
    $mail->Password = '190781GF';
    $mail->Port = 587;

    // Padrões de envio para email da empresa
    $mailfa->isSMTP();
    $mailfa->Host = 'smtp.gmail.com';
    $mailfa->SMTPAuth = true;
    $mailfa->Username = 'felicianoassociado@gmail.com';
    $mailfa->Password = '190781GF';
    $mailfa->Port = 587;

    // Email de quem vai enviar
    $mail->setFrom('felicianoassociado@gmail.com' , 'Feliciano Associados');
    $mailfa->setFrom('felicianoassociado@gmail.com' , 'Feliciano Associados');

    // Envio de email para empresa
    $mailfa->addAddress('contato@felicianoassociados.com');
    
    $mailfa->isHTML(true);
    $mailfa->Subject = 'Pedido de Orçamento - FA';
    $mailfa->AddEmbeddedImage('../dashboard/img/02.png', 'logo_ref');

    ob_start(); ?>

<body>
<center>

    <div style=" 
        border-style: solid;
        border-radius: 15px;
        width: 77%;
        height: 45%;
    ">


    <div style="
    margin-top: 2%;
    height: 8%;
    width: 97%;
    background-color: rgba(48, 133, 223, 0.678);
    border-radius: 15px;
    ">

        
        <img src="cid:logo_ref" style="
        height: 10%;
        margin-top: 1.2%;
        ">

        <div style="
        font-size: 25px;
        margin-top: 4%;
        margin-left: 4%;
        ">

        PEDIDO DE ORÇAMENTO

        </div>

    </div>

    <br>

    <div style="
        margin-top: 2%;
        font-size: 17px;
    ">

    Novo orçamento para o serviço de <strong><?=$servico?></strong> foi solicitado pelo(a) <?=$nome?> (<?=$email?>). <br>
    Verificar orçamentos no painel de controle!


        <br><br>

        Atenciosamente, <br>
        Feliciano Associados.

    </div>

    <br><br>

    <hr style="
        width: 95%;
    ">

    <br>

    <div style="
        font-size: 14px;
    ">

        <strong> CONTATO </strong> <br><br> 3109-0748 <br> <br>
        <strong> ENDEREÇO </strong> <br><br> Rua Pedro Borges 75, SALA 604  - Centro

    </div>

    <br><br>
    
    </div>

</center>
</body>

    <?php 
    $mensagemfa = ob_get_contents();
    ob_end_clean();

    $mailfa->Body = $mensagemfa;
    $mailfa->AltBody = 'Pedido de Orçamento';
    
    // Envio de email pra usuário
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Orçamento - FA';
    $mail->AddEmbeddedImage('../dashboard/img/02.png', 'logo_ref');

    ob_start(); ?>

<body>
<center>

    <div style=" 
        border-style: solid;
        border-radius: 15px;
        width: 77%;
        height: 45%;
    ">


    <div style="
    margin-top: 2%;
    height: 8%;
    width: 97%;
    background-color: rgba(48, 133, 223, 0.678);
    border-radius: 15px;
    ">

        
        <img src="cid:logo_ref" style="
        height: 10%;
        margin-top: 1.2%;
        ">

        <div style="
        font-size: 25px;
        margin-top: 4%;
        margin-left: 4%;
        ">

        PEDIDO DE ORÇAMENTO

        </div>

    </div>

    <br>

    <div style="
        margin-top: 2%;
        font-size: 17px;
    ">

    Prezado(a) <?=$nome?> , recebemos sua solicitação de orçamento para <br> 
    o serviço de <strong> <?=$servico?></strong>. <br>
    Vamos trabalhar na resolução das suas necessidades: <?=$necessidades?>. <br><br>

    Agradecemos pela preferência e retornaremos em breve!


        <br><br>

        Atenciosamente, <br>
        Feliciano Associados.

    </div>

    <br><br>

    <hr style="
        width: 95%;
    ">

    <br>

    <div style="
        font-size: 14px;
    ">

        <strong> CONTATO </strong> <br><br> 3109-0748 <br> <br>
        <strong> ENDEREÇO </strong> <br><br> Rua Pedro Borges 75, SALA 604  - Centro

    </div>

    <br><br>
    
    </div>

</center>
</body>

    <?php 
    $mensagem = ob_get_contents();
    ob_end_clean();

    $mail->Body = $mensagem;
    $mail->AltBody = 'Pedido de Orçamento';

    if($mail->send() && $mailfa->send()) {
        header("Location: ../");
    } else {
        echo 'Email nao enviado';
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>