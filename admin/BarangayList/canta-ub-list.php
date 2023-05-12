<?php
require('fpdf.php');
require('1.Generatedbconnection.php');

class PDF extends FPDF {
    private $count = 0;

    function Header() {
        $this->SetFont('Arial', 'B', 10);
        $this->SetMargins(5, 10, 10);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(0, 5, 'PROVINCE of BOHOL', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'MUNICIPALITY OF SIERRA BULLONES', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'BARANGAY FEDERATED SENIOR CITIZENS ASSOCIATION', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'BARANGAY CANTA-UB', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'As of _________________20____', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 9);
        $this->Cell(8, 10, 'No.', 1, 0, 'C');
        $this->Cell(25, 10, 'FAMILY NAME', 1, 0, 'C');
        $this->Cell(25, 10, 'FIRST NAME', 1, 0, 'C');
        $this->Cell(25, 10, 'MIDDLE NAME', 1, 0, 'C');
        $this->Cell(25, 5, 'NICK NAME', 1, 0, 'C');
        $this->Cell(15, 10, 'GENDER', 1, 0, 'C');
        $this->Cell(25, 5, 'DATE OF BIRTH', 1, 0, 'C');
        $this->Cell(10, 10, 'AGE', 1, 0, 'C');
        $this->Cell(45, 5, 'ADDRESS', 1, 0, 'C');
        $this->Cell(20, 10, 'OSCA ID', 1, 0, 'C');
        $this->Cell(32, 5, 'DATE REGISTERED', 1, 0, 'C');
        $this->Cell(40, 5, 'WITH PENSION', 1, 0, 'C');
        $this->SetFont('Times', '', 8);
        $this->Cell(20, 5, 'PHIL HEALTH', 1, 0, 'C');
        $this->Cell(0, 0, '', 1, 0, 'C');
        $this->SetTextColor(255, 255, 255);
        $this->Cell(40, 10, 'BARANGAY', 0, 0, 'C', true);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 5, '', '0'); // add an empty cell to merge the next row
        $this->Ln(); // move to the next row
        $this->Cell(8, 0, '', 0, 0, 'C');
        $this->Cell(25, 0, '', 0, 0, 'C');
        $this->Cell(25, 0, '', 0, 0, 'C');
        $this->Cell(25, 0, '', 0, 0, 'C');
        $this->Cell(25, 5, '"ANGGA"', 0, 0, 'C');
        $this->Cell(15, 0, '', 0, 0, 'C');
        $this->Cell(25, 5, 'yyyy-mm-dd', 1, 0, 'C');
        $this->Cell(10, 0, '', 0, 0, 'C');
        $this->Cell(45, 5, 'PUROK/SITIO ', 0, 0, 'C');
        $this->Cell(20, 0, '', 0, 0, 'C');
        $this->Cell(32, 5, 'Date and Time', 1, 0, 'C');
        $this->Cell(10, 5, 'GSIS', 1, 0, 'C'); // add an empty cell to fill the merged cell
        $this->Cell(10, 5, 'SSS', 1, 0, 'C');
        $this->Cell(10, 5, 'PVAO', 1, 0, 'C');
        $this->Cell(10, 5, 'DSWD', 1, 0, 'C');
        $this->Cell(10, 5, 'YES', 1, 0, 'C');
        $this->Cell(10, 5, 'NO', 1, 1, 'C');

    }

    function Footer() {
        $this->SetY(-45);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'SUBMITTED BY:', 0, 0, 'L');
        $this->Ln();
        $this->Cell(0, 5, '____________________                                                               ____________________                                                                 ____________________', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'MUNICIPAL FEDERATED                                                                       OSCA HEAD                                                                                        MSWDO             ', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'Contact Number:      ____________________                                                               ____________________                                                                 ____________________', 0, 0, 'L');
        $this->Ln();
        // $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of ', 0, 0, 'C');
    }

    function Count() {
        $this->count++;
    }

    function ResetCount() {
        $this->count = 0;
    }

    function GetCount() {
        return $this->count;
    }
}

$pdf = new PDF('L', 'mm', array(215.9, 330.2));
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->ResetCount();
//  //total rows or records to display
//  $total_records_per_page = 20;
$pdf->SetAutoPageBreak(true,45);
$query = mysqli_query($con, "SELECT * FROM tblsenior  WHERE Barangay = 'Canta-ub' ORDER BY `SurName`, `FirstName`, `MiddleName` ASC");
while ($data = mysqli_fetch_array($query)) {
    $pdf->Count();
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(8, 6, $pdf->GetCount(), 1, 0, 'C');

    
    if($pdf->GetStringWidth(strtoupper($data['SurName'])) > 25) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(25, 6, (strtoupper($data['SurName'])), 1, 0);
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(25, 6, strtoupper($data['SurName']), 1, 0);
    }

    if($pdf->GetStringWidth(strtoupper($data['FirstName'])) > 25) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(25, 6, (strtoupper($data['FirstName'])), 1, 0);
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(25, 6, strtoupper($data['FirstName']), 1, 0);
    }

    if($pdf->GetStringWidth(strtoupper($data['MiddleName'])) > 25) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(25, 6, (strtoupper($data['MiddleName'])), 1, 0);
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(25, 6, strtoupper($data['MiddleName']), 1, 0);
    }

    if($pdf->GetStringWidth(strtoupper($data['NickName'])) > 25) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(25, 6, (strtoupper($data['NickName'])), 1, 0);
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(25, 6, strtoupper($data['NickName']), 1, 0);
    }

    $pdf->Cell(15, 6, strtoupper($data['Gender']), 1, 0, 'C');
    $pdf->Cell(25, 6, strtoupper($data['DOB']), 1, 0, 'C');
    $pdf->Cell(10, 6, strtoupper($data['Age']), 1, 0, 'C');

    
    if($pdf->GetStringWidth(strtoupper($data['PuAddress'])) > 45) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(45, 6, (strtoupper($data['PuAddress'])), 1, 0);
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(45, 6, strtoupper($data['PuAddress']), 1, 0);
    }
     
    if($pdf->GetStringWidth(strtoupper($data['StuID'])) > 20) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(20, 6, (strtoupper($data['StuID'])), 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(20, 6, strtoupper($data['StuID']), 1, 0);
    }
    if($pdf->GetStringWidth(strtoupper($data['DateofAdmission'])) > 32) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(32, 6, (strtoupper($data['DateofAdmission'])), 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
    } else {
    $pdf->Cell(32, 6, strtoupper($data['DateofAdmission']), 1, 0, 'C');
    }
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(10, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(40, 6, strtoupper($data['Barangay']), 0, 1);
    $pdf->SetTextColor(0, 0, 0);
}

$pdf->Output('barangay-data-table.pdf', 'I');
?>
