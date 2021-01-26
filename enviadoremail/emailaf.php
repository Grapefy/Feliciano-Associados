<?php
require_once('../../enviadoremail/src/PHPMailer.php');
require_once('../../enviadoremail/src/SMTP.php');
require_once('../../enviadoremail/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "conn.php";

$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'felicianoassociado@gmail.com';
    $mail->Password = '190781GF';
    $mail->Port = 587;

    $mail->setFrom('felicianoassociado@gmail.com', 'Feliciano Associados');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Seu Cadastro - FA';
    $mail->AddEmbeddedImage('../img/02.png', 'logo_ref');

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
        font-size: 28px;
        margin-top: 4%;
        margin-left: 4%;
        ">

        SEU CADASTRO

        </div>

    </div>

    <br>

    <div style="
        margin-top: 2%;
        font-size: 17px;
    ">

    Prezado(a) <?=$nome?> , seu cadastro foi realizado com sucesso! <br>
    Agradecemos pelo seu cadastro na nossa empresa. <br>
    Segue abaixo as informacoes para efetuar o login no nosso site felicianoassociados.com. <br><br>

    <strong> USERNAME </strong> <br><br> <?=$email?> <br> <br>
    <strong> SENHA </strong> <br><br> <?=$senha?> <br> <br>
    
    <strong style="
        font-size: 13px;
    ">*Não compartilhe essas informacoes com outras pessoas <br> Para maior segurança, mude sua senha apos efetuar o primeiro login.</strong>



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
            $mail->AltBody = 'Verifique seu cadastro';

            if($mail->send()) {
            } else {
                echo 'Email nao enviado';
            }
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>