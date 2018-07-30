<?php
require 'classes/PHPMailer/PHPMailerAutoload.php';

$msg = array();
if(isset($_POST["updateForm"]) && isset($_GET["update-id"])){

   $update_form = $paas->updatePermanentPlacement($_GET["update-id"],
   $_POST['customerName'],
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
   $_POST['startDate'],
   $_POST['recruiter'],
   $_POST['salesRep'],
   $_POST['notes']);

   if($update_form){
    $msg = 'Permanent Placement form updated!';

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
      $mail->Subject = 'Permanent Placement Form ID ' . $_GET["update-id"] . ' Updated';
      $mail->Body    = 'An updated form is waiting your approval (form ID ' . $_GET["update-id"] . ').
                        You can view the <a href="http://paas.corus360.com/index.php?page=permanent-placement-view">new form here. </a>';
      $mail->AltBody = 'An updated form is waiting your approval (form ID ' . $_GET["update-id"] . ').
                        You can view the new form here: http://paas.corus360.com/index.php?page=permanent-placement-view';
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
            FROM permanent_placement
            WHERE id = " . $_GET["id"];
   $pp_form = $paas->query($sql);
} else {
   $msg['error'] = 'Did not execute!';
}