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
          global $doc_id; // id #
          global $un; // user_name
          global $created; // created date
          // Position at 1.5 cm from bottom
          $this->SetY(-15);
          // Arial italic 8
          $this->SetFont('Arial','I',8);
          // Page number
          $this->Cell(0,10, $doc_id . '_' . $un . '_' . $created,0,0,'C');
          $this->Ln(5);
          $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,1,'C');
      }
   }


   if(isset($_GET['form']) && isset($_GET['id'])){
      if($_GET['form'] == 'permanent-placement'){ // Permanent Placement Billing Request
         $title = 'Permanent Placement Billing Request';

         $sql = 'SELECT *
                  FROM permanent_placement
                  WHERE id = ' . $_GET['id'];
         $ppform = $paas->query($sql);

         $doc_id = $ppform[0]->id; // id #
         $un = $ppform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($ppform[0]->created)); // created date

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
         $title = 'New Contractor Request';

         $sql = 'SELECT *
                  FROM contract_billing
                  WHERE id = ' . $_GET['id'];
         $cbform = $paas->query($sql);

         $doc_id = $cbform[0]->id; // id #
         $un = $cbform[0]->user_name; // user_name
         $created = date('Y-m-d', strtotime($cbform[0]->created)); // created date


         // Instanciation of inherited class
         $pdf = new PDF();
         $pdf->AliasNbPages();
         $pdf->AddPage();
         $pdf->SetFont('Arial','B',14);
         $pdf->Cell(0, 10, 'Candidate Info', 0, 1, 'C');

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'First Name: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(50, 10, $cbform[0]->first_name, 0, 0);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(10, 10, 'MI:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(30, 10, $cbform[0]->mi, 0, 0);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Last Name:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->last_name, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(60, 10, 'Consultant Company Name: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->consultant_company, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Phone: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(30, 10, $cbform[0]->phone, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Email: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(60, 10, $cbform[0]->email, 0, 0);

         $pdf->Ln(10);

         $pdf->Line(10, 90, 200, 90);

         $pdf->SetFont('Arial','B',14);
         $pdf->Cell(0, 10, 'Position Details', 0, 1, 'C');

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Company/Client Name: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(70, 10, $cbform[0]->client_name, 0, 0);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(20, 10, 'Job Title: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->job_title, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Environment: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->environment == "onsite") {
            $pdf->Cell(80, 10, "Onsite", 0, 0);
         } elseif ($cbform[0]->environment == "remote") {
            $pdf->Cell(80, 10, "Remote", 0, 0);
         } elseif ($cbform[0]->environment == "both") {
            $pdf->Cell(80, 10, "Both", 0, 0);
         } else {
            $pdf->Cell(80, 10, $cbform[0]->environment, 0, 0);
         }


         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, ' Job Location:', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->MultiCell(0, 6, $cbform[0]->job_location, 0, 'L');

         $pdf->Ln(10);

         $pdf->SetXY(10,120);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Hire Type: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->hire_type == "corp") {
            $pdf->Cell(50, 10, "Corp to Corp", 0, 0);
         } else {
            $pdf->Cell(50, 10, $cbform[0]->hire_type, 0, 0);
         }


         $pdf->SetXY(10,135);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Contract Rate: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(60, 10, $cbform[0]->contract_rate, 0, 0);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Project Type: ', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->project_type == "aug") {
            $pdf->Cell(0, 10, "Staff Augmentation", 0, 0);
         } elseif ($cbform[0]->project_type == "sow") {
            $pdf->Cell(0, 10, "SOW", 0, 0);
         } else {
            $pdf->Cell(0, 10, $cbform[0]->project_type, 0, 0);
         }


         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Bill Rate: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(60, 10, $cbform[0]->bill_rate, 0, 0);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Issued Hardware: ', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->issued_hardware == "corus360") {
            $pdf->Cell(0, 10, "Corus360", 0, 0);
         } elseif ($cbform[0]->issued_hardware == "client") {
            $pdf->Cell(0, 10, "Client", 0, 0);
         } elseif ($cbform[0]->issued_hardware == "none") {
            $pdf->Cell(0, 10, "NA", 0, 0);
         } else {
            $pdf->Cell(0, 10, $cbform[0]->issued_hardware, 0, 0);
         }


         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Base Salary: ', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(60, 10, $cbform[0]->base_salary, 0, 0);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Corus360 Email?', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->corus_email == 0) {
            $pdf->Cell(0, 10, "No", 0, 0);
         } elseif ($cbform[0]->corus_email == 1) {
            $pdf->Cell(0, 10, "Yes", 0, 0);
         } else {
            $pdf->Cell(0, 10, $cbform[0]->corus_email, 0, 0);
         }


         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Background Check:', 0, 0);
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->background_check == "y") {
            $pdf->Cell(40, 10, "Yes", 0, 0);
         } elseif ($cbform[0]->background_check == "n") {
            $pdf->Cell(40, 10, "No", 0, 0);
         } elseif ($cbform[0]->background_check == "c") {
            $pdf->Cell(40, 10, "Completed", 0, 0);
         } else {
            $pdf->Cell(40, 10, $cbform[0]->background_check, 0, 0);
         }

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Expense Reporting', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         if ($cbform[0]->travel_reporting == 0) {
            $pdf->Cell(0, 10, "No", 0, 0);
         } elseif ($cbform[0]->travel_reporting == 1) {
            $pdf->Cell(0, 10, "Yes", 0, 0);
         } else {
            $pdf->Cell(0, 10, $cbform[0]->travel_reporting, 0, 0);
         }

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Start Date:', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(40, 10, $cbform[0]->start_date, 0, 0);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Drug Test:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
            $drug_string;
            $dtests = explode(",", $cbform[0]->drug_test);
            foreach ($dtests as $dtest) {
               if ($dtest == "no") { $drug_string .= "No, "; }
               if ($dtest == "p5") { $drug_string .= "Panel 5, "; }
               if ($dtest == "p9") { $drug_string .= "Panel 9, "; }
               if ($dtest == "p10") { $drug_string .= "Panel 10, "; }
               if ($dtest == "p11") { $drug_string .= "Panel 11, "; }
               if ($dtest == "other") { $drug_string .= "Other, "; }
            }
            $drug_string = rtrim($drug_string, ", ");
         $pdf->Cell(0, 10, $drug_string, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(50, 10, 'Contract Period:', 0, 0);
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(40, 10, $cbform[0]->contract_period, 0, 0);

         $pdf->Ln(10);

         $pdf->Line(10, 195, 200, 195);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Client Contact:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->client_contact, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Hiring Manager / Timesheet Approver:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->manager, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Hiring Manager / Timesheet Approver Email:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->manager_email, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Hiring Manager / Timesheet Approver Phone:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->manager_phone, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Recruiter(s):', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->recruiter, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Account Manager:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0, 10, $cbform[0]->account_manager, 0, 0);

         $pdf->Ln(10);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(100, 10, 'Notes:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->MultiCell(0, 6, $cbform[0]->notes, 0);

         $pdf->SetXY(100,70);

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(30, 10, 'Address:', 0, 0, 'R');
         $pdf->SetFont('Arial','',12);
         $pdf->MultiCell(0, 6, $cbform[0]->address, 0, 'L');

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