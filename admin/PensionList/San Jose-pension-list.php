<?php
require('fpdf.php');
require('1.Pensiondbconnection.php');
class PDF extends FPDF {
    private $count = 0;

    function Header() {
        $this->SetFont('Arial', 'B', 10);
        $this->SetMargins(10, 10, 10);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(0, 5, 'LGU SIERRA BULLONES, BOHOL', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'PAYROLL FOR FIRST SEMESTER CY _________', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'For Payment of monthly Social Pension to Indigent Senior Citizens in SIERRA BULLONES, BOHOL', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'BARANGAY SAN JOSE', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, 'Date of Pay-out: ____________', 0, 0, 'L');
        $this->Cell(0, 5, 'SDO: _________________', 0, 0, 'R');
        $this->Ln();
        $this->SetFont('Arial', '', 9);
        $this->Cell(8, 10, 'No.', 1, 0, 'C');
        $this->Cell(75, 5, 'NAME OF SOCIAL PENSION BENEFICIARIES', 1, 0, 'C');
        $this->Cell(25, 5, 'DATE OF BIRTH', 1, 0, 'C');
        $this->Cell(10, 10, 'AGE', 1, 0, 'C');
        $this->Cell(15, 10, 'SEX', 1, 0, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 5, 'PERIOD COVERED CY ____', 1, 0, 'C');
        $this->SetFont('Arial', '', 9);
        $this->Cell(25, 10, 'SIGNATURE', 1, 0, 'C');
        $this->Cell(0, 5, '', '0'); // add an empty cell to merge the next row
        $this->Ln(); // move to the next row
        $this->Cell(8, 0, '', 0, 0, 'C');
        // $this->Cell(25, 0, '', 0, 0, 'C');
        $this->Cell(25, 5, 'LAST NAME', 1, 0, 'C');
        $this->Cell(25, 5, 'FIRST NAME', 1, 0, 'C');
        $this->Cell(25, 5, 'MIDDLE NAME', 1, 0, 'C');
        $this->Cell(25, 5, '(Y/M/D)', 1, 0, 'C');
        $this->Cell(15, 0, '', 0, 0, 'C');
        $this->Cell(10, 0, '', 0, 0, 'C');
        $this->Cell(20, 5, '_____SEM', 1, 0, 'C');
        $this->Cell(20, 5, 'AMOUNT', 1, 1, 'C');
    }

    function Footer() {
        $this->SetY(-45);
        $this->SetFont('Arial', 'B', 10);
        // $this->Cell(0, 5, 'SUBMITTED BY:', 0, 0, 'L');
        // $this->Ln();
        // $this->Cell(0, 5, '____________________                                                               ____________________                                                                 ____________________', 0, 0, 'C');
        // $this->Ln();
        // $this->Cell(0, 5, 'MUNICIPAL FEDERATED                                                                       OSCA HEAD                                                                                        MSWDO             ', 0, 0, 'C');
        // $this->Ln();
        // $this->Cell(0, 5, 'Contact Number:      ____________________                                                               ____________________                                                                 ____________________', 0, 0, 'L');
        // $this->Ln();
        // // $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of ', 0, 0, 'C');
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

$pdf = new PDF('P', 'mm', array(215.9, 330.2));
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->ResetCount();
//  //total rows or records to display
//  $total_records_per_page = 20;
$pdf->SetAutoPageBreak(true,45);
$query = mysqli_query($con, "SELECT * FROM tblsenior  WHERE Barangay = 'San Jose' ORDER BY `SurName`, `FirstName`, `MiddleName` ASC");
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

    $pdf->Cell(25, 6, strtoupper($data['DOB']), 1, 0, 'C');
    $pdf->Cell(10, 6, strtoupper($data['Age']), 1, 0, 'C');
    $pdf->Cell(15, 6, strtoupper($data['Gender']), 1, 0, 'C');
    $pdf->Cell(20, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(20, 6, strtoupper($data['CheckBox']), 1, 0);
    $pdf->Cell(25, 6, strtoupper($data['CheckBox']), 1, 1);
    $pdf->SetTextColor(0, 0, 0);
}

$pdf->Output('barangay-data-table.pdf', 'I');
?>
