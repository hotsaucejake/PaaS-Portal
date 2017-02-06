<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">

<?php
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
   $_POST['clientContact'],
   $_POST['hiringManager'],
   $_POST['hiringEmail'],
   $_POST['hiringPhone'],
   $_POST['recruiters'],
   $_POST['accountManager'],
   $_POST['notes']);

   if($update_form){
    $msg = 'Contract Billing form updated!';
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