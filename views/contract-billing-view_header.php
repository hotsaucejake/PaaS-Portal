<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php

$sql = 'SELECT id, first_name, last_name, client_name, job_title, created, user_name
         FROM contract_billing
         ORDER BY id DESC';

$cbforms = $paas->query($sql);