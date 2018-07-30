<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">

<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';

$msg = array();
if(isset($_POST["newPP"])){

   $insertPP = $paas->permanentPlacement($_POST['customerName'],
   $_POST['apContact'],
   $_POST['apEmail'],
   $_POST['apPhone'],
   $_POST['customerPO'],
   $_POST['customerStatus'],
   $_POST['billAddress'],
   $_POST['placementName'],
   $_POST['placementEmail'],
   $_POST['placementPhone'],
   $_POST['position'],
   $_POST['salary'],
   $_POST['permFee'],
   $_POST['totalFee'],
   date('Y-m-d', strtotime($_POST['startDate'])),
   $_POST['recruiter'],
   $_POST['salesRep'],
   $_POST['notes'],
   $_SESSION["user_name"]);

   if($insertPP){
    $msg = 'New Permanent Placement Form Submitted!';

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

      // $mail->addAddress(KCOILE);               // Add a recipient
      $mail->addAddress(SKITE);               // Add a recipient
      $mail->addCC(JCROWDER);                  // Add a recipient
      $mail->addCC(KMILLER);                  // Add a recipient
      $mail->addCC(SMATHEWS);                  // Add a recipient
      $mail->addCC(DADAM);                  // Add a recipient

      $mail->isHTML(true);                     // Set email format to HTML

      $mail->Subject = 'New Permanent Placement Form Submitted';
      $mail->Body    = 'A new form is waiting your approval.  You can view the <a href="http://paas.corus360.com/index.php?page=permanent-placement-view">new form here. </a>';
      $mail->AltBody = 'A new form is waiting your approval.  You can view the new form here: http://paas.corus360.com/index.php?page=permanent-placement-view';

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          // echo 'Message has been sent';
      }


   } else {
      $msg['error'] = 'Did not execute!';
      $msg['username'] = $_SESSION["user_name"];
      $msg['customerName'] = $_POST['customerName'];
      $msg['apContact'] = $_POST['apContact'];
      $msg['apEmail'] = $_POST['apEmail'];
      $msg['apPhone'] = $_POST['apPhone'];
      $msg['customerPO'] = $_POST['customerPO'];
      $msg['customerStatus'] = $_POST['customerStatus'];
      $msg['billAddress'] = $_POST['billAddress'];
      $msg['placementName'] = $_POST['placementName'];
      $msg['placementEmail'] = $_POST['placementEmail'];
      $msg['placementPhone'] = $_POST['placementPhone'];
      $msg['position'] = $_POST['position'];
      $msg['salary'] = $_POST['salary'];
      $msg['permFee'] = $_POST['permFee'];
      $msg['totalFee'] = $_POST['totalFee'];
      $msg['startDate'] = $_POST['startDate'];
      $msg['recruiter'] = $_POST['recruiter'];
      $msg['salesRep'] = $_POST['salesRep'];
      $msg['notes'] = $_POST['notes'];
   }
}