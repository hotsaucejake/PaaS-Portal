<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php

if(isset($_GET['approve'])){
   $sql = 'UPDATE contract_billing
            SET 
            approved = 1
            WHERE id = ' . $_GET['approve'];
   $approve_user = $paas->db_query($sql);
   
   if($approve_user){
         $msg = '<h3>Approved!</h3>';
      } else {
       $msg = "<h3>You already approved this or this entry does not exist.</h3>";
      }
}

$sql = 'SELECT id, first_name, last_name, client_name, job_title, created, user_name, approved
         FROM contract_billing
         ORDER BY id DESC';

$cbforms = $paas->query($sql);