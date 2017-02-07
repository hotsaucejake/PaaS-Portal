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
   require_once('classes/mpdf/vendor/autoload.php');
   $paas = new PaaS(DB_USER, DB_PASS, DB_NAME, DB_HOST);
   // Is this the ONLY call to the DB that I need?
   


   if(isset($_GET['form']) && isset($_GET['id'])){
      if($_GET['form'] == 'permanent-placement'){ // Permanent Placement Billing Request
         $title = 'Permanent Placement Billing Request';
         
         $sql = 'SELECT *
                  FROM permanent_placement
                  WHERE id = ' . $_GET['id'];
         $ppform = $paas->query($sql);

         // $ppform[0]->id
         // $ppform[0]->customer_name
         // $ppform[0]->ap_contact
         // $ppform[0]->ap_email
         // $ppform[0]->ap_phone
         // $ppform[0]->customer_po
         // $ppform[0]->customer_status
         // $ppform[0]->bill_address
         // $ppform[0]->placement_name
         // $ppform[0]->placement_email
         // $ppform[0]->placement_phone
         // $ppform[0]->position
         // $ppform[0]->salary
         // $ppform[0]->perm_fee
         // $ppform[0]->total_fee
         // $ppform[0]->start_date
         // $ppform[0]->recruiter
         // $ppform[0]->sales_rep
         // $ppform[0]->special_notes
         // $ppform[0]->created
         // $ppform[0]->user_name

      } 
      elseif($_GET['form'] == 'contract-billing'){ // New Contractor Request
         $title = 'Permanent Placement Billing Request';
         
         $sql = 'SELECT *
                  FROM contract_billing
                  WHERE id = ' . $_GET['id'];
         $cbform = $paas->query($sql);
         
         // $cbform[0]->id
         // $cbform[0]->first_name
         // $cbform[0]->mi
         // $cbform[0]->last_name
         // $cbform[0]->consultant_company
         // $cbform[0]->phone
         // $cbform[0]->email
         // $cbform[0]->address
         // $cbform[0]->client_name
         // $cbform[0]->job_title
         // $cbform[0]->job_location
         // $cbform[0]->environment
         // $cbform[0]->hire_type
         // $cbform[0]->contract_rate
         // $cbform[0]->bill_rate
         // $cbform[0]->base_salary
         // $cbform[0]->issued_hardware
         // $cbform[0]->corus_email
         // $cbform[0]->background_check
         // $cbform[0]->travel_reporting
         // $cbform[0]->start_date
         // $cbform[0]->contract_period
         // $cbform[0]->drug_test
         // $cbform[0]->client_contact
         // $cbform[0]->manager
         // $cbform[0]->manager_email
         // $cbform[0]->manager_phone
         // $cbform[0]->recruiter
         // $cbform[0]->account_manager
         // $cbform[0]->notes
         // $cbform[0]->user_name
         // $cbform[0]->created
         
         
         $mpdf = new mPDF();
         $stylesheet = file_get_contents('pdf/css/mpdfstyletables.css');
         $mpdf->WriteHTML($stylesheet,1);
         
         $html = file_get_contents('pdf/index.html');
         $mpdf->WriteHTML($html, 2);
         
         $mpdf->Output();
         
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