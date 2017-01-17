<?php
$msg = array();
if(isset($_POST["updateForm"]) && isset($_GET["update-id"])){

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