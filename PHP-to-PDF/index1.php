<?php
require('fpdf/fpdf.php');

if (isset($_POST['generate-pdf'])) {
  $pdf = new FPDF();
  $pdf->AddPage();

  $pdf->SetFont('Arial', 'B', 16);
  $pdf->Cell(40, 10, 'Name');
  $pdf->Cell(40, 10, 'Email');
  $pdf->Ln(); // line break

  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(40, 10, 'John Doe');
  $pdf->Cell(40, 10, 'john@example.com');
  $pdf->Ln(); // line break

  $pdf->Cell(40, 10, 'Jane Smith');
  $pdf->Cell(40, 10, 'jane@example.com');

  $pdf->Output('myfile.pdf', 'D');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Generate PDF</title>
</head>
<body>
  <form method="post">
    <button type="submit" name="generate-pdf">Download PDF</button>
  </form>
</body>
</html>
