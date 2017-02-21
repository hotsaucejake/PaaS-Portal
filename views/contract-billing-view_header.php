<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';
require('classes/PDF.php');


if(isset($_GET['approve'])){
   $sql = 'UPDATE contract_billing
            SET
            approved = 1
            WHERE id = ' . $_GET['approve'];
   $approve_user = $paas->db_query($sql);

   if($approve_user){
         $msg = '<h3>Approved!</h3>';


         $mail = new PHPMailer;
         //$mail->SMTPDebug = 3;                  // Enable verbose debug output
         $mail->isSMTP();                         // Set mailer to use SMTP
         $mail->Host = SMTP_HOST;                 // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                  // Enable SMTP authentication
         $mail->Username = SMTP_USER;             // SMTP username
         $mail->Password = SMTP_PASS;             // SMTP password
         $mail->SMTPSecure = SMTP_SECURE;         // Enable TLS encryption, `ssl` also accepted
         $mail->Port = SMTP_PORT;                 // TCP port to connect to
         $mail->setFrom('jcrowder@corus360.com', 'Jakob Crowder');
         $mail->addReplyTo('jcrowder@corus360.com', 'Jakob Crowder');
         $mail->addAddress('jcrowder@corus360.com', 'Jakob Crowder');     // Add a recipient
         // $mail->addAddress('lczuper@corus360.com', 'Liz Czuper');     // Add a recipient
         // $mail->addAddress('kcoile@corus360.com');     // Add a recipient
         // $mail->addCC('cc@example.com');
         // $mail->addBCC('bcc@example.com');
         // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
         //$mail->addAttachment($pdf->Output(), 'new.pdf');    // Optional name
         $mail->isHTML(true);                                  // Set email format to HTML
         $mail->Subject = 'New Contract Billing Form Approved';
         $mail->Body    = 'You can view the <a href="http://paas.corus360.com/index.php?page=contract-billing-view">approved form here. </a>';
         $mail->AltBody = 'You can view the approved form here: http://paas.corus360.com/index.php?page=contract-billing-view';
         if(!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
             // echo 'Message has been sent';
         }





      } else {
       $msg = "<h3>You already approved this or this entry does not exist.</h3>";
      }
}

if (isset($_GET['delete'])) {
   $sql = 'DELETE FROM `contract_billing`
            WHERE ((`id` = \'' . $_GET['delete'] . '\'))';
   $delete_id = $paas->db_query($sql);
   if($delete_id){
      $msg = '<h3>This entry has been deleted.</h3>';
   } else {
    $msg = "<h3>You alread deleted this or this entry does not exist.</h3>";
   }
}

$sql = 'SELECT id, first_name, last_name, client_name, job_title, created, user_name, approved
         FROM contract_billing
         ORDER BY id DESC';

$cbforms = $paas->query($sql);