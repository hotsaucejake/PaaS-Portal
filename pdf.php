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
   require('classes/fpdf/fpdf.php');
   $paas = new PaaS(DB_USER, DB_PASS, DB_NAME, DB_HOST);
   // Is this the ONLY call to the DB that I need?
   class PDF extends FPDF
   {
      // Page header
      function Header()
      {
          global $title;
          // Logo
          $this->Image('img/corus360.png',88,6, -600);
          // Arial bold 15
          $this->SetFont('Arial','B',18);
          // Line break
          $this->Ln(15);
          // Title
          $this->Cell(190,10,$title,0,0,'C');
          // Line break
          $this->Ln(15);
      }

      // Page footer
      function Footer()
      {
          // Position at 1.5 cm from bottom
          $this->SetY(-15);
          // Arial italic 8
          $this->SetFont('Arial','I',8);
          // Page number
          $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
   }


   if(isset($_GET['form']) && isset($_GET['id'])){
      if($_GET['form'] == 'permanent-placement'){ // Permanent Placement Billing Request
         $title = 'Permanent Placement Billing Request';
         
         $sql = 'SELECT *
                  FROM permanent_placement
                  WHERE id = ' . $_GET['id'];
         $ppform = $paas->query($sql);
         
         // Instanciation of inherited class
         $pdf = new PDF();
         $pdf->AliasNbPages();
         $pdf->AddPage();
         $pdf->SetFont('Arial','',12);

         $pdf->Cell(0, 10, 'id: ' . $ppform[0]->id, 0, 1);
         $pdf->Cell(0, 10, 'customer_name: ' . $ppform[0]->customer_name, 0, 1);
         $pdf->Cell(0, 10, 'ap_contact: ' . $ppform[0]->ap_contact, 0, 1);
         $pdf->Cell(0, 10, 'ap_email: ' . $ppform[0]->ap_email, 0, 1);
         $pdf->Cell(0, 10, 'ap_phone: ' . $ppform[0]->ap_phone, 0, 1);
         $pdf->Cell(0, 10, 'customer_po: ' . $ppform[0]->customer_po, 0, 1);
         $pdf->Cell(0, 10, 'customer_status: ' . $ppform[0]->customer_status, 0, 1);
         $pdf->Cell(0, 10, 'bill_address: ' . $ppform[0]->bill_address, 0, 1);
         $pdf->Cell(0, 10, 'placement_name: ' . $ppform[0]->placement_name, 0, 1);
         $pdf->Cell(0, 10, 'placement_email: ' . $ppform[0]->placement_email, 0, 1);
         $pdf->Cell(0, 10, 'placement_phone: ' . $ppform[0]->placement_phone, 0, 1);
         $pdf->Cell(0, 10, 'position: ' . $ppform[0]->position, 0, 1);
         $pdf->Cell(0, 10, 'salary: ' . $ppform[0]->salary, 0, 1);
         $pdf->Cell(0, 10, 'perm_fee: ' . $ppform[0]->perm_fee, 0, 1);
         $pdf->Cell(0, 10, 'total_fee: ' . $ppform[0]->total_fee, 0, 1);
         $pdf->Cell(0, 10, 'start_date: ' . $ppform[0]->start_date, 0, 1);
         $pdf->Cell(0, 10, 'recruiter: ' . $ppform[0]->recruiter, 0, 1);
         $pdf->Cell(0, 10, 'sales_rep: ' . $ppform[0]->sales_rep, 0, 1);
         $pdf->Cell(0, 10, 'special_notes: ' . $ppform[0]->special_notes, 0, 1);
         $pdf->Cell(0, 10, 'created: ' . $ppform[0]->created, 0, 1);
         $pdf->Cell(0, 10, 'user_name: ' . $ppform[0]->user_name, 0, 1);
         
         $pdf->Output();
      } 
      elseif($_GET['form'] == 'contract-billing'){ // New Contractor Request
         $title = 'Permanent Placement Billing Request';
         
         $sql = 'SELECT *
                  FROM contract_billing
                  WHERE id = ' . $_GET['id'];
         $cbform = $paas->query($sql);
         
         // Instanciation of inherited class
         $pdf = new PDF();
         $pdf->AliasNbPages();
         $pdf->AddPage();
         $pdf->SetFont('Arial','',12);

         $pdf->Cell(0, 10, 'id: ' . $cbform[0]->id, 0, 1);
         $pdf->Cell(0, 10, 'first_name: ' . $cbform[0]->first_name, 0, 1);
         $pdf->Cell(0, 10, 'mi: ' . $cbform[0]->mi, 0, 1);
         $pdf->Cell(0, 10, 'last_name: ' . $cbform[0]->last_name, 0, 1);
         $pdf->Cell(0, 10, 'consultant_company: ' . $cbform[0]->consultant_company, 0, 1);
         $pdf->Cell(0, 10, 'phone: ' . $cbform[0]->phone, 0, 1);
         $pdf->Cell(0, 10, 'email: ' . $cbform[0]->email, 0, 1);
         $pdf->Cell(0, 10, 'address: ' . $cbform[0]->address, 0, 1);
         $pdf->Cell(0, 10, 'client_name: ' . $cbform[0]->client_name, 0, 1);
         $pdf->Cell(0, 10, 'job_title: ' . $cbform[0]->job_title, 0, 1);
         $pdf->Cell(0, 10, 'job_location: ' . $cbform[0]->job_location, 0, 1);
         $pdf->Cell(0, 10, 'environment: ' . $cbform[0]->environment, 0, 1);
         $pdf->Cell(0, 10, 'hire_type: ' . $cbform[0]->hire_type, 0, 1);
         $pdf->Cell(0, 10, 'contract_rate: ' . $cbform[0]->contract_rate, 0, 1);
         $pdf->Cell(0, 10, 'bill_rate: ' . $cbform[0]->bill_rate, 0, 1);
         $pdf->Cell(0, 10, 'base_salary: ' . $cbform[0]->base_salary, 0, 1);
         $pdf->Cell(0, 10, 'issued_hardware: ' . $cbform[0]->issued_hardware, 0, 1);
         $pdf->Cell(0, 10, 'corus_email: ' . $cbform[0]->corus_email, 0, 1);
         $pdf->Cell(0, 10, 'background_check: ' . $cbform[0]->background_check, 0, 1);
         $pdf->Cell(0, 10, 'travel_reporting: ' . $cbform[0]->travel_reporting, 0, 1);
         $pdf->Cell(0, 10, 'start_date: ' . $cbform[0]->start_date, 0, 1);
         $pdf->Cell(0, 10, 'contract_period: ' . $cbform[0]->contract_period, 0, 1);
         $pdf->Cell(0, 10, 'drug_test: ' . $cbform[0]->drug_test, 0, 1);
         $pdf->Cell(0, 10, 'client_contact: ' . $cbform[0]->client_contact, 0, 1);
         $pdf->Cell(0, 10, 'manager: ' . $cbform[0]->manager, 0, 1);
         $pdf->Cell(0, 10, 'manager_email: ' . $cbform[0]->manager_email, 0, 1);
         $pdf->Cell(0, 10, 'manager_phone: ' . $cbform[0]->manager_phone, 0, 1);
         $pdf->Cell(0, 10, 'recruiter: ' . $cbform[0]->recruiter, 0, 1);
         $pdf->Cell(0, 10, 'account_manager: ' . $cbform[0]->account_manager, 0, 1);
         $pdf->Cell(0, 10, 'notes: ' . $cbform[0]->notes, 0, 1);
         $pdf->Cell(0, 10, 'user_name: ' . $cbform[0]->user_name, 0, 1);
         $pdf->Cell(0, 10, 'created: ' . $cbform[0]->created, 0, 1);
         
         
         $pdf->Output();
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