<?php
require('fpdf.php');
require 'connect.php';
require 'config.php';

$pdf = new FPDF('L', 'mm', array(86, 54,));
$pdf->SetMargins(4, 4, 4, -2);
$pdf->SetAutoPageBreak(true, -40);
$pdf->SetFont('Times', 'B', 9);
$pdf->AddPage();
					// Get senior details
					$stmt = $mysqli->prepare("SELECT `StuID`, `SurName`, `FirstName`, `MiddleName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber`, `Pension`, `Image`, `ControlNo` FROM `tblsenior` WHERE `id` = ?");
					$stmt->bind_param("i", $_GET['id']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($stuid, $stuname, $fname, $mname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension, $image, $controlno);
						$stmt->fetch();

                        $date = date('F j, Y');
                        $pdf->Image('images/sierralogo.jpg', 5, 5, 10);
                        $image_src = "images/" .$image;
                        $pdf->Rect(70, 5, 8.82, 8.82,'D');
                        $pdf->Image($image_src, 70, 5, 8.82, 8.82, 'JPG');
                        // size sa picture 2x2, 17.64 and e puli sa 8.82
                        $pdf->Cell(0, 2, 'Republic of the Philippines', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 2, 'Office for Senior Citizens Affairs', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 3, 'Sierra Bullones, Bohol', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->SetFont('Times', 'B', 7);
                        $pdf->Cell(0, 3, 'Control No. '. $controlno, 0, 0, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 3, 'Name: '.(strtoupper($stuname)).', '.(strtoupper($fname)).' '.(strtoupper($mname)), 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, -1, 'Address: '.(strtoupper($paddress)).', '.(strtoupper($barangay)), 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->SetFont('Times', 'B', 5);
                        $pdf->Cell(0, 7, '', 0, 1, 'C');
                        $pdf->Cell(0, -1, (strtoupper($dob)). ' / '.(strtoupper($age)). ' yrs. old ', 0, 0, 'L');
                        $pdf->Cell(-80, -1, ''.(strtoupper($gender)), 0, 0, 'C');
                        $pdf->Cell(0, -1, ''.$date, 0, 1, 'R');
                        $pdf->Cell(0, 2, '______________                                             __________                                                     ______________', 0, 1, 'L');
                        $pdf->Cell(0, 3, 'Date of Birth/Age: ', 0, 0, 'L');
                        $pdf->Cell(-80, 3, 'Sex', 0, 0, 'C');
                        $pdf->Cell(0, 3, 'Date of Issue', 0, 1, 'R');
                        $pdf->Ln();
                        $pdf->SetFont('Times', 'B', 6);
                        $pdf->Cell(0, -2, '', 0, 1, 'C');
                        $pdf->Cell(0, 3, 'THIS CARD IS NON-TRANSFERABLE AND', 0, 1, 'C');
                        $pdf->Cell(0, 2, 'VALID ANYWHERE IN THE COUNTRY', 0, 1, 'C');
                        $pdf->Cell(0, 11, '________________________', 0, 1, 'C');
                        $pdf->SetFont('Arial', 'B', 5);
                        $pdf->Cell(0, -4, 'Signature / Thumb mark', 0, 1, 'C');

                        // mag add sa likod sa ID
                        $pdf->SetMargins(4, 4, 4, -2);
                        $pdf->SetFont('Arial', 'B', 8);
                        $pdf->AddPage();
                        $pdf->Cell(0, 2, 'Benefits and Privileges under Republic Act. No. 9257', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->SetFont('Arial', 'B', 6);
                        $pdf->Cell(0, 2, '', 0, 1, 'R');
                        $pdf->Cell(0, 1.5, '- Free medical and dental, diagnostic & laboratory services in all government', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '  facilities', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '- 20% discount in purchase of unbranded generic medicines', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '- 20% discount in hotels, restaurants, recreation centers, etc.', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '- 20% discount on theaters, cinema houses and concert halls, etc.', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '- 20% discount on medical & dental services, diagnostic & laboratory fees in', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '  private facilities', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '- 20% discount in fare for domestics air, sea travel and public land', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1.5, '   transportation', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, '', 0, 1, 'L');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, 'Only for the exclusive use of Senior Citizens; abuse of', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, 'privileges is punishable by law', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, 'Persons & Corporations violating RA 9257', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, 'shall be penalized', 0, 1, 'C');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, '____________________', 0, 0, 'L');
                        $pdf->Cell(0, 1, '____________________', 0, 1, 'R');
                        $pdf->Ln();
                        $pdf->Cell(0, 1, '', 0, 1, 'L');
                        $pdf->Cell(0, 1, '         OSCA HEAD', 0, 0, 'L');
                        $pdf->Cell(0, 1, 'MUNICIPAL MAYOR', 0, 1, 'R');
}

$pdf->Output();
?>
