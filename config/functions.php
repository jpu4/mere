<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function contains($needle, $haystack) {
    return strpos($haystack, $needle) !== false;
}

function mailto($subject='',$message) {
    $statusMsg='';
    $config = new config;
    $mail = new PHPMailer;
    
    if ($config::$Mail_Type === "SMTP") {
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        //Set the hostname of the mail server
        $mail->Host = $config::$Mail_Host;
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = $config::$Mail_Port;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        //Username to use for SMTP authentication
        $mail->Username = $config::$Mail_Username;
        //Password to use for SMTP authentication
        $mail->Password = $config::$Mail_Password;
    } else {
        $mail->isSendmail();
    }
    
    $mail->setFrom($config::$Mail_Sendfrom);
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    $mail->addAddress($config::$Mail_SendTo);
    $mail->Subject = $subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);


    $mail->msgHTML($message);
    //Replace the plain text body with one created manually
    $mail->AltBody = strip_tags($message);
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        $statusMsg = 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        $statusMsg = 'Message sent!';
    }

    return $statusMsg;
} 


?>