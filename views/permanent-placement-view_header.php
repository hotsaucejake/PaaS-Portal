<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php

if (isset($_GET['delete'])) {
   $sql = 'DELETE FROM `permanent_placement`
            WHERE ((`id` = \'' . $_GET['delete'] . '\'))';
   $delete_id = $paas->db_query($sql);
   if($delete_id){
      $msg = '<h3>This entry has been deleted.</h3>';
   } else {
    $msg = "<h3>You alread deleted this or this entry does not exist.</h3>";
   }
}

$sql = 'SELECT id, customer_name, customer_po, placement_name, position, created, user_name, approved
         FROM permanent_placement
         ORDER BY id DESC';

$ppforms = $paas->query($sql);