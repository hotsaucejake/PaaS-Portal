<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                  // Enable verbose debug output

$mail->isSMTP();                         // Set mailer to use SMTP
$mail->Host = SMTP_HOST;                 // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                  // Enable SMTP authentication
$mail->Username = SMTP_USER;             // SMTP username
$mail->Password = SMTP_PASS;             // SMTP password
$mail->SMTPSecure = SMTP_SECURE;         // Enable TLS encryption, `ssl` also accepted
$mail->Port = SMTP_PORT;                 // TCP port to connect to

$mail->setFrom($_SESSION['user_email']);
$mail->addReplyTo($_SESSION['user_email']);
$mail->addAddress('jcrowder@corus360.com', 'Jakob Crowder');     // Add a recipient

// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'Message has been sent';
}