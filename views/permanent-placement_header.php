<?php
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
   $_POST['startDate'],
   $_POST['recruiter'],
   $_POST['salesRep'],
   $_POST['notes'],
   $_SESSION["user_name"]);

   if($insertPP){
    $msg = 'New Permanent Placemnt Form Submitted!';
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