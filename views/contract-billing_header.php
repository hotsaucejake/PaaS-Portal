<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">


<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';

$msg = array();
if(isset($_POST["newCB"])){
   $drugTest;
   foreach($_POST['drugTest'] as $selectedOption){
      $drugTest .= $selectedOption . ',';
   }

   $insertCB = $paas->contractBilling($_POST['candidateFirst'],
   $_POST['candidateMI'],
   $_POST['candidateLast'],
   $_POST['consultantCompany'],
   $_POST['candidatePhone'],
   $_POST['candidateEmail'],
   $_POST['candidateAddress'],
   $_POST['clientName'],
   $_POST['jobTitle'],
   $_POST['jobLocation'],
   $_POST['environment'],
   $_POST['hireType'],
   $_POST['contractRate'],
   $_POST['billRate'],
   $_POST['baseSalary'],
   $_POST['projectType'],
   $_POST['issuedHardware'],
   $_POST['corusEmail'],
   $_POST['backgroundCheck'],
   $_POST['traveling'],
   date('Y-m-d', strtotime($_POST['startDate'])),
   $_POST['contractPeriod'],
   $drugTest,
   // $_POST['drugTest'],
   $_POST['benefits'],
   $_POST['clientContact'],
   $_POST['hiringManager'],
   $_POST['hiringEmail'],
   $_POST['hiringPhone'],
   $_POST['recruiters'],
   $_POST['accountManager'],
   $_POST['notes'],
   $_SESSION["user_name"]);

   if($insertCB){
    $msg = 'New Contract Billing Form Submitted!';

    $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                  // Enable verbose debug output

      $mail->isSMTP();                         // Set mailer to use SMTP
      $mail->Host = SMTP_HOST;                 // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                  // Enable SMTP authentication
      $mail->Username = SMTP_USER;             // SMTP username
      $mail->Password = SMTP_PASS;             // SMTP password
      $mail->SMTPSecure = SMTP_SECURE;         // Enable TLS encryption, `ssl` also accepted
      $mail->Port = SMTP_PORT;                 // TCP port to connect to

      $mail->setFrom(KCOILE);
      $mail->addReplyTo(KCOILE);

      $mail->addAddress(KCOILE);              // Add a recipient
      $mail->addCC(JCROWDER);             // Add a recipient

      $mail->isHTML(true);                     // Set email format to HTML

      $mail->Subject = 'New Contract Billing Form Submitted';
      $mail->Body    = 'A new form is waiting your approval.  You can view the <a href="http://paas.corus360.com/index.php?page=contract-billing-view">new form here. </a>';
      $mail->AltBody = 'A new form is waiting your approval.  You can view the new form here: http://paas.corus360.com/index.php?page=contract-billing-view';

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          // echo 'Message has been sent';
      }

   } else {
      $msg['error'] = 'Did not execute!';
      $msg['username'] = $_SESSION["user_name"];
      $msg['candidateFirst'] = $_POST['candidateFirst'];
      $msg['candidateMI'] = $_POST['candidateMI'];
      $msg['candidateLast'] = $_POST['candidateLast'];
      $msg['consultantCompany'] = $_POST['consultantCompany'];
      $msg['candidatePhone'] = $_POST['candidatePhone'];
      $msg['candidateEmail'] = $_POST['candidateEmail'];
      $msg['candidateAddress'] = $_POST['candidateAddress'];
      $msg['clientName'] = $_POST['clientName'];
      $msg['jobTitle'] = $_POST['jobTitle'];
      $msg['jobLocation'] = $_POST['jobLocation'];
      $msg['environment'] = $_POST['environment'];
      $msg['hireType'] = $_POST['hireType'];
      $msg['contractRate'] = $_POST['contractRate'];
      $msg['billRate'] = $_POST['billRate'];
      $msg['baseSalary'] = $_POST['baseSalary'];
      $msg['projectType'] = $_POST['projectType'];
      $msg['issuedHardware'] = $_POST['issuedHardware'];
      $msg['corusEmail'] = $_POST['corusEmail'];
      $msg['backgroundCheck'] = $_POST['backgroundCheck'];
      $msg['traveling'] = $_POST['traveling'];
      $msg['startDate'] = $_POST['startDate'];
      $msg['contractPeriod'] = $_POST['contractPeriod'];
      $msg['drugTest'] = $_POST['drugTest'];
      $msg['benefits'] = $_POST['benefits'];
      $msg['clientContact'] = $_POST['clientContact'];
      $msg['hiringManager'] = $_POST['hiringManager'];
      $msg['hiringEmail'] = $_POST['hiringEmail'];
      $msg['hiringPhone'] = $_POST['hiringPhone'];
      $msg['recruiters'] = $_POST['recruiters'];
      $msg['accountManager'] = $_POST['accountManager'];
      $msg['notes'] = $_POST['notes'];

   }
}