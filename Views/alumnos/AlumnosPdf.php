<?php
// VISTA PDF. Recibe del controlador: $alumnos, $grupo, $curso
$pdf = new \Lib\PDF('Listado oficial de alumnos');
$pdf->AddPage();    // aquí FPDF llama solo a Header()

// --- Datos del grupo ---
$pdf->SetFont('Helvetica', 'B', 13);
$pdf->Cell(0, 8, $pdf->t("Grupo: $grupo     Curso: $curso"), 0, 1, 'L');
$pdf->Ln(4);

// --- Cabecera de la tabla ---
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->SetFillColor(31, 78, 121);      // fondo azul
$pdf->SetTextColor(255, 255, 255);    // letras blancas
$pdf->Cell(15, 8, 'N.', 1, 0, 'C', true);
$pdf->Cell(80, 8, 'Apellidos', 1, 0, 'C', true);
$pdf->Cell(60, 8, 'Nombre', 1, 1, 'C', true);

// --- Una fila por alumno ---
$pdf->SetFont('Helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);
$n = 1;
foreach ($alumnos as $alumno) {
    $pdf->Cell(15, 8, (string) $n++, 1, 0, 'C');
    $pdf->Cell(80, 8, $pdf->t(ucwords($alumno->getApellidos())), 1, 0, 'L');
    $pdf->Cell(60, 8, $pdf->t(ucfirst($alumno->getNombre())), 1, 1, 'L');
}

$pdf->Output('I', 'alumnos.pdf');   // I = mostrar en el navegador
