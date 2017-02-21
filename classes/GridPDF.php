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

}