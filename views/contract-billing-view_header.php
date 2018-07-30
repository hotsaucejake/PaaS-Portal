<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';
require('classes/GridPDF.php');


if(isset($_GET['approve'])){
   $sql = 'UPDATE contract_billing
            SET
            approved = 1
            WHERE id = ' . $_GET['approve'];
   $approve_user = $paas->db_query($sql);

   if($approve_user){
         $msg = '<h3>Approved!</h3>';


         $sql = 'SELECT *
         FROM contract_billing
         WHERE id = ' . $_GET['approve'];
         $cbform = $paas->query($sql);

         $title = 'New Contractor Request';
         $doc_id = $cbform[0]->id; // id #
         $un = $cbform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($cbform[0]->created)); // created date

         $pdf = new GridPDF();

         $generatedPDF = $pdf->generateCBEmailPDF($cbform);
         $pdfstring = $generatedPDF->Output("", "S");

         $mail = new PHPMailer;
         //$mail->SMTPDebug = 3;                  // Enable verbose debug output
         $mail->isSMTP();                         // Set mailer to use SMTP
         $mail->Host = SMTP_HOST;                 // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                  // Enable SMTP authentication
         $mail->Username = SMTP_USER;             // SMTP username
         $mail->Password = SMTP_PASS;             // SMTP password
         $mail->SMTPSecure = SMTP_SECURE;         // Enable TLS encryption, `ssl` also accepted
         $mail->Port = SMTP_PORT;                 // TCP port to connect to

         $mail->setFrom(SKITE);
         $mail->addReplyTo(SKITE);

         $mail->addAddress(NEWHIREGRIDS);          // Add a recipient
         $mail->addCC(JCROWDER);              // Add a recipient
         $mail->addCC(DADAM);                  // Add a recipient

         $stringAttachment = date('Y-m-d', strtotime($cbform[0]->created));
         $stringAttachment .= '_CB_';
         $stringAttachment .= preg_replace('/\s+/', '', $cbform[0]->first_name);
         $stringAttachment .= preg_replace('/\s+/', '', $cbform[0]->last_name);
         $stringAttachment .= '_';
         $stringAttachment .= preg_replace('/\s+/', '', $cbform[0]->client_name);
         $stringAttachment .= '.pdf';

         $mail->addStringAttachment($pdfstring, $stringAttachment);         // Add attachments
         $mail->Subject = $cbform[0]->first_name . ' ' . $cbform[0]->last_name . ' Contract Billing Grid';
         $mail->Body    = '<strong>Start Date:</strong> ' . $cbform[0]->start_date;
         $mail->Body    .= '<br /> <strong>Background Check:</strong> ' . $cbform[0]->background_check;
         $mail->Body    .= '<br /> <strong>Drug Test:</strong> ' . substr($cbform[0]->drug_test, 0, -1);
         $mail->Body    .= '<br /><br /> <strong>Notes:</strong> ' . nl2br($cbform[0]->notes);
         $mail->AltBody = 'Start Date: ' . $cbform[0]->start_date;
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