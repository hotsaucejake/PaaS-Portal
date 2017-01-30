<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php

$sql = 'SELECT id, customer_name, customer_po, placement_name, position, created, user_name, approved
         FROM permanent_placement
         ORDER BY id DESC';

$ppforms = $paas->query($sql);