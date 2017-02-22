<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';
require('classes/GridPDF.php');

if(isset($_GET['approve'])){
   $sql = 'UPDATE permanent_placement
            SET
            approved = 1
            WHERE id = ' . $_GET['approve'];
   $approve_user = $paas->db_query($sql);

   if($approve_user){
         $msg = '<h3>Approved!</h3>';

         $sql = 'SELECT *
                  FROM permanent_placement
                  WHERE id = ' . $_GET['approve'];
         $ppform = $paas->query($sql);

         $title = 'Permanent Placement Billing Request';
         $doc_id = $ppform[0]->id; // id #
         $un = $ppform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($ppform[0]->created)); // created date

         $pdf = new GridPDF();

         $pdfstring = $pdf->generatePPEmailPDF($ppform);

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
         $mail->addAddress('NewHireGrids@corus360.com');     // Add a recipient

         $mail->addStringAttachment($pdfstring, date('Y-m-d', strtotime($ppform[0]->created)) . '_PP_' . preg_replace('/\s+/', '', $ppform[0]->placement_name) . '.pdf');         // Add attachments
         $mail->Subject = $ppform[0]->placement_name . ' Permanent Placement Grid';
         $mail->Body    = '<strong>Start Date:</strong> ' . $ppform[0]->start_date;
         $mail->Body    .= '<br /> <strong>Position:</strong> ' . $ppform[0]->position;
         $mail->AltBody = 'Start Date: ' . $ppform[0]->start_date . ' and Position: ' . $ppform[0]->position;
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
   $sql = 'DELETE FROM `permanent_placement`
            WHERE ((`id` = \'' . $_GET['delete'] . '\'))';
   $delete_id = $paas->db_query($sql);
   if($delete_id){
      $msg = '<h3>This entry has been deleted.</h3>';
   } else {
    $msg = "<h3>You alread deleted this or this entry does not exist.</h3>";
   }
}

$sql = 'SELECT id, customer_name, customer_po, placement_name, position, created, user_name, approved
         FROM permanent_placement
         ORDER BY id DESC';

$ppforms = $paas->query($sql);