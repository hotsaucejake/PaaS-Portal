<?php

// include the configs / constants for the database connection
require_once("config/config.php");

// load the login class
require_once("classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
   require_once('classes/PaaS.php');
   require('classes/GridPDF.php');
   $paas = new PaaS(DB_USER, DB_PASS, DB_NAME, DB_HOST);
   // Is this the ONLY call to the DB that I need?


   if(isset($_GET['form']) && isset($_GET['id'])){
      if($_GET['form'] == 'permanent-placement'){ // Permanent Placement Billing Request

         $sql = 'SELECT *
                  FROM permanent_placement
                  WHERE id = ' . $_GET['id'];
         $ppform = $paas->query($sql);

         $title = 'Permanent Placement Billing Request';
         $doc_id = $ppform[0]->id; // id #
         $un = $ppform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($ppform[0]->created)); // created date

         // Instanciation of inherited class
         $pdf = new GridPDF();
         $generatedPDF = $pdf->generatePPEmailPDF($ppform);
         $generatedPDF->Output();
      }
      elseif($_GET['form'] == 'contract-billing'){ // New Contractor Request

         $sql = 'SELECT *
                  FROM contract_billing
                  WHERE id = ' . $_GET['id'];
         $cbform = $paas->query($sql);

         $title = 'New Contractor Request';
         $doc_id = $cbform[0]->id; // id #
         $un = $cbform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($cbform[0]->created)); // created date


         // Instanciation of inherited class
         $pdf = new GridPDF();
         $generatedPDF = $pdf->generateCBEmailPDF($cbform);
         $generatedPDF->Output();
      }
      else {
         echo 'Error: unknown form ' . $_GET['form'];
      }
   }

} else { // the user is not logged in
   // load the registration class
   require_once("classes/Registration.php");
   // create the registration object. when this object is created, it will do all registration stuff automatically
   // so this single line handles the entire registration process.
   $registration = new Registration();
   include("login.php");
}