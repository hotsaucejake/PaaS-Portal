<?php
require('classes/fpdf/fpdf.php');

class GridPDF extends FPDF
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

   function generatePPEmailPDF($ppform){

      $this->AliasNbPages();
      $this->AddPage();

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(40, 10, 'Customer Name: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(65, 10, $ppform[0]->customer_name, 0, 0);
      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Customer:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      if ($ppform[0]->customer_status == 0) {
         $this->Cell(55, 10, "New", 0, 0);
      } elseif ($ppform[0]->customer_status == 1) {
         $this->Cell(55, 10, "Existing", 0, 0);
      } else {
         $this->Cell(55, 10, $ppform[0]->customer_status, 0, 0);
      }

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(40, 10, 'AP Contact: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(65, 10, $ppform[0]->ap_contact, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(40, 10, 'AP Email: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(65, 10, $ppform[0]->ap_email, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(40, 10, 'AP Phone: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(65, 10, $ppform[0]->ap_phone, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(40, 10, 'Customer PO#: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(65, 10, $ppform[0]->customer_po, 0, 0);

      $this->SetXY(115,70);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Address:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->MultiCell(0, 6, $ppform[0]->bill_address, 0, 'L');

      $this->Line(10, 110, 200, 110);

      $this->SetXY(10,115);

      $this->SetFont('Arial','B',14);
      $this->Cell(0, 10, 'Placement Info', 0, 0, 'C');

      $this->Ln(15);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Placement Name:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->placement_name, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Placement Email:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->placement_email, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Placement Phone:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->placement_phone, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Position:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->position, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Salary:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->salary, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Perm Fee:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->perm_fee, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Total Fee:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->total_fee, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Start Date:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, date('m-d-Y', strtotime($ppform[0]->start_date)), 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Recruiter:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->recruiter, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Corus360 Sales Rep:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $ppform[0]->sales_rep, 0, 0, 'L');

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Special Notes:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->MultiCell(0, 6, $ppform[0]->special_notes, 0, 'L');

      return $this->Output("", "S");
   }

   function generateCBEmailPDF($cbform){

      $this->AliasNbPages();
      $this->AddPage();
      $this->SetFont('Arial','B',14);
      $this->Cell(0, 10, 'Candidate Info', 0, 1, 'C');

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'First Name: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(50, 10, $cbform[0]->first_name, 0, 0);
      $this->SetFont('Arial','B',12);
      $this->Cell(10, 10, 'MI:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(30, 10, $cbform[0]->mi, 0, 0);
      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Last Name:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->last_name, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(60, 10, 'Consultant Company Name: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->consultant_company, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Phone: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(30, 10, $cbform[0]->phone, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Email: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(60, 10, $cbform[0]->email, 0, 0);

      $this->Ln(10);

      $this->Line(10, 90, 200, 90);

      $this->SetFont('Arial','B',14);
      $this->Cell(0, 10, 'Position Details', 0, 1, 'C');

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Company/Client Name: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(70, 10, $cbform[0]->client_name, 0, 0);

      $this->SetFont('Arial','B',12);
      $this->Cell(20, 10, 'Job Title: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->job_title, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Environment: ', 0, 0);
      $this->SetFont('Arial','',10);
      if ($cbform[0]->environment == "onsite") {
         $this->Cell(80, 10, "Onsite", 0, 0);
      } elseif ($cbform[0]->environment == "remote") {
         $this->Cell(80, 10, "Remote", 0, 0);
      } elseif ($cbform[0]->environment == "both") {
         $this->Cell(80, 10, "Both", 0, 0);
      } else {
         $this->Cell(80, 10, $cbform[0]->environment, 0, 0);
      }


      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, ' Job Location:', 0, 0);
      $this->SetFont('Arial','',10);
      $this->MultiCell(0, 6, $cbform[0]->job_location, 0, 'L');

      $this->Ln(10);

      $this->SetXY(10,120);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Hire Type: ', 0, 0);
      $this->SetFont('Arial','',10);
      if ($cbform[0]->hire_type == "corp") {
         $this->Cell(50, 10, "Corp to Corp", 0, 0);
      } else {
         $this->Cell(50, 10, $cbform[0]->hire_type, 0, 0);
      }


      $this->SetXY(10,135);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Contract Rate: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(60, 10, $cbform[0]->contract_rate, 0, 0);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Project Type: ', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      if ($cbform[0]->project_type == "aug") {
         $this->Cell(0, 10, "Staff Augmentation", 0, 0);
      } elseif ($cbform[0]->project_type == "sow") {
         $this->Cell(0, 10, "SOW", 0, 0);
      } else {
         $this->Cell(0, 10, $cbform[0]->project_type, 0, 0);
      }


      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Bill Rate: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(60, 10, $cbform[0]->bill_rate, 0, 0);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Issued Hardware: ', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      if ($cbform[0]->issued_hardware == "corus360") {
         $this->Cell(0, 10, "Corus360", 0, 0);
      } elseif ($cbform[0]->issued_hardware == "client") {
         $this->Cell(0, 10, "Client", 0, 0);
      } elseif ($cbform[0]->issued_hardware == "none") {
         $this->Cell(0, 10, "NA", 0, 0);
      } else {
         $this->Cell(0, 10, $cbform[0]->issued_hardware, 0, 0);
      }


      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Base Salary: ', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(60, 10, $cbform[0]->base_salary, 0, 0);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Corus360 Email?', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      if ($cbform[0]->corus_email == 0) {
         $this->Cell(0, 10, "No", 0, 0);
      } elseif ($cbform[0]->corus_email == 1) {
         $this->Cell(0, 10, "Yes", 0, 0);
      } else {
         $this->Cell(0, 10, $cbform[0]->corus_email, 0, 0);
      }


      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Background Check:', 0, 0);
      $this->SetFont('Arial','',10);
      if ($cbform[0]->background_check == "y") {
         $this->Cell(40, 10, "Yes", 0, 0);
      } elseif ($cbform[0]->background_check == "n") {
         $this->Cell(40, 10, "No", 0, 0);
      } elseif ($cbform[0]->background_check == "c") {
         $this->Cell(40, 10, "Completed", 0, 0);
      } else {
         $this->Cell(40, 10, $cbform[0]->background_check, 0, 0);
      }

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Expense Reporting', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      if ($cbform[0]->travel_reporting == 0) {
         $this->Cell(0, 10, "No", 0, 0);
      } elseif ($cbform[0]->travel_reporting == 1) {
         $this->Cell(0, 10, "Yes", 0, 0);
      } else {
         $this->Cell(0, 10, $cbform[0]->travel_reporting, 0, 0);
      }

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Start Date:', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(40, 10, date('m-d-Y', strtotime($cbform[0]->start_date)), 0, 0);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Drug Test:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
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
      $this->Cell(0, 10, $drug_string, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(50, 10, 'Contract Period:', 0, 0);
      $this->SetFont('Arial','',10);
      $this->Cell(40, 10, $cbform[0]->contract_period, 0, 0);

      $this->Ln(10);

      $this->Line(10, 195, 200, 195);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Client Contact:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->client_contact, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Hiring Manager / Timesheet Approver:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->manager, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Hiring Manager / Timesheet Approver Email:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->manager_email, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Hiring Manager / Timesheet Approver Phone:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->manager_phone, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Recruiter(s):', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->recruiter, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Account Manager:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->Cell(0, 10, $cbform[0]->account_manager, 0, 0);

      $this->Ln(10);

      $this->SetFont('Arial','B',12);
      $this->Cell(100, 10, 'Notes:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->MultiCell(0, 6, $cbform[0]->notes, 0);

      $this->SetXY(100,70);

      $this->SetFont('Arial','B',12);
      $this->Cell(30, 10, 'Address:', 0, 0, 'R');
      $this->SetFont('Arial','',10);
      $this->MultiCell(0, 6, $cbform[0]->address, 0, 'L');

      return $this->Output("", "S");
   }

}