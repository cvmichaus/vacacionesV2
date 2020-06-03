    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    require("../PHPMailer-master/src/PHPMailer.php");
    require("../PHPMailer-master/src/SMTP.php");
    require("../PHPMailer-master/src/Exception.php");
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'recursos.humanos@wri.org';
    $mail->Password = 'WRIm3x1c086!';
    $mail->setFrom('recursos.humanos@wri.org', 'RH');
    //$mail->addReplyTo('reply-box@hostinger-tutorials.com', 'Your Name');
    $mail->addAddress('alejandro.lopez@wri.org', 'Alejandro Lopez');
    $mail->Subject = 'Alta en el Sistema de Solicitud de Vacaciones WRI';
    //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
    $mail->AltBody = 'This is a plain text message body';
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
    ?>