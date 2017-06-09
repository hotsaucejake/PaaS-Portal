<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">

<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';


$msg = array();
if(isset($_POST["updateForm"]) && isset($_GET["update-id"])){
   $drugTest;
   foreach($_POST['drugTest'] as $selectedOption){
      $drugTest .= $selectedOption . ',';
   }

   $update_form = $paas->updateContractBilling($_GET["update-id"],
   $_POST['candidateFirst'],
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
   $_POST['benefits'],
   $_POST['clientContact'],
   $_POST['hiringManager'],
   $_POST['hiringEmail'],
   $_POST['hiringPhone'],
   $_POST['recruiters'],
   $_POST['accountManager'],
   $_POST['notes']);

   if($update_form){
    $msg = 'Contract Billing form updated!';

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

      $mail->addAddress(KCOILE);               // Add a recipient
      $mail->addAddress(SKITE);               // Add a recipient
      $mail->addCC(JCROWDER);                  // Add a recipient
      //$mail->addCC(SMATHEWS);                  // Add a recipient
      $mail->isHTML(true);                     // Set email format to HTML
      $mail->Subject = 'Contract Billing Form ID ' . $_GET["update-id"] . ' Updated';
      $mail->Body    = 'An updated form is waiting your approval (form ID ' . $_GET["update-id"] . ').
                        You can view the <a href="http://paas.corus360.com/index.php?page=contract-billing-view">new form here. </a>';
      $mail->AltBody = 'An updated form is waiting your approval (form ID ' . $_GET["update-id"] . ').
                        You can view the new form here: http://paas.corus360.com/index.php?page=contract-billing-view';
      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          // echo 'Message has been sent';
      }






   } else {
    $msg['error'] = 'Did not execute!';
    $msg['username'] = $_SESSION["user_name"];
   }
} elseif(isset($_GET["id"])){
   $sql = "SELECT *
            FROM contract_billing
            WHERE id = " . $_GET["id"];
   $cb_form = $paas->query($sql);
} else {
   $msg['error'] = 'Did not execute!';
}