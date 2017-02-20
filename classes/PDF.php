<?php
require('classes/fpdf/fpdf.php');

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