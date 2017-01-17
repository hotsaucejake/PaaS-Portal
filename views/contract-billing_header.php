<?php
$msg = array();
if(isset($_POST["newCB"])){

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
   $_POST['issuedHardware'],
   $_POST['corusEmail'],
   $_POST['backgroundCheck'],
   $_POST['traveling'],
   $_POST['startDate'],
   $_POST['contractPeriod'],
   $_POST['drugTest'],
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
      $msg['issuedHardware'] = $_POST['issuedHardware'];
      $msg['corusEmail'] = $_POST['corusEmail'];
      $msg['backgroundCheck'] = $_POST['backgroundCheck'];
      $msg['traveling'] = $_POST['traveling'];
      $msg['startDate'] = $_POST['startDate'];
      $msg['contractPeriod'] = $_POST['contractPeriod'];
      $msg['drugTest'] = $_POST['drugTest'];
      $msg['clientContact'] = $_POST['clientContact'];
      $msg['hiringManager'] = $_POST['hiringManager'];
      $msg['hiringEmail'] = $_POST['hiringEmail'];
      $msg['hiringPhone'] = $_POST['hiringPhone'];
      $msg['recruiters'] = $_POST['recruiters'];
      $msg['accountManager'] = $_POST['accountManager'];
      $msg['notes'] = $_POST['notes'];
      
   }
}