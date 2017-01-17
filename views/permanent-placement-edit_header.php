<?php
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