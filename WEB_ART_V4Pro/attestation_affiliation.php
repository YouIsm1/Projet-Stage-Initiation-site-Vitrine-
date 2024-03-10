<?php
require('PHP_FPDF/fpdf.php'); // Include the FPDF library

// Get user registration data (you'll need to replace this with your actual data retrieval code)
$userFirstName = "John";
$userLastName = "Doe";
$userEmail = "john@example.com";

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Add content to the PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Registration Information', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "First Name: $userFirstName", 0, 1);
$pdf->Cell(0, 10, "Last Name: $userLastName", 0, 1);
$pdf->Cell(0, 10, "Email: $userEmail", 0, 1);

// Output the PDF as a download
$pdf->Output('registration_info.pdf', 'D');
?>
